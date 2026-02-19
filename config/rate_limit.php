<?php

return array (
  'enabled' => true,
  'policy' => 'fixed_window',
  'limit' => 60,
  'interval' => '1 minute',
  'by' => 'ip',
  'headers' => true,
  'key_prefix' => 'rl:',
  'hash_keys' => true,
  'rate' => 
  array (
    'amount' => 1,
  ),
);
