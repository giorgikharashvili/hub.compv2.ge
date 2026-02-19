<?php

namespace Flute\Modules\SteamInfo\Listeners;

use Flute\Core\Modules\Profile\Events\ProfileRenderEvent;
use xPaw\SteamID\SteamID;

class ProfileListener
{
    public static function handle(ProfileRenderEvent $event)
    {
        if ($event->getType() === 'mini') {
            return;
        }

        if ($steam = $event->getUser()->getSocialNetwork('Steam')) {
            $steamXpaw = new SteamID($steam->value);

            $steam3 = $steamXpaw->RenderSteam3();
            $steam32 = $steamXpaw->RenderSteam2();
            $steam64 = $steam->value;

            template()->prependToSection('profile_banner_wrapper', render('steam-info::index', [
                'steam' => $steam,
                'steam3' => $steam3,
                'steam32' => $steam32,
                'steam64' => $steam64,
            ]));
        }
    }
}