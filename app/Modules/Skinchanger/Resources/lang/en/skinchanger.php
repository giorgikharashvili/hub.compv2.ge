<?php

return [
    'title' => 'Skinchanger',

    'not_logged_in' => 'To use Skinchanger, you need to log in to your account.',
    'not_steam_account' => 'To use Skinchanger, you need to link your Steam account.',

    // Teams
    'teams' => [
        'ct' => 'CT',
        't' => 'T',
        'counter_terrorist' => 'Counter-Terrorists',
        'terrorist' => 'Terrorists',
        'both' => 'Both teams',
        'ct_only' => 'CT only',
        't_only' => 'T only',
    ],

    // Defaults
    'defaults' => [
        'ct_agent' => 'CT Agent',
        't_agent' => 'T Agent',
        'no_coin' => 'No coin',
        'default_music' => 'Default music',
        'default_gloves' => 'Default gloves',
        'default_knife' => 'Default knife',
    ],

    // Buttons
    'buttons' => [
        'change_agent' => 'Change agent',
        'reset_all' => 'Reset all for team',
        'add_loadout' => 'Add loadout',
        'save_loadout' => 'Save loadout',
        'cancel' => 'Cancel',
        'create' => 'Create',
        'apply' => 'Apply',
        'preview' => 'Preview',
        'close' => 'Close',
        'load_more' => 'Load more',
        'copy_to_opposite' => 'Copy to opposite team',
        'back_to_types' => 'Back to Types',
        'remove_charm' => 'Remove Charm',
        'remove_sticker' => 'Remove Sticker',
    ],

    // Search
    'search' => [
        'placeholder' => 'Search skins...',
        'no_skins' => 'No skins found for :weapon',
        'try_different' => 'Try different keywords or remove filters.',
        'search_items' => 'Search :category...',
        'weapon_search' => 'Search weapons...',
    ],

    // Rarity
    'rarity' => [
        'all' => 'All rarities',
        'consumer_grade' => 'Consumer Grade',
        'industrial_grade' => 'Industrial Grade',
        'mil_spec' => 'Mil-Spec',
        'restricted' => 'Restricted',
        'classified' => 'Classified',
        'covert' => 'Covert',
        'contraband' => 'Contraband',
        'common' => 'Common',
    ],

    // Quality
    'quality' => [
        'factory_new' => 'Factory New',
        'minimal_wear' => 'Minimal Wear',
        'field_tested' => 'Field-Tested',
        'well_worn' => 'Well-Worn',
        'battle_scarred' => 'Battle-Scarred',
    ],

    // Skins
    'skins' => [
        'default' => 'Default',
        'unknown' => 'Unknown skin',
        'select' => 'Select skin',
        'applied' => 'Skin applied',
        'removed' => 'Skin removed',
    ],

    // Weapons
    'weapon' => [
        'add_skin' => 'Add skin to :weapon',
    ],

    'weapons' => [
        'select' => 'Select weapon type',
    ],

    // Results
    'results' => [
        'showing' => 'Showing :count of :total',
        'all_loaded' => 'All skins loaded',
    ],

    // Loading
    'loading' => [
        'skins' => 'Loading skins...',
        'more_skins' => 'Loading more skins...',
        'items' => 'Loading items...',
        'more_items' => 'Loading more items...',
        'loadout' => 'Loading loadout...',
    ],

    // Community
    'community' => [
        'title' => 'Community loadouts',
        'by' => 'by',
        'downloads' => 'downloads',
        'view_more' => 'View more',
        'pro_setup' => 'Pro setup',
        'budget_beast' => 'Budget beast',
        'colorful' => 'Colorful',
    ],

    // Items
    'items' => [
        'agents' => 'Agents',
        'knives' => 'Knives',
        'gloves' => 'Gloves',
        'coins' => 'Coins',
        'music' => 'Music kits',
        'stickers' => 'Stickers',
        'keychains' => 'Keychains',
        'select_agent' => 'Select agent',
        'select_knife' => 'Select knife',
        'select_gloves' => 'Select gloves',
        'select_coin' => 'Select coin',
        'select_music' => 'Select music kit',
        'select' => 'Select item',
        'no_items' => 'No :category available',
        'unknown' => 'Unknown item',
        'default' => 'Default',
        'both' => 'Both teams',
    ],

    // Loadouts
    'loadouts' => [
        'title' => 'Loadouts',
        'current' => 'Current loadout',
        'create_new' => 'Create new loadout',
        'name' => 'Loadout name',
        'description' => 'Description',
        'name_placeholder' => 'Enter loadout name...',
        'description_placeholder' => 'Describe your loadout...',
        'created' => 'Loadout ":name" created',
        'applied' => 'Loadout ":name" applied',
        'switched' => 'Switched to ":name"',
        'enter_name' => 'Enter loadout name',
        'coming_soon' => 'Coming soon',
        'add_new' => 'Add new loadout',
        'preview' => 'Preview',
    ],

    // Profile
    'profile' => [
        'tab_name' => 'Weapons',
        'server' => 'Server',
        'no_weapons' => 'No configured weapons for this team',
    ],

    'errors' => [
        'title' => 'Error',
        'user_not_found' => 'User not found',
        'steam_not_found' => 'User Steam ID not found',
        'profile_load_error' => 'An error occurred while loading weapons profile',
        'no_servers' => 'No servers available',
        'steam_required' => 'Steam account linking required',
        'save_failed' => 'Failed to save',
        'load_failed' => 'Failed to load',
        'generic' => 'An error occurred',
    ],

    'unknown_weapon' => 'Unknown weapon',
    'wear' => 'Wear',

    // Confirm dialogs
    'confirm' => [
        'remove_skin' => 'Are you sure you want to remove this skin?',
        'remove_item' => 'Are you sure you want to remove this {item}?',
        'reset_all_skins' => 'Are you sure you want to reset ALL skins for this team? This action cannot be undone.',
        'copy_to_opposite' => 'Are you sure you want to copy all skins from {source} to {team}? This will overwrite existing skins for {team} team.',
    ],

    // Messages
    'messages' => [
        'reset_confirm' => 'Are you sure you want to reset all skins?',
        'all_reset' => 'All skins reset to default',
        'apply_loadout_confirm' => 'Apply loadout ":name"? This will replace your current configuration.',
        'saved' => 'Saved',
        'error' => 'Error',
        'steam_required' => 'Steam account linking required',
        'settings_applied' => 'Settings applied successfully',
        'settings_apply_error' => 'Failed to apply settings',
        'skinEquipped' => 'Skin {:skin} equipped',
        'itemEquipped' => 'Item {:item} equipped',
        'loadingError' => 'Error loading {item}',
        'failedToSave' => 'Failed to save {item}',
        'confirmRemoveItem' => 'Are you sure you want to remove this {item}?',
        'itemRemoved' => '{item} successfully removed',
        'failedToRemove' => 'Failed to remove {item}',
        'confirmCopyToOpposite' => 'Are you sure you want to copy all skins from {source} to {team}? This will overwrite existing skins for {team} team.',
        'skinsCopied' => 'Skins copied to {team} team',
        'failedToCopy' => 'Failed to copy skins',
        'skinRemoved' => 'Skin successfully removed',
        'appliedToBothTeams' => 'Skin applied to both teams',
        'appliedToOneTeam' => 'Skin applied to one team only',
        'failedToApply' => 'Failed to apply skin',
        'appliedToTeam' => 'Skin applied to {team} team',
        'teamCT' => 'CT',
        'teamT' => 'T',
        'noWeaponsFound' => 'No weapons found for your query',
        'confirmResetAllSkins' => 'Are you sure you want to reset ALL skins for this team? This action cannot be undone.',
        'skin_removed' => 'Skin successfully removed',
        'item_removed' => '{item} successfully removed',
        'all_skins_reset' => 'All skins reset successfully',
        'skins_copied' => 'Skins successfully copied to {team} team',
        'skin_equipped' => 'Skin {skin} equipped',
        'item_equipped' => 'Item {item} equipped',
        'applied_to_team' => 'Skin applied to {team} team',
        'applied_to_both_teams' => 'Skin applied to both teams',
        'applied_to_one_team' => 'Skin applied to one team only',
        'failed_to_apply' => 'Failed to apply skin',
        'failed_to_remove' => 'Failed to remove {item}',
        'failed_to_reset' => 'Failed to reset skins',
        'failed_to_copy' => 'Failed to copy skins',
        'failed_to_save' => 'Failed to save {item}',
        'error_occurred' => 'An error occurred',
        'loading_error' => 'Failed to load {item}. Please try again.',
        'no_items_found' => 'No items found',
        'invalid_server' => 'Invalid server',
        'invalid_team' => 'Invalid team',
        'invalid_weapon' => 'Invalid weapon',
        'invalid_item_type' => 'Invalid item type',
        'item_not_found' => 'Item not found',
        'agent_not_for_team' => 'This agent is not available for the selected team',
        'weapon_not_for_team' => 'This weapon is not available for the selected team',
        'skin_not_for_weapon' => 'This skin is not available for this weapon',
        'validation_error' => 'Validation error',
    ],

    // Stickers
    'stickers' => [
        'title' => 'Select sticker',
        'search' => 'Search stickers...',
        'found' => 'Found: :count',
        'remove' => 'Remove sticker',
        'no_results' => 'Nothing found',
        'no_stickers' => 'No stickers found',
        'remove_confirm' => 'Are you sure you want to remove this sticker?',
    ],

    // Charms
    'charms' => [
        'title' => 'Select charm',
        'search' => 'Search charms...',
        'found' => 'Found: :count',
        'remove' => 'Remove charm',
        'no_results' => 'Nothing found',
        'no_charms' => 'No charms found',
        'remove_confirm' => 'Are you sure you want to remove this charm?',
    ],

    // Settings
    'settings' => [
        'title' => 'Skin settings',
        'float_wear' => 'Float wear',
        'nametag' => 'Enter nametag',
        'nametag_placeholder' => 'Enter name...',
        'pattern' => 'Select pattern',
        'stattrack' => 'StatTrak™',
        'stickers_label' => 'Stickers',
        'charm_label' => 'Charm',
        'applying' => 'Applying...',
    ],

    // Pagination
    'pagination' => [
        'page_x_of_y' => 'page :page of :total',
    ],

    'vip_required' => 'VIP access required to use Skinchanger.',

    'admin' => [
        'title' => [
            'main' => 'Skinchanger',
            'settings' => 'Skinchanger Settings',
            'settings_description' => 'Configure Skinchanger access and behaviour',
        ],
        'buttons' => [
            'save' => 'Save',
        ],
        'labels' => [
            'vip_only' => 'Require VIP',
            'vip_groups' => 'VIP Groups',
            'vip_check_mode' => 'VIP Check Mode',
            'vip_check_server' => 'Server for VIP check',
            'vip_only_message' => 'VIP Message Key',
        ],
        'placeholders' => [
            'vip_groups' => 'Enter VIP groups separated by comma',
        ],
        'popovers' => [
            'vip_only' => 'If enabled, only players with VIP status can access Skinchanger',
            'vip_groups' => 'List of VIP groups (comma-separated) that are allowed access. Leave empty to allow any VIP group.',
            'vip_check_mode' => 'Choose how VIP status should be verified',
            'vip_check_server' => 'Select the server on which VIP status will be checked',
            'vip_only_message' => 'The translation key for the VIP required tooltip.',
        ],
        'check_mode' => [
            'sid' => 'By Skinchanger server (current)',
            'global' => 'Global (any server)',
            'specific' => 'Specific server',
        ],
        'messages' => [
            'failed' => 'Failed to save settings',
            'saved' => 'Settings successfully saved',
        ],
        'refresh' => [
            'title' => 'API Data Refresh',
            'description' => 'Fetch the latest CS2 cosmetics from the public API. Existing data stays if a request fails.',
            'labels' => [
                'languages' => 'Languages to refresh',
                'types' => 'Data types',
                'clear_caches' => 'Clear caches after update',
                'rebuild_indexes' => 'Rebuild search indexes',
                'enable_en_fallback' => 'Enable English fallback',
            ],
            'placeholders' => [
                'languages' => 'Select languages',
                'types' => 'Select data types',
            ],
            'popovers' => [
                'languages' => 'Choose which language datasets should be downloaded again.',
                'types' => 'Pick the data groups you want to refresh from the API.',
                'clear_caches' => 'Flush cached lookups so the fresh data is used immediately.',
                'rebuild_indexes' => 'Regenerate cached lookup indexes so search and filtering reflect the latest data.',
                'enable_en_fallback' => 'If enabled, then if the update fails on another language, the English language will be used as a fallback.',
            ],
            'help' => [
                'languages' => 'Hold Ctrl (or Cmd on macOS) to select multiple locales at once.',
                'types' => 'Large datasets can take longer—refresh them in smaller batches if the request is slow.',
                'clear_caches' => 'Keeps cached lookups in sync so users see the new cosmetics without delays.',
                'rebuild_indexes' => 'Required if you expect the admin or API search to show new items immediately.',
            ],
            'buttons' => [
                'refresh' => 'Refresh data',
            ],
            'messages' => [
                'no_selection' => 'Select at least one language and data type.',
                'success' => 'Refresh finished successfully (:success of :total tasks).',
                'partial' => 'Refresh finished with errors (:success of :total succeeded). Failed: :failed_list.',
                'error_service' => 'Unable to start refresh: :message',
                'caches_cleared' => 'Caches cleared.',
                'indexes_rebuilt' => 'Indexes rebuilt.',
                'indexes_failed' => 'Index rebuild failed (:message).',
            ],
            'type_options' => [
                'skins_not_grouped' => 'Weapon paints (flat)',
                'skins' => 'Weapon skins (grouped)',
                'stickers' => 'Stickers',
                'keychains' => 'Keychains',
                'agents' => 'Agents',
                'agents_weaponpaints' => 'Agent weapon paints',
                'music_kits' => 'Music kits',
                'collectibles' => 'Collectibles & coins',
                'collections' => 'Collections',
                'crates' => 'Cases',
                'keys' => 'Keys',
                'patches' => 'Patches',
                'graffiti' => 'Graffiti',
                'base_weapons' => 'Base weapons',
            ],
            'sections' => [
                'filters' => 'Download & post-processing',
            ],
            'info' => [
                'title' => 'Before you refresh',
                'intro' => 'The refresher downloads fresh JSON data for the selected languages and item groups from the community-maintained API.',
                'tips' => [
                    'selection' => 'Start with one or two data types to confirm the connection speed before launching a full refresh.',
                    'large' => 'Large datasets like :types may take noticeably longer—refresh them separately if your connection is limited.',
                    'cache' => 'Leave cache clearing enabled so the updated data is visible immediately in the admin panel and on the site.',
                    'indexes' => 'Keep “Rebuild search indexes” on to refresh fast lookups after new data arrives.',
                ],
                'timing' => 'Current request timeout: :timeout. Time budget per task: :budget.',
                'source' => 'Data source: <a href=":url" target="_blank" rel="noopener">:url</a>',
                'notice' => 'This action downloads a large archive (~114MB) for all supported languages and extracts item data. It may take up to 5 minutes. Please do not close the page until it completes.',
            ],
        ],
    ],

    // VIP
    'vip' => [
        'required' => 'VIP Required',
        'required_message' => 'This feature requires VIP status',
        'required_tooltip' => 'VIP status is required to use this item',
    ],
];
