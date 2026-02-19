<?php if (!$Function->TableSearch()): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="container_text_settings">
                <div class="container_text_settings_text">
                    <span class="settings_header_text_top"><?= $Function->Translate('_stats_md'); ?></span>
                    <span class="settings_header_text_bottom"><?= $Function->Translate('_stats_info'); ?></span>
                </div>
            </div>
            <div class="adminpanel-count-blocks">
                <?php
                if ($Function->Settings('type') == 2) {
                    $count_stats = $Db->query('Skins', 0, 0, "SELECT
                                        (SELECT COUNT(*) FROM `sc_player` LIMIT 1) AS `players`, 
                                        (SELECT COUNT(*) FROM `sc_items` LIMIT 1) AS `iteams`,
                                        (SELECT COUNT(*) FROM `sc_skins` LIMIT 1) AS `skins`,
                                        (SELECT COUNT(*) FROM `sc_servers` LIMIT 1) AS `servers`");
                } elseif ($Function->Settings('type') == 3) {
                    $count_stats = $Db->query('Skins', 0, 0, "SELECT
                                        (SELECT COUNT(*) FROM `wp_skins` LIMIT 1) AS `players`,
                                        (SELECT COUNT(*) FROM `wp_skins` LIMIT 1) AS `skins`");
                    $count_stats['servers'] = count($Db->db_data['Skins']);
                } else {
                    $count_stats = $Db->query('Skins', 0, 0, "SELECT
                                        (SELECT COUNT(*) FROM `wp_player_skins` LIMIT 1) AS `players`,
                                        (SELECT COUNT(*) FROM `wp_player_skins` LIMIT 1) AS `skins`");
                    $count_stats['servers'] = count($Db->db_data['Skins']);
                }
                ?>
                <div class="adminpanel-count-block">
                    <div class="adminpanel-count-svg">
                        <svg viewBox="0 0 640 512">
                            <path d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM405.3 320H618.7c11.8 0 21.3-9.6 21.3-21.3C640 239.8 592.2 192 533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 38.2-16.8 72.5-43.3 96c.2 0 .4 0 .7 0zM320 176a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm0 144a96 96 0 1 0 0-192 96 96 0 1 0 0 192zm-58.7 80H378.7c39.8 0 73.2 27.2 82.6 64H178.7c9.5-36.8 42.9-64 82.6-64zm0-48C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H485.3c14.7 0 26.7-11.9 26.7-26.7C512 411.7 452.3 352 378.7 352H261.3z" />
                        </svg>
                    </div>
                    <div class="adminpanel-count">
                        <h1><?= !empty($count_stats['players']) ? $count_stats['players'] : 0; ?></h1>
                        <p><?= $Function->Translate('_stats_reg_play'); ?></p>
                    </div>
                </div>
                <div class="adminpanel-count-block">
                    <div class="adminpanel-count-svg">
                        <svg viewBox="0 0 512 512">
                            <path d="M464 258.2c0 2.7-1 5.2-4.2 8c-3.8 3.1-10.1 5.8-17.8 5.8H344c-53 0-96 43-96 96c0 6.8 .7 13.4 2.1 19.8c3.3 15.7 10.2 31.1 14.4 40.6l0 0c.7 1.6 1.4 3 1.9 4.3c5 11.5 5.6 15.4 5.6 17.1c0 5.3-1.9 9.5-3.8 11.8c-.9 1.1-1.6 1.6-2 1.8c-.3 .2-.8 .3-1.6 .4c-2.9 .1-5.7 .2-8.6 .2C141.1 464 48 370.9 48 256S141.1 48 256 48s208 93.1 208 208c0 .7 0 1.4 0 2.2zm48 .5c0-.9 0-1.8 0-2.7C512 114.6 397.4 0 256 0S0 114.6 0 256S114.6 512 256 512c3.5 0 7.1-.1 10.6-.2c31.8-1.3 53.4-30.1 53.4-62c0-14.5-6.1-28.3-12.1-42c-4.3-9.8-8.7-19.7-10.8-29.9c-.7-3.2-1-6.5-1-9.9c0-26.5 21.5-48 48-48h97.9c36.5 0 69.7-24.8 70.1-61.3zM160 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-64a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm128-64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm64 64a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                        </svg>
                    </div>
                    <div class="adminpanel-count">
                        <h1><?= !empty($count_stats['skins']) ? $count_stats['skins'] : 0; ?></h1>
                        <p><?= $Function->Translate('_stats_skins_add'); ?></p>
                    </div>
                </div>
                <div class="adminpanel-count-block">
                    <div class="adminpanel-count-svg">
                        <svg viewBox="0 0 576 512">
                            <path d="M320 80v64H256V80h64zM256 32c-26.5 0-48 21.5-48 48v64c0 26.5 21.5 48 48 48h8v40H112c-30.9 0-56 25.1-56 56v32H48c-26.5 0-48 21.5-48 48v64c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V368c0-26.5-21.5-48-48-48h-8V288c0-4.4 3.6-8 8-8H264v40h-8c-26.5 0-48 21.5-48 48v64c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V368c0-26.5-21.5-48-48-48h-8V280H464c4.4 0 8 3.6 8 8v32h-8c-26.5 0-48 21.5-48 48v64c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V368c0-26.5-21.5-48-48-48h-8V288c0-30.9-25.1-56-56-56H312V192h8c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H256zM48 368h64v64H48V368zm208 0h64v64H256V368zm208 0h64v64H464V368z" />
                        </svg>
                    </div>
                    <div class="adminpanel-count">
                        <h1><?= !empty($count_stats['iteams']) ? $count_stats['iteams'] : 0; ?></h1>
                        <p><?= $Function->Translate('_stats_item_add'); ?></p>
                    </div>
                </div>
                <div class="adminpanel-count-block">
                    <div class="adminpanel-count-svg">
                        <svg viewBox="0 0 512 512">
                            <path d="M64 80c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM64 336c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V352c0-8.8-7.2-16-16-16H64zM0 352c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V352zm392 32a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm24-280a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM328 384a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm24-280a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                        </svg>
                    </div>
                    <div class="adminpanel-count">
                        <h1><?= !empty($count_stats['servers']) ? $count_stats['servers'] : 0; ?></h1>
                        <p><?= $Function->Translate('_stats_add_serv'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <div class="container_text_settings">
            <div class="container_text_settings_text">
                <span class="settings_header_text_top"><?= $Function->Translate('_stats_c_a'); ?></span>
                <span class="settings_header_text_bottom"><?= $Function->Translate('_stats_up_c_all'); ?></span>
            </div>
        </div>
        <div class="adminpanel-cache-blocks">
            <?php

            $skins              = MODULES . "module_page_skins/cache/skins-en.json";
            $agents             = MODULES . "module_page_skins/cache/agents-en.json";
            $stickers           = MODULES . "module_page_skins/cache/stickers-en.json";
            $keychains          = MODULES . "module_page_skins/cache/keychains-en.json";
            $collectibles       = MODULES . "module_page_skins/cache/collectibles-en.json";
            $music              = MODULES . "module_page_skins/cache/music-en.json";

            $skinsData = $Function->get_cache($skins);
            foreach ($skinsData as $weapon) {
                $weaponId = $weapon['id'];
                $skinCount += count($weapon['skins']);
            }

            $Skins = $skinCount;
            $Agents = count($Function->get_cache($agents));
            $Stickers = count($Function->get_cache($stickers));
            $Keychains = count($Function->get_cache($keychains));
            $Collectibles = count($Function->get_cache($collectibles));
            $Music = count($Function->get_cache($music));

            ?>
            <div class="adminpanel-cache-block">
                <div class="adminpanel-cache">
                    <h1><?= !empty($Skins) ? $Skins : 0; ?>
                        <div class="UpdateCache" data-tippy-content="<?= $Function->Translate('_stats_update'); ?>">
                            <button class="adminpanel-cache-button" id="CacheSkins"><svg>
                                    <use href="/resources/img/sprite.svg#spinner"></use>
                                </svg></button>
                        </div>
                    </h1>
                    <p><?= $Function->Translate('_stats_skins_all'); ?></p>
                </div>
            </div>
            <div class="adminpanel-cache-block">
                <div class="adminpanel-cache">
                    <h1><?= !empty($Stickers) ? $Stickers : 0; ?>
                        <div class="UpdateCache" data-tippy-content="<?= $Function->Translate('_stats_update'); ?>">
                            <button class="adminpanel-cache-button" id="CacheStickers"><svg>
                                    <use href="/resources/img/sprite.svg#spinner"></use>
                                </svg></button>
                        </div>
                    </h1>
                    <p><?= $Function->Translate('_stats_all_stick'); ?></p>
                </div>
            </div>
            <div class="adminpanel-cache-block">
                <div class="adminpanel-cache">
                    <h1><?= !empty($Keychains) ? $Keychains : 0; ?>
                        <div class="UpdateCache" data-tippy-content="<?= $Function->Translate('_stats_update'); ?>">
                            <button class="adminpanel-cache-button" id="CacheKeychains"><svg>
                                    <use href="/resources/img/sprite.svg#spinner"></use>
                                </svg></button>
                        </div>
                    </h1>
                    <p><?= $Function->Translate('_stats_all_keychain'); ?></p>
                </div>
            </div>
            <div class="adminpanel-cache-block">
                <div class="adminpanel-cache">
                    <h1><?= !empty($Agents) ? $Agents : 0; ?>
                        <div class="UpdateCache" data-tippy-content="<?= $Function->Translate('_stats_update'); ?>">
                            <button class="adminpanel-cache-button" id="CacheAgents"><svg>
                                    <use href="/resources/img/sprite.svg#spinner"></use>
                                </svg></button>
                        </div>
                    </h1>
                    <p><?= $Function->Translate('_stats_all_ag'); ?></p>
                </div>
            </div>
            <div class="adminpanel-cache-block">
                <div class="adminpanel-cache">
                    <h1><?= !empty($Collectibles) ? $Collectibles : 0; ?>
                        <div class="UpdateCache" data-tippy-content="<?= $Function->Translate('_stats_update'); ?>">
                            <button class="adminpanel-cache-button" id="CacheMoney"><svg>
                                    <use href="/resources/img/sprite.svg#spinner"></use>
                                </svg></button>
                        </div>
                    </h1>
                    <p><?= $Function->Translate('_stats_all_coin'); ?></p>
                </div>
            </div>
            <div class="adminpanel-cache-block">
                <div class="adminpanel-cache">
                    <h1><?= !empty($Music) ? $Music : 0; ?>
                        <div class="UpdateCache" data-tippy-content="<?= $Function->Translate('_stats_update'); ?>">
                            <button class="adminpanel-cache-button" id="CacheMusic"><svg>
                                    <use href="/resources/img/sprite.svg#spinner"></use>
                                </svg></button>
                        </div>
                    </h1>
                    <p><?= $Function->Translate('_stats_mkit'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="container_text_settings">
            <div class="container_text_settings_text">
                <span class="settings_header_text_top"><?= $Function->Translate('_stats_settings_md'); ?></span>
                <span class="settings_header_text_bottom"><?= $Function->Translate('_stats_okpon'); ?></span>
            </div>
        </div>
        <div class="adminpanel-settings-blocks">
            <?php
            $settings = MODULES . "module_page_skins/settings.json";
            $setting = $Function->get_cache($settings);
            ?>
            <form id="save_settings_sk" method="post">
                <div class="block_author">
                    <img src="/app/modules/module_page_skins/assets/img/severskiy.png" alt="author module">
                    <div>
                        <a href="https://discordapp.com/users/729094204730638395">Discord developer: severskteam</a>
                        <a href="https://t.me/SeversKTeaM">Telegram developer: @SeversKTeaM</a>
                    </div>
                </div>
                <fieldset>
                    <legend><?= $Function->Translate('_stats_tex_rab'); ?></legend>
                    <div class="card_button_flex">
                        <div class="inputs-inline">
                            <input type="radio" name="work_module" id="work_module_1" value="1" <?= ($setting['work'] == 1) ? 'checked' : '' ?>>
                            <label for="work_module_1"><?= $Function->Translate('_stats_on'); ?></label>
                        </div>
                        <div class="inputs-inline">
                            <input type="radio" name="work_module" id="work_module_2" value="0" <?= ($setting['work'] == 0) ? 'checked' : '' ?>>
                            <label for="work_module_2"><?= $Function->Translate('_stats_off'); ?></label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><?= $Function->Translate('_stats_coosee'); ?></legend>
                    <div class="card_button_flex">
                        <div class="inputs-inline">
                            <input type="radio" name="type_module" id="type_module_1" value="1" <?= ($setting['type'] == 1) ? 'checked' : '' ?>>
                            <label for="type_module_1">WeaponPaints</label>
                        </div>
                        <div class="inputs-inline">
                            <input type="radio" name="type_module" id="type_module_2" value="2" <?= ($setting['type'] == 2) ? 'checked' : '' ?>>
                            <label for="type_module_2">SkinChanger (Pisex)</label>
                        </div>
                        <div class="inputs-inline">
                            <input type="radio" name="type_module" id="type_module_3" value="3" <?= ($setting['type'] == 3) ? 'checked' : '' ?>>
                            <label for="type_module_3">WirePatches</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><?= $Function->Translate('_buttons_module'); ?></legend>
                    <div class="card_button_flex">
                        <div class="inputs-inline">
                            <input type="radio" name="buttons_module" id="buttons_module_1" value="1" <?= ($setting['buttons'] == 1) ? 'checked' : '' ?>>
                            <label for="buttons_module_1"><?= $Function->Translate('_buttons_module_1'); ?></label>
                        </div>
                        <div class="inputs-inline">
                            <input type="radio" name="buttons_module" id="buttons_module_2" value="0" <?= ($setting['buttons'] == 0) ? 'checked' : '' ?>>
                            <label for="buttons_module_2"><?= $Function->Translate('_buttons_module_2'); ?></label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><?= $Function->Translate('_team_module'); ?></legend>
                    <div class="card_button_flex">
                        <div class="inputs-inline">
                            <input type="radio" name="team_module" id="team_module_1" value="1" <?= ($setting['team'] == 1) ? 'checked' : '' ?>>
                            <label for="team_module_1"><?= $Function->Translate('_team_module_1'); ?></label>
                        </div>
                        <div class="inputs-inline">
                            <input type="radio" name="team_module" id="team_module_2" value="0" <?= ($setting['team'] == 0) ? 'checked' : '' ?>>
                            <label for="team_module_2"><?= $Function->Translate('_team_module_2'); ?></label>
                        </div>
                    </div>
                </fieldset>
                <button class="width-100" type="submit"><?= $Function->Translate('_stats_save_settings'); ?></button>
            </form>
            <div class="adminpanel-settings-servers flex-1">
                <?php if ($Function->Settings('type') == 2) : ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?= $Function->Translate('_stats_name_serv'); ?></th>
                                    <th>IP</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $servers = $Db->queryAll('Skins', 0, 0, "SELECT * FROM `sc_servers`");
                                foreach ($servers as $server): ?>
                                    <tr>
                                        <td><?= $server['id'] . ' | ' . $server['name'] ?></td>
                                        <td><?= $server['ip_address'] . ':' . $server['port'] ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="button-delete" id="server_delete" id_server="<?= $server['id'] ?>">
                                                    <?= $Translate->get_translate_phrase('_Delete_Action') ?>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <form class="adminpanel-settings-servers-form height-100" id="add_servers_sk" method="post">
                        <div class="flex-inline">
                            <div class="inputs-inline">
                                <label for="skinchangerServer"><?= $Function->Translate('_stats_name_serv_pls'); ?></label>
                                <input id="skinchangerServer" type="text" name="name_server" placeholder="<?= $Function->Translate('_stats_serv1'); ?>" required="">
                            </div>
                            <div class="inputs-inline">
                                <label for="skinchangerIp"><?= $Function->Translate('_stats_ippls'); ?></label>
                                <input id="skinchangerIp" type="text" name="ip_server" placeholder="XXX.XXX.XXX.XX:XXXXX" required="">
                            </div>
                        </div>
                        <button class="width-100 margin-top-auto" type="submit"><?= $Function->Translate('_stats_addserv'); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>