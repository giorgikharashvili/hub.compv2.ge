<?php
$module_status = $Function->ModuleStatus();
$type = $Function->Settings('type');
?>
<div class="row">
    <div class="col-md-12">
        <div class="servers_wrap">
            <a class="servers_button<?= ($page == 'weapons') ? ' server_buttons_active' : ''; ?>" <?= ($page == 'adminpanel') ? 'href="/skins/weapons/"' : 'id="weapons"'; ?>>
                <svg>
                    <use href="/resources/img/sprite.svg#pistol"></use>
                </svg>
                <div>
                    <b><?= $Function->Translate('_skins_butt') ?></b>
                    <span><?= $Function->Translate('_skins_butt_desc') ?></span>
                </div>
            </a>
            <a class="servers_button<?= ($page == 'agents') ? ' server_buttons_active' : ''; ?>" <?= ($page == 'adminpanel') ? 'href="/skins/agents/"' : 'id="agents"'; ?>>
                <svg>
                    <use href="/resources/img/sprite.svg#agent"></use>
                </svg>
                <div>
                    <b><?= $Function->Translate('_agents_butt') ?></b>
                    <span><?= $Function->Translate('_agents_butt_desc') ?></span>
                </div>
            </a>
            <a class="servers_button<?= ($page == 'music') ? ' server_buttons_active' : ''; ?>" <?= ($page == 'adminpanel') ? 'href="/skins/music/"' : 'id="music"'; ?>>
                <svg>
                    <use href="/resources/img/sprite.svg#vinyl"></use>
                </svg>
                <div>
                    <b><?= $Function->Translate('_kit_butt') ?></b>
                    <span><?= $Function->Translate('_kit_butt_desc') ?></span>
                </div>
            </a>
            <a class="servers_button<?= ($page == 'coins') ? ' server_buttons_active' : ''; ?>" <?= ($page == 'adminpanel') ? 'href="/skins/coins/"' : 'id="coins"'; ?>>
                <svg>
                    <use href="/resources/img/sprite.svg#badge-star"></use>
                </svg>
                <div>
                    <b><?= $Function->Translate('_monets_butt') ?></b>
                    <span><?= $Function->Translate('_monets_butt_desc') ?></span>
                </div>
            </a>
            <?php if (isset($_SESSION['user_admin'])) : ?>
                <a class="servers_button<?= ($page == 'adminpanel') ? ' server_buttons_active' : ''; ?>" href="/skins/adminpanel/">
                    <svg>
                        <use href="/resources/img/sprite.svg#gear"></use>
                    </svg>
                    <div>
                        <b><?= $Function->Translate('_adm_pan_butt') ?></b>
                        <span><?= $Function->Translate('_adm_pan_butt_desc') ?></span>
                    </div>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if ($page !== "adminpanel") : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="choosing_all">
                <div class="block_sides">
                    <button class="choosing_sides t-color" id="0">
                        <img src="/app/modules/module_page_skins/assets/img/t.svg" alt="">
                        <a class="t">T</a>
                    </button>
                    <button class="choosing_sides ct-color" id="1">
                        <img src="/app/modules/module_page_skins/assets/img/ct.svg" alt="">
                        <a class="ct">CT</a>
                    </button>
                </div>
                <div class="search-skin-input">
                    <input type="text" id="search_js_skins" placeholder="<?= $Function->Translate('_search') ?>">
                </div>
                <div class="block_servers">
                    <?php if ($Function->Settings('type') == 2) : ?>
                        <?php foreach ($Function->SCServers() as $Server):
                            $button_servers .= "<button class='choosing_servers' id='{$Server['id']}'>{$Server['name']}</button>";
                        endforeach;
                        echo $button_servers ?>
                    <?php else: ?>
                        <?php $SCServers = $Db->db_data['Skins'];
                        foreach ($SCServers as $key => $Server):
                            $button_servers .= "<button class='choosing_servers' id='{$key}'>{$Server['name']}</button>";
                        endforeach;
                        echo $button_servers ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['steamid64']) && $Function->Settings('buttons') == 1): ?>
        <div class="servers-modal">
            <div class="fon-modal">
                <span class="text_modal"><?= $Function->Translate('_servers_modal_name'); ?></span>
                <a class="modal-btn__close">
                    <svg viewBox="0 0 320 512">
                        <path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"></path>
                    </svg>
                </a>
                <div class="block_servers">
                    <?php echo $button_servers; ?>
                </div>
                <p><?= $Function->Translate('_servers_modal_info'); ?></p>
            </div>
        </div>
        <div class="servers-modal-overlay"></div>
    <?php endif; ?>
<?php endif; ?>