<div class="block-container">
    <div class="blocks-sort" <?= ($page == "weapons") ? '' : 'style="display:none"'; ?>>
        <button id="sort-skins" id_sort="All" data-tippy-content="<?= $Function->Translate('_all_skins'); ?>" data-tippy-placement="right">
            <img src="/app/modules/module_page_skins/assets/img/menu/All.png">
        </button>
        <button id="sort-skins" id_sort="Pistol" data-tippy-content="<?= $Function->Translate('_pistol'); ?>" data-tippy-placement="right">
            <img src="/app/modules/module_page_skins/assets/img/menu/Pistols.png">
        </button>
        <button id="sort-skins" id_sort="SMG" data-tippy-content="<?= $Function->Translate('_smg'); ?>" data-tippy-placement="right">
            <img src="/app/modules/module_page_skins/assets/img/menu/Smgs.png">
        </button>
        <button id="sort-skins" id_sort="Heavy" data-tippy-content="<?= $Function->Translate('_machine_gun'); ?>/<?= $Function->Translate('_shotgun'); ?>" data-tippy-placement="right">
            <img src="/app/modules/module_page_skins/assets/img/menu/Heavy.png">
        </button>
        <button id="sort-skins" id_sort="Rifle" data-tippy-content="<?= $Function->Translate('_rifle'); ?>" data-tippy-placement="right">
            <img src="/app/modules/module_page_skins/assets/img/menu/Rifles.png">
        </button>
        <button id="sort-skins" id_sort="Knife" data-tippy-content="<?= $Function->Translate('_knife'); ?>" data-tippy-placement="right">
            <img src="/app/modules/module_page_skins/assets/img/menu/Knives.png">
        </button>
        <button id="sort-skins" id_sort="Gloves" data-tippy-content="<?= $Function->Translate('_gloves'); ?>" data-tippy-placement="right">
            <img src="/app/modules/module_page_skins/assets/img/menu/Gloves.png">
        </button>
    </div>
    <div class="block-loader">
        <div class="loader-skins"></div>
    </div>
    <div id="html-js" class="blocks-skins"></div>
</div>
<div class="skin-modal">
    <div class="fon-modal">
        <span class="text_modal"><?= $Function->Translate('_text_modal'); ?>
            <a class="modal-btn__close">
                <svg>
                    <use href="/resources/img/sprite.svg#x"></use>
                </svg>
            </a>
        </span>
        <div class="flex_mon_ms">
            <div class="my-info-skin"><?= $Function->Translate('_my_info_skin'); ?>: <a id="my-skin">Загрузка...</a></div>
            <div class="cnopick"></div>
        </div>
        <div id="skin-modal-js"></div>
    </div>
</div>
<div class="skin-modal-overlay"></div>