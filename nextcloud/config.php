<?php
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' =>
  array (
    0 =>
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 =>
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'memcache.distributed' => '\\OC\\Memcache\\Redis',
  'memcache.locking' => '\\OC\\Memcache\\Redis',
  'redis' =>
  array (
    'host' => 'redis',
    'password' => '',
    'port' => 6379,
  ),
  'upgrade.disable-web' => true,
  'instanceid' => 'ocebup0u56cr',
  'passwordsalt' => 'enlQjD16Wb54iEbILh4DFJf+ngpN7Y',
  'secret' => '0ImT4JxwOHXWm9qbmwAoOyWMfX5X/teqrHOecQ/sT/J1JMxK',
  'trusted_domains' =>
  array (
    0 => 'nextcloud-pc.ryanfaiz.com',
    1 => 'localhost:8080',
    2 => '172.27.173.206:8080',
    3 => 'onlyoffice-pc.ryanfaiz.com',
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'pgsql',
  'version' => '31.0.4.1',
  'overwrite.cli.url' => 'http://nextcloud-pc.ryanfaiz.com',
  'overwritehost' => 'nextcloud-pc.ryanfaiz.com',
  'overwriteprotocol' => 'https',
  'dbname' => 'nextcloud',
  'dbhost' => 'postgres',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'dbuser' => 'oc_ryanfaiz',
  'dbpassword' => 'HTcFQeK7sY7axSRdA9W4VsoQu42FJm',
  'installed' => true,
  'app_install_overwrite' =>
  array (
  ),
);