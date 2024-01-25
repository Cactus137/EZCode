<?php

namespace App\Routes;

class Router
{
    private static $routes = [];

    public static function post(string $route, callable $callback = null)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            self::$routes[$route] = $callback;
        }
    }

    public static function get(string $route, callable $callback = null)
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $route = rtrim($route, '/');
            self::$routes[$route] = $callback;
        }
    }

    public static function run(string $uri)
    {
        $uri = rtrim($uri, '/');
        $found = false;

        foreach (self::$routes as $route => $callback) {
            $pattern = str_replace('/', '\/', $route);
            $pattern = preg_replace('/{[^}]+}/', '([^\/]+)', $pattern);

            if (preg_match("/^{$pattern}$/", $uri, $matches)) {
                $found = true;

                $params = array_slice($matches, 1);

                call_user_func_array($callback, $params);
                break;
            }
        }

        if (!$found) {
            redirect('/404');
        }
    }
}
