<?php

declare(strict_types=1);

namespace core;

class Router
{
  private static array $routes = [[
    'path'    => '/^\/$/i',
    'method'  => 'GET',
    'handler' => 'menu',
  ]];

  private static string $namespaceModule = '';

  private static string $module = '';

  private static $params = [];

  public static function dispatch($uri, $method)
  {
    $path   = strtolower($uri['path']);
    $method = strtoupper($method);
    foreach (self::$routes as $route) {

      if ($route['method'] !== $method) {
        continue;
      }

      if (preg_match($route['path'], $path, $matches)) {
        foreach ($matches as $k => $v) {
          if (is_string($k)) {
            self::$params[$k] = $v;
          }
        }

        return self::handleHandler($route['handler']);
      }
    }

    echo $path . '<pre>rota não encontrada!: ';
    print_r('<p>abortar!</p>');
    echo '</pre>';
  }

  private static function handleHandler($handler)
  {

    if (is_callable($handler)) {
      // Se o handler for uma função, simplesmente chame-a
      return call_user_func($handler);
    }

    if (is_string($handler)) {
      $handler = explode('@', $handler);

      [$controller, $method] = $handler + [1 => 'index'];

      self::$module = $controller;

      self::$namespaceModule = "modules\\$controller\\$controller";
    } elseif (is_array($handler)) {
      [$controller, $method] = $handler + [1 => 'index'];

      self::$namespaceModule = $controller;

      // define o nome do meio como sendo o nome do módulo
      // exemplo: modules\Module\Controller
      self::$module = preg_replace('/.+\\\\(.+)\\\\.+/', '$1', $controller);
    }

    $controller = new self::$namespaceModule();
    $controller->$method(...self::$params);
  }

  public static function getModule()
  {
    return self::$module;
  }
}
