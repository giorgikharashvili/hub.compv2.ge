<?php

return array (
  'default' => 'default',
  'debug' => false,
  'databases' => 
  array (
    'default' => 
    array (
      'connection' => 'default',
      'prefix' => 'flute_',
    ),
    'Server#1' => 
    array (
      'connection' => 'Server#1',
      'prefix' => '',
    ),
  ),
  'connections' => 
  array (
    'default' => 
    \Cycle\Database\Config\MySQLDriverConfig::__set_state(array(
       'options' => 
      array (
        'withDatetimeMicroseconds' => false,
        'logInterpolatedQueries' => false,
        'logQueryParameters' => false,
      ),
       'defaultOptions' => 
      array (
        'withDatetimeMicroseconds' => false,
        'logInterpolatedQueries' => false,
        'logQueryParameters' => false,
      ),
       'connection' => 
      \Cycle\Database\Config\MySQL\TcpConnectionConfig::__set_state(array(
         'nonPrintableOptions' => 
        array (
          0 => 'password',
          1 => 'PWD',
        ),
         'user' => 'compvge_fluteuser',
         'password' => 'iCT4b:-n&3FR8kX',
         'options' => 
        array (
          8 => 0,
          3 => 2,
          1002 => 'SET NAMES utf8mb4',
          17 => false,
        ),
         'port' => 3306,
         'database' => 'compvge_flute',
         'host' => 'localhost',
         'charset' => 'utf8mb4',
      )),
       'driver' => 'Cycle\\Database\\Driver\\MySQL\\MySQLDriver',
       'reconnect' => true,
       'timezone' => 'UTC',
       'queryCache' => true,
       'readonlySchema' => false,
       'readonly' => false,
    )),
    'Server#1' => 
    \Cycle\Database\Config\MySQLDriverConfig::__set_state(array(
       'options' => 
      array (
        'withDatetimeMicroseconds' => false,
        'logInterpolatedQueries' => false,
        'logQueryParameters' => false,
      ),
       'defaultOptions' => 
      array (
        'withDatetimeMicroseconds' => false,
        'logInterpolatedQueries' => false,
        'logQueryParameters' => false,
      ),
       'connection' => 
      \Cycle\Database\Config\MySQL\TcpConnectionConfig::__set_state(array(
         'nonPrintableOptions' => 
        array (
          0 => 'password',
          1 => 'PWD',
        ),
         'user' => 'u362_whVF6q5pgv',
         'password' => 'vbw92M.=RMkAKYyKsNQx.S@7',
         'options' => 
        array (
          8 => 0,
          3 => 2,
          1002 => 'SET NAMES utf8mb4',
          17 => false,
        ),
         'port' => 3306,
         'database' => 's362_PluginsDb',
         'host' => '185.143.177.14',
         'charset' => NULL,
      )),
       'driver' => 'Cycle\\Database\\Driver\\MySQL\\MySQLDriver',
       'reconnect' => true,
       'timezone' => 'Asia/Yekaterinburg',
       'queryCache' => true,
       'readonlySchema' => false,
       'readonly' => false,
    )),
  ),
);
