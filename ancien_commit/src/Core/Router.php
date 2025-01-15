<?php
declare(strict_types=1);
namespace App\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Router
{
    private $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        $this->twig = new Environment($loader);
    }
    public function route(): void
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $parts = explode('/', $uri);
    $route = $parts[0] ?? null;
    $action = $parts[1] ?? 'list';  
    $routes = [
        'films' => 'FilmController',
        'contact' => 'ContactController',
    ];
    if (array_key_exists($route, $routes)) {
        $controllerName = 'App\\Controller\\' . $routes[$route];

        if (!class_exists($controllerName)) {
            echo "Controller '$controllerName' not found";
            return;
        }
        $controller = new $controllerName();
        if (method_exists($controller, $action)) {
            $controller->$action($this->twig, $_GET); 
        } else {
            echo $this->twig->render('404.html.twig', ['title' => 'Page Not Found']);
        }
    } else {
        echo $this->twig->render('404.html.twig', ['title' => 'Page Not Found']);
    }
}
}
