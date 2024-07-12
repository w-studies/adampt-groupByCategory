<?php

declare(strict_types=1);

namespace App;

class Config
{
  public static $DB;

  public static $PATHS;

  public static function init()
  {
    self::$DB = (object) [
      'driver'   => 'mysql',
      'host'     => 'localhost',
      'user'     => 'root',
      'password' => '',
      'name'     => 'pap',
      'charset'  => 'utf8mb4',
      'port'     => 3306,
    ];

    self::PATHS();

  }

  public static function PATHS()
  {
    $paths = [
      'PROJECT' => '../system/',
    ];
    $paths['MODULES'] = $paths['PROJECT'] . 'modules/';
    $paths['LAYOUTS'] = $paths['MODULES'] . 'layouts/';

    self::$PATHS = (object) $paths;

    return self::$PATHS;
  }
}
