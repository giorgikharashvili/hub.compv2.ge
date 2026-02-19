<?php return array (
  'promoCodeRole' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PromoCodeRole',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'promo_code_roles',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'promoCode_id' => 'promoCode_id',
      'role_id' => 'role_id',
    ),
    10 => 
    array (
      'promoCode' => 
      array (
        0 => 12,
        1 => 'promoCode',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'promoCode_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'role' => 
      array (
        0 => 12,
        1 => 'role',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'role_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'promoCode_id' => 'int',
      'role_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'userActionLog' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\UserActionLog',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'user_action_logs',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'action' => 'action',
      'message' => 'message',
      'data' => 'data',
      'level' => 'level',
      'createdAt' => 'created_at',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'action' => 'string',
      'message' => 'string',
      'data' => 'string',
      'level' => 'string',
      'createdAt' => 'datetime',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
    ),
  ),
  'redirectCondition' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\RedirectCondition',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'redirect_conditions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'type' => 'type',
      'operator' => 'operator',
      'value' => 'value',
      'conditionGroup_id' => 'conditionGroup_id',
    ),
    10 => 
    array (
      'conditionGroup' => 
      array (
        0 => 12,
        1 => 'conditionGroup',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'conditionGroup_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'type' => 'string',
      'operator' => 'string',
      'value' => 'string',
      'conditionGroup_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'theme' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Theme',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'themes',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'key' => 'key',
      'name' => 'name',
      'version' => 'version',
      'author' => 'author',
      'description' => 'description',
      'status' => 'status',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
      'settings' => 
      array (
        0 => 11,
        1 => 'themeSettings',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'theme_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'key' => 'string',
      'name' => 'string',
      'version' => 'string',
      'author' => 'string',
      'description' => 'string',
      'status' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'navbarItemRole' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\NavbarItemRole',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'navbar_item_roles',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'navbarItem_id' => 'navbarItem_id',
      'role_id' => 'role_id',
    ),
    10 => 
    array (
      'navbarItem' => 
      array (
        0 => 12,
        1 => 'navbarItem',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'navbarItem_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'role' => 
      array (
        0 => 12,
        1 => 'role',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'role_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'navbarItem_id' => 'int',
      'role_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'promoCode' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PromoCode',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'promo_codes',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'code' => 'code',
      'max_usages' => 'max_usages',
      'max_uses_per_user' => 'max_uses_per_user',
      'type' => 'type',
      'value' => 'value',
      'minimum_amount' => 'minimum_amount',
      'expires_at' => 'expires_at',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
      'usages' => 
      array (
        0 => 11,
        1 => 'promoCodeUsage',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'promoCode_id',
          4 => NULL,
        ),
      ),
      'roles' => 
      array (
        0 => 14,
        1 => 'role',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'promoCodeRole',
          50 => 'promoCode_id',
          51 => 'role_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'code' => 'string',
      'max_usages' => 'int',
      'max_uses_per_user' => 'int',
      'type' => 'string',
      'value' => 'float',
      'minimum_amount' => 'float',
      'expires_at' => 'datetime',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'themeSettings' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\ThemeSettings',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'theme_settings',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'key' => 'key',
      'name' => 'name',
      'value' => 'value',
      'description' => 'description',
      'theme_id' => 'theme_id',
    ),
    10 => 
    array (
      'theme' => 
      array (
        0 => 12,
        1 => 'theme',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'theme_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'key' => 'string',
      'name' => 'string',
      'value' => 'string',
      'description' => 'string',
      'theme_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'rememberToken' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\RememberToken',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'remember_tokens',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'token' => 'token',
      'lastUsedAt' => 'last_used_at',
      'user_id' => 'user_id',
      'userDevice_id' => 'userDevice_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'userDevice' => 
      array (
        0 => 12,
        1 => 'userDevice',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'userDevice_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'token' => 'string',
      'lastUsedAt' => 'datetime',
      'user_id' => 'int',
      'userDevice_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'apiKey' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\ApiKey',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'api_keys',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'key' => 'key',
      'name' => 'name',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'lastUsedAt' => 'last_used_at',
    ),
    10 => 
    array (
      'permissions' => 
      array (
        0 => 14,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'apiKeyPermission',
          50 => 'apiKey_id',
          51 => 'permission_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'key' => 'string',
      'name' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'lastUsedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'userRole' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\UserRole',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'user_roles',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'user_id' => 'user_id',
      'role_id' => 'role_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'role' => 
      array (
        0 => 12,
        1 => 'role',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'role_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'user_id' => 'int',
      'role_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'page' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Page',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'pages',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'route' => 'route',
      'title' => 'title',
      'description' => 'description',
      'keywords' => 'keywords',
      'robots' => 'robots',
      'og_image' => 'og_image',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
      'blocks' => 
      array (
        0 => 11,
        1 => 'pageBlock',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'page_id',
          4 => NULL,
        ),
      ),
      'permissions' => 
      array (
        0 => 14,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'pagePermission',
          50 => 'page_id',
          51 => 'permission_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'route' => 'string',
      'title' => 'string',
      'description' => 'string',
      'keywords' => 'string',
      'robots' => 'string',
      'og_image' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'bucket' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Bucket',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Flute\\Core\\Database\\Repositories\\BucketRepository',
    5 => 'default',
    6 => 'buckets',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'tokens' => 'tokens',
      'replenishedAt' => 'replenished_at',
      'expiresAt' => 'expires_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'string',
      'tokens' => 'int',
      'replenishedAt' => 'int',
      'expiresAt' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'databaseConnection' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\DatabaseConnection',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'database_connections',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'mod' => 'mod',
      'dbname' => 'dbname',
      'additional' => 'additional',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'server_id' => 'server_id',
    ),
    10 => 
    array (
      'server' => 
      array (
        0 => 12,
        1 => 'server',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'server_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'mod' => 'string',
      'dbname' => 'string',
      'additional' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'server_id' => 'int',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'userSocialNetwork' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\UserSocialNetwork',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'user_social_networks',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'value' => 'value',
      'url' => 'url',
      'name' => 'name',
      'hidden' => 'hidden',
      'linkedAt' => 'linked_at',
      'additional' => 'additional',
      'socialNetwork_id' => 'socialNetwork_id',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'socialNetwork' => 
      array (
        0 => 12,
        1 => 'socialNetwork',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'socialNetwork_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'value' => 'string',
      'url' => 'string',
      'name' => 'string',
      'hidden' => 'bool',
      'linkedAt' => 'datetime',
      'additional' => 'string',
      'socialNetwork_id' => 'int',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'pagePermission' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PagePermission',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'page_permissions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'page_id' => 'page_id',
      'permission_id' => 'permission_id',
    ),
    10 => 
    array (
      'page' => 
      array (
        0 => 12,
        1 => 'page',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'page_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'permission' => 
      array (
        0 => 12,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'permission_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'page_id' => 'int',
      'permission_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'redirect' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Redirect',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'redirects',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'fromUrl' => 'from_url',
      'toUrl' => 'to_url',
    ),
    10 => 
    array (
      'conditionGroups' => 
      array (
        0 => 11,
        1 => 'conditionGroup',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'redirect_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'fromUrl' => 'string',
      'toUrl' => 'string',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'verificationToken' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\VerificationToken',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'verification_tokens',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'token' => 'token',
      'expiresAt' => 'expires_at',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'token' => 'string',
      'expiresAt' => 'datetime',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'server' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Server',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'servers',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
      'ip' => 'ip',
      'port' => 'port',
      'mod' => 'mod',
      'rcon' => 'rcon',
      'display_ip' => 'display_ip',
      'ranks' => 'ranks',
      'ranks_premier' => 'ranks_premier',
      'ranks_format' => 'ranks_format',
      'additional' => 'additional',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'enabled' => 'enabled',
    ),
    10 => 
    array (
      'dbconnections' => 
      array (
        0 => 11,
        1 => 'databaseConnection',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'server_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
      'ip' => 'string',
      'port' => 'int',
      'mod' => 'string',
      'rcon' => 'string',
      'display_ip' => 'string',
      'ranks' => 'string',
      'ranks_premier' => 'bool',
      'ranks_format' => 'string',
      'additional' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'enabled' => 'bool',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'apiKeyPermission' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\ApiKeyPermission',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'api_key_permissions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'apiKey_id' => 'apiKey_id',
      'permission_id' => 'permission_id',
    ),
    10 => 
    array (
      'apiKey' => 
      array (
        0 => 12,
        1 => 'apiKey',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'apiKey_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'permission' => 
      array (
        0 => 12,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'permission_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'apiKey_id' => 'int',
      'permission_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'notification' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Notification',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'notifications',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'icon' => 'icon',
      'url' => 'url',
      'title' => 'title',
      'content' => 'content',
      'type' => 'type',
      'extra_data' => 'extra_data',
      'viewed' => 'viewed',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'icon' => 'string',
      'url' => 'string',
      'title' => 'string',
      'content' => 'string',
      'type' => 'string',
      'extra_data' => 'string',
      'viewed' => 'bool',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'rolePermission' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\RolePermission',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'role_permissions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'role_id' => 'role_id',
      'permission_id' => 'permission_id',
    ),
    10 => 
    array (
      'role' => 
      array (
        0 => 12,
        1 => 'role',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'role_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'permission' => 
      array (
        0 => 12,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'permission_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'role_id' => 'int',
      'permission_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'pageBlock' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PageBlock',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'page_blocks',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'widget' => 'widget',
      'gridstack' => 'gridstack',
      'settings' => 'settings',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'page_id' => 'page_id',
    ),
    10 => 
    array (
      'page' => 
      array (
        0 => 12,
        1 => 'page',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'page_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'permissions' => 
      array (
        0 => 14,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'pageBlockPermission',
          50 => 'pageBlock_id',
          51 => 'permission_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'widget' => 'string',
      'gridstack' => 'string',
      'settings' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'page_id' => 'int',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'paymentGateway' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PaymentGateway',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'payment_gateways',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
      'image' => 'image',
      'adapter' => 'adapter',
      'enabled' => 'enabled',
      'additional' => 'additional',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
      'image' => 'string',
      'adapter' => 'string',
      'enabled' => 'bool',
      'additional' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'currencyPaymentGateway' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\CurrencyPaymentGateway',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'currency_payment_gateways',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'currency_id' => 'currency_id',
      'paymentGateway_id' => 'paymentGateway_id',
    ),
    10 => 
    array (
      'currency' => 
      array (
        0 => 12,
        1 => 'currency',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'currency_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'paymentGateway' => 
      array (
        0 => 12,
        1 => 'paymentGateway',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'paymentGateway_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'currency_id' => 'int',
      'paymentGateway_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'module' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Module',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'modules',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'key' => 'key',
      'name' => 'name',
      'description' => 'description',
      'installedVersion' => 'installed_version',
      'status' => 'status',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'key' => 'string',
      'name' => 'string',
      'description' => 'string',
      'installedVersion' => 'string',
      'status' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'pageBlockPermission' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PageBlockPermission',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'page_block_permissions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'pageBlock_id' => 'pageBlock_id',
      'permission_id' => 'permission_id',
    ),
    10 => 
    array (
      'permission' => 
      array (
        0 => 12,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'permission_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'pageBlock_id' => 'int',
      'permission_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'user' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\User',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Flute\\Core\\Database\\Repositories\\UserRepository',
    5 => 'default',
    6 => 'users',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'login' => 'login',
      'uri' => 'uri',
      'name' => 'name',
      'avatar' => 'avatar',
      'banner' => 'banner',
      'email' => 'email',
      'password' => 'password',
      'verified' => 'verified',
      'hidden' => 'hidden',
      'isTemporary' => 'is_temporary',
      'balance' => 'balance',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'last_logged' => 'last_logged',
      'password_updated_at' => 'password_updated_at',
      'deletedAt' => 'deleted_at',
      'two_factor_secret' => 'two_factor_secret',
      'two_factor_recovery_codes' => 'two_factor_recovery_codes',
      'two_factor_confirmed_at' => 'two_factor_confirmed_at',
    ),
    10 => 
    array (
      'socialNetworks' => 
      array (
        0 => 11,
        1 => 'userSocialNetwork',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'roles' => 
      array (
        0 => 14,
        1 => 'role',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'userRole',
          50 => 'user_id',
          51 => 'role_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
      'rememberTokens' => 
      array (
        0 => 11,
        1 => 'rememberToken',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'userDevices' => 
      array (
        0 => 11,
        1 => 'userDevice',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'blocksGiven' => 
      array (
        0 => 11,
        1 => 'userBlock',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'blocksReceived' => 
      array (
        0 => 11,
        1 => 'userBlock',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'actionLogs' => 
      array (
        0 => 11,
        1 => 'userActionLog',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'invoices' => 
      array (
        0 => 11,
        1 => 'paymentInvoice',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'user_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'login' => 'string',
      'uri' => 'string',
      'name' => 'string',
      'avatar' => 'string',
      'banner' => 'string',
      'email' => 'string',
      'password' => 'string',
      'verified' => 'bool',
      'hidden' => 'bool',
      'isTemporary' => 'bool',
      'balance' => 'float',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'last_logged' => 'datetime',
      'password_updated_at' => 'datetime',
      'deletedAt' => 'datetime',
      'two_factor_secret' => 'string',
      'two_factor_recovery_codes' => 'string',
      'two_factor_confirmed_at' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'role' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Role',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'roles',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
      'icon' => 'icon',
      'color' => 'color',
      'priority' => 'priority',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
      'permissions' => 
      array (
        0 => 14,
        1 => 'permission',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'rolePermission',
          50 => 'role_id',
          51 => 'permission_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
      'icon' => 'string',
      'color' => 'string',
      'priority' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'footerItem' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\FooterItem',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'footer_items',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'title' => 'title',
      'icon' => 'icon',
      'url' => 'url',
      'new_tab' => 'new_tab',
      'position' => 'position',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'parent_id' => 'parent_id',
    ),
    10 => 
    array (
      'parent' => 
      array (
        0 => 12,
        1 => 'footerItem',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 
          array (
            0 => 'parent_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'children' => 
      array (
        0 => 11,
        1 => 'footerItem',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'parent_id',
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'title' => 'string',
      'icon' => 'string',
      'url' => 'string',
      'new_tab' => 'bool',
      'position' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'parent_id' => 'int',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'passwordResetToken' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PasswordResetToken',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'password_reset_tokens',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'token' => 'token',
      'expiry' => 'expiry',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'token' => 'string',
      'expiry' => 'datetime',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'conditionGroup' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\ConditionGroup',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'condition_groups',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'redirect_id' => 'redirect_id',
    ),
    10 => 
    array (
      'conditions' => 
      array (
        0 => 11,
        1 => 'redirectCondition',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'conditionGroup_id',
          4 => NULL,
        ),
      ),
      'redirect' => 
      array (
        0 => 12,
        1 => 'redirect',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'redirect_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'redirect_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'paymentInvoice' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PaymentInvoice',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'payment_invoices',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'gateway' => 'gateway',
      'transactionId' => 'transaction_id',
      'amount' => 'amount',
      'originalAmount' => 'original_amount',
      'isPaid' => 'is_paid',
      'additional' => 'additional',
      'paidAt' => 'paid_at',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'promoCode_id' => 'promoCode_id',
      'currency_id' => 'currency_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'promoCode' => 
      array (
        0 => 12,
        1 => 'promoCode',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'promoCode_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'currency' => 
      array (
        0 => 12,
        1 => 'currency',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'currency_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'gateway' => 'string',
      'transactionId' => 'string',
      'amount' => 'float',
      'originalAmount' => 'float',
      'isPaid' => 'bool',
      'additional' => 'string',
      'paidAt' => 'datetime',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'promoCode_id' => 'int',
      'currency_id' => 'int',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'socialNetwork' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\SocialNetwork',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'social_networks',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'key' => 'key',
      'settings' => 'settings',
      'cooldownTime' => 'cooldown_time',
      'allowToRegister' => 'allow_to_register',
      'icon' => 'icon',
      'enabled' => 'enabled',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'key' => 'string',
      'settings' => 'string',
      'cooldownTime' => 'int',
      'allowToRegister' => 'bool',
      'icon' => 'string',
      'enabled' => 'bool',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'footerSocial' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\FooterSocial',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'footer_socials',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
      'icon' => 'icon',
      'url' => 'url',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
      'icon' => 'string',
      'url' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'promoCodeUsage' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\PromoCodeUsage',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'promo_code_usages',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'used_at' => 'used_at',
      'promoCode_id' => 'promoCode_id',
      'user_id' => 'user_id',
      'invoice_id' => 'invoice_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'promoCode' => 
      array (
        0 => 12,
        1 => 'promoCode',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'promoCode_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'invoice' => 
      array (
        0 => 12,
        1 => 'paymentInvoice',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'invoice_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'used_at' => 'datetime',
      'promoCode_id' => 'int',
      'user_id' => 'int',
      'invoice_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'currency' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Currency',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'currencies',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'code' => 'code',
      'minimum_value' => 'minimum_value',
      'exchange_rate' => 'exchange_rate',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
      'paymentGateways' => 
      array (
        0 => 14,
        1 => 'paymentGateway',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'currencyPaymentGateway',
          50 => 'currency_id',
          51 => 'paymentGateway_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'code' => 'string',
      'minimum_value' => 'float',
      'exchange_rate' => 'float',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'navbarItem' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\NavbarItem',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'navbar_items',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'title' => 'title',
      'description' => 'description',
      'url' => 'url',
      'new_tab' => 'new_tab',
      'icon' => 'icon',
      'position' => 'position',
      'visibleOnlyForGuests' => 'visible_only_for_guests',
      'visibleOnlyForLoggedIn' => 'visible_only_for_logged_in',
      'visibility' => 'visibility',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'parent_id' => 'parent_id',
    ),
    10 => 
    array (
      'parent' => 
      array (
        0 => 12,
        1 => 'navbarItem',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 
          array (
            0 => 'parent_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'children' => 
      array (
        0 => 11,
        1 => 'navbarItem',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'parent_id',
          ),
          4 => NULL,
        ),
      ),
      'roles' => 
      array (
        0 => 14,
        1 => 'role',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
          52 => 'navbarItemRole',
          50 => 'navbarItem_id',
          51 => 'role_id',
          54 => 
          array (
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'title' => 'string',
      'description' => 'string',
      'url' => 'string',
      'new_tab' => 'bool',
      'icon' => 'string',
      'position' => 'int',
      'visibleOnlyForGuests' => 'bool',
      'visibleOnlyForLoggedIn' => 'bool',
      'visibility' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'parent_id' => 'int',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'userDevice' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\UserDevice',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'user_devices',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'deviceDetails' => 'device_details',
      'ip' => 'ip',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'rememberTokens' => 
      array (
        0 => 11,
        1 => 'rememberToken',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 'userDevice_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'deviceDetails' => 'string',
      'ip' => 'string',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'userBlock' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\UserBlock',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'user_blocks',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'reason' => 'reason',
      'blockedFrom' => 'blocked_from',
      'blockedUntil' => 'blocked_until',
      'isActive' => 'is_active',
      'user_id' => 'user_id',
      'blockedBy_id' => 'blockedBy_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'blockedBy' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'blockedBy_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'reason' => 'string',
      'blockedFrom' => 'datetime',
      'blockedUntil' => 'datetime',
      'isActive' => 'bool',
      'user_id' => 'int',
      'blockedBy_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'permission' => 
  array (
    1 => 'Flute\\Core\\Database\\Entities\\Permission',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'permissions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
      'desc' => 'desc',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'name' => 'string',
      'desc' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    18 => 
    array (
      0 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\CreatedAt',
        1 => 
        array (
          'field' => 'createdAt',
        ),
      ),
      1 => 
      array (
        0 => 'Cycle\\ORM\\Entity\\Behavior\\Listener\\UpdatedAt',
        1 => 
        array (
          'field' => 'updatedAt',
          'nullable' => false,
        ),
      ),
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
      'createdAt' => 1,
      'updatedAt' => 5,
    ),
  ),
  'serverStatus' => 
  array (
    1 => 'Flute\\Modules\\Monitoring\\database\\Entities\\ServerStatus',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'server_statuses',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'online' => 'online',
      'players' => 'players',
      'max_players' => 'max_players',
      'map' => 'map',
      'game' => 'game',
      'players_data' => 'players_data',
      'additional' => 'additional',
      'updated_at' => 'updated_at',
      'server_id' => 'server_id',
    ),
    10 => 
    array (
      'server' => 
      array (
        0 => 12,
        1 => 'server',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'server_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'online' => 'bool',
      'players' => 'int',
      'max_players' => 'int',
      'map' => 'string',
      'game' => 'string',
      'players_data' => 'string',
      'additional' => 'string',
      'updated_at' => 'datetime',
      'server_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'profileCommentReaction' => 
  array (
    1 => 'Flute\\Modules\\ProfilePosts\\database\\Entities\\ProfileCommentReaction',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'profile_comment_reactions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'emoji_id' => 'emoji_id',
      'createdAt' => 'created_at',
      'comment_id' => 'comment_id',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'comment' => 
      array (
        0 => 12,
        1 => 'profilePostComment',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'comment_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'user_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'emoji_id' => 'string',
      'createdAt' => 'datetime',
      'comment_id' => 'int',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'profilePost' => 
  array (
    1 => 'Flute\\Modules\\ProfilePosts\\database\\Entities\\ProfilePost',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'profile_posts',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'content' => 'content',
      'image' => 'image',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'wall_user_id' => 'wall_user_id',
      'author_id' => 'author_id',
    ),
    10 => 
    array (
      'wallUser' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'wall_user_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'author' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'author_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'reactions' => 
      array (
        0 => 11,
        1 => 'profilePostReaction',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'post_id',
          ),
          4 => NULL,
        ),
      ),
      'comments' => 
      array (
        0 => 11,
        1 => 'profilePostComment',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'post_id',
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'content' => 'string',
      'image' => 'string',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'wall_user_id' => 'int',
      'author_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'profilePostComment' => 
  array (
    1 => 'Flute\\Modules\\ProfilePosts\\database\\Entities\\ProfilePostComment',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'profile_post_comments',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'content' => 'content',
      'createdAt' => 'created_at',
      'post_id' => 'post_id',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'post' => 
      array (
        0 => 12,
        1 => 'profilePost',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'post_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'user_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'reactions' => 
      array (
        0 => 11,
        1 => 'profileCommentReaction',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'comment_id',
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'content' => 'string',
      'createdAt' => 'datetime',
      'post_id' => 'int',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'profilePostReaction' => 
  array (
    1 => 'Flute\\Modules\\ProfilePosts\\database\\Entities\\ProfilePostReaction',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'profile_post_reactions',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'emoji_id' => 'emoji_id',
      'createdAt' => 'created_at',
      'post_id' => 'post_id',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'post' => 
      array (
        0 => 12,
        1 => 'profilePost',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'post_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 
          array (
            0 => 'user_id',
          ),
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'emoji_id' => 'string',
      'createdAt' => 'datetime',
      'post_id' => 'int',
      'user_id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
);