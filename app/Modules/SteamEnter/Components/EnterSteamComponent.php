<?php

namespace Flute\Modules\SteamEnter\Components;

use DateTimeImmutable;
use Exception;
use Flute\Core\Database\Entities\SocialNetwork;
use Flute\Core\Database\Entities\UserSocialNetwork;
use Flute\Core\Support\FluteComponent;

class EnterSteamComponent extends FluteComponent
{
    private const SESSION_KEY = 'steam_enter.steam_id';
    private const COOKIE_KEY = 'steam_enter_id';

    public ?string $steamId = null;

    public function boot(array $variables, array $attributes)
    {
        parent::boot($variables, $attributes);

        $this->hydrateSteamId();
    }

    public function enterSteam()
    {
        $user = user();

        if ($user->hasSocialNetwork('Steam')) {
            $this->inputError('steamId', 'На вашем аккаунте уже подключена социальная сеть Steam');
            $this->flashMessage('На вашем аккаунте уже подключена социальная сеть Steam', 'error');
            $this->redirectTo(route('home'), 1000);

            return;
        }

        $steamIdInput = $this->normalizeSteamId(request()->input('steamId'));
        $this->steamId = $steamIdInput;

        if ($steamIdInput !== null) {
            $this->rememberSteamId($steamIdInput);
        }

        if (!$this->validate([
            'steamId' => 'required|string|max-str-len:255',
        ], [
            'steamId' => $steamIdInput ?? '',
        ], [
            'steamId.required' => 'Необходимо ввести Steam ID',
            'steamId.string' => 'Steam ID должен быть строкой',
            'steamId.max-str-len' => 'Steam ID должен быть не более 255 символов',
        ])) {
            return;
        }

        try {
            $steamId = steam()->steamid($steamIdInput);

            if (!$steamId->IsValid()) {
                $this->inputError('steamId', 'Формат Steam ID неверный');
                $this->flashMessage('Формат Steam ID неверный', 'error');

                return;
            }
        } catch (Exception $e) {
            $this->inputError('steamId', 'Формат Steam ID неверный');
            $this->flashMessage('Формат Steam ID неверный', 'error');

            return;
        }

        $userSocialNetwork = new UserSocialNetwork();
        $userSocialNetwork->user = $user->getCurrentUser();
        $userSocialNetwork->socialNetwork = SocialNetwork::findOne(['key' => 'Steam']);
        $userSocialNetwork->value = $steamId->ConvertToUInt64();
        $userSocialNetwork->url = 'https://steamcommunity.com/profiles/' . $steamId->ConvertToUInt64();
        $userSocialNetwork->name = $user->name;
        $userSocialNetwork->linkedAt = new DateTimeImmutable();

        try {
            $userSocialNetwork->saveOrFail();
            $user->addSocialNetwork($userSocialNetwork);
            $user->saveOrFail();
        } catch (Exception $e) {
            if (is_debug()) {
                throw $e;
            }

            $this->inputError('steamId', 'Произошла ошибка при подключении Steam');
            $this->flashMessage('Произошла ошибка при подключении Steam', 'error');

            return;
        }

        $this->flashMessage('Steam ID успешно подключен', 'success');
        $this->forgetRememberedSteamId();
        $this->steamId = null;
        $this->redirectTo(route('home'), 1000);
    }

    public function render()
    {
        return view('steamenter::steam-enter', [
            'steamId' => $this->steamId,
        ]);
    }

    private function hydrateSteamId(): void
    {
        if ($this->steamId) {
            $this->rememberSteamId($this->steamId);

            return;
        }

        $remembered = session()->get(self::SESSION_KEY);

        if (!$remembered && cookie()->has(self::COOKIE_KEY)) {
            $remembered = cookie(self::COOKIE_KEY);
        }

        if (is_string($remembered) && $remembered !== '') {
            $this->steamId = $remembered;
        }
    }

    private function rememberSteamId(string $steamId): void
    {
        $steamId = trim($steamId);

        if ($steamId === '') {
            return;
        }

        session()->set(self::SESSION_KEY, $steamId);
        cookie()->set(self::COOKIE_KEY, $steamId, 60 * 60 * 24 * 30, '/', null, false, 'Lax');
    }

    private function forgetRememberedSteamId(): void
    {
        session()->remove(self::SESSION_KEY);
        cookie()->remove(self::COOKIE_KEY);
        $this->dispatchBrowserEvent('steam-enter-clear');
    }

    private function normalizeSteamId($steamId): ?string
    {
        if (is_array($steamId)) {
            $steamId = reset($steamId);
        }

        $steamId = trim((string) $steamId);

        return $steamId === '' ? null : $steamId;
    }
}
