<form class="steam-onboarding">
    <div class="steam-onboarding__container">
        <div class="steam-onboarding__header">
            <h1>Подключите аккаунт Steam</h1>
            <p class="steam-onboarding__description">Пожалуйста, введите ваш Steam ID для продолжения</p>
        </div>

        <div class="steam-onboarding__form">
            <div class="steam-onboarding__input-group">
                <x-forms.field>
                    <x-fields.input value="{{ $steamId }}" name="steamId" id="steamId"
                        placeholder="Введите ваш Steam ID" />
                </x-forms.field>
                <x-button type="accent" yoyo:post="enterSteam">Подключить</x-button>
            </div>
        </div>

        <div class="steam-onboarding__help">
            <a data-modal-open="instructions" class="steam-onboarding__help-button">
                Как найти свой Steam ID?
            </a>
        </div>
    </div>
</form>

<x-modal id="instructions" title="Как найти свой Steam ID" size="small" inline>
    <p class="steam-instructions__description">
        Инструкция только для тех, у кого есть лицензия на игру!
    </p>

    <div class="steam-instructions__body">
        <div class="steam-instructions__step">
            <div class="steam-instructions__step-number">1</div>
            <div class="steam-instructions__step-text">
                <p>Откройте профиль Steam в браузере</p>
            </div>
        </div>

        <div class="steam-instructions__step">
            <div class="steam-instructions__step-number">2</div>
            <div class="steam-instructions__step-text">
                <p>Найдите своё ID в адресе страницы:</p>
                <p class="steam-instructions__example">
                    steamcommunity.com/profiles/<span>76561198012345678</span>
                </p>
            </div>
        </div>

        <div class="steam-instructions__step">
            <div class="steam-instructions__step-number">3</div>
            <div class="steam-instructions__step-text">
                <p>Скопируйте 17 цифр и вставьте в поле</p>
            </div>
        </div>

        <div class="steam-instructions__alternative">
            <h4>Не можете найти ID?</h4>
            <p class="steam-instructions__service">Воспользуйтесь сервисом:
                <x-link href="https://steamid.xyz" target="_blank" class="steam-instructions__service-link">
                    SteamID.xyz
                </x-link>
            </p>
            <div class="steam-instructions__step">
                <div class="steam-instructions__step-number">1</div>
                <div class="steam-instructions__step-text">
                    <p>Введите свой никнейм или ссылку на профиль</p>
                </div>
            </div>
            <div class="steam-instructions__step">
                <div class="steam-instructions__step-number">2</div>
                <div class="steam-instructions__step-text">
                    <p>Скопируйте число из строки "Steam64 ID":</p>
                    <p class="steam-instructions__example">
                        Steam64 ID: <span>76561198012345678</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-modal>

<script>
    (function() {
        if (typeof window === 'undefined') {
            return;
        }

        const STORAGE_KEY = 'steam-enter:last-id';
        const COOKIE_KEY = 'steam_enter_id';
        const COOKIE_MAX_AGE = 60 * 60 * 24 * 30;
        const localStore = (() => {
            try {
                const testKey = '__steam_enter_test__';
                window.localStorage.setItem(testKey, '1');
                window.localStorage.removeItem(testKey);

                return window.localStorage;
            } catch (e) {
                return null;
            }
        })();

        const setCookie = (value) => {
            document.cookie =
                `${COOKIE_KEY}=${encodeURIComponent(value)}; path=/; max-age=${COOKIE_MAX_AGE}; samesite=lax`;
        };

        const clearCookie = () => {
            document.cookie = `${COOKIE_KEY}=; path=/; max-age=0; samesite=lax`;
        };

        const getCookie = (name) => {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) {
                return decodeURIComponent(parts.pop().split(';').shift());
            }

            return null;
        };

        const bind = () => {
            const input = document.getElementById('steamId');

            if (!input || input.dataset.steamRememberBound === 'true') {
                return;
            }

            input.dataset.steamRememberBound = 'true';

            const storedValue = (localStore && localStore.getItem(STORAGE_KEY)) || getCookie(COOKIE_KEY);

            if (storedValue && !input.value) {
                input.value = storedValue;
            }

            input.addEventListener('input', () => {
                const value = input.value.trim();

                if (value.length) {
                    if (localStore) {
                        try {
                            localStore.setItem(STORAGE_KEY, value);
                        } catch (e) {
                            console.warn('Unable to persist Steam ID to localStorage', e);
                        }
                    }
                    setCookie(value);
                } else {
                    if (localStore) {
                        localStore.removeItem(STORAGE_KEY);
                    }
                    clearCookie();
                }
            });
        };

        const clearPersisted = () => {
            if (localStore) {
                localStore.removeItem(STORAGE_KEY);
            }
            clearCookie();
        };

        document.addEventListener('DOMContentLoaded', bind);
        document.addEventListener('htmx:afterSwap', bind);
        window.addEventListener('steam-enter-clear', clearPersisted);
    })();
</script>
