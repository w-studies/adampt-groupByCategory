<?php

declare(strict_types=1);

namespace core;

class Application
{
  public function __construct()
  {
    require __DIR__ . '/helpers/functions.php';

    $uri    = parse_url($_SERVER['REQUEST_URI']);
    $method = $_SERVER['REQUEST_METHOD'];

    try {
      Router::dispatch($uri, $method);
    } catch (\Exception $e) {
      echo $e->getMessage();

      echo '<pre>$e: ';
      print_r($e);
      echo '</pre>';
    }
  }
}
