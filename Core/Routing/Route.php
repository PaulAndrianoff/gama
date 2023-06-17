<?php

namespace Core\Routing;

class Route
{
    private static $routes = [];

    public static function get($path, $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'GET',
        ];
    }

    public static function post($path, $action)
    {
        self::$routes[] = [
            'path' => $path,
            'action' => $action,
            'method' => 'POST',
        ];
    }

    public static function dispatch()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $foundRoute = false;

        foreach (self::$routes as $route) {
            if ($requestUri === $route['path'] && $requestMethod === $route['method']) {
                $foundRoute = true;
                list($controller, $method) = explode('@', $route['action']);
                $controller = "Gama\\GamaPhp\\Controllers\\$controller";
                $controllerInstance = new $controller();
                $controllerInstance->$method();
                break;
            }
        }

        if (!$foundRoute) {
            if (self::isDebugEnabled()) {
                echo "Error: Route not found for $requestMethod $requestUri";
            } else {
                http_response_code(404);
                include __DIR__ . '/../Views/errors/404.php'; // Update with the path to your custom 404 page
            }
        }
    }

    private static function isDebugEnabled()
    {
        global $appConfig;

        return $appConfig['debug'] ?? false;
    }
}
