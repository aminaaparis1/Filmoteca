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
        // Mise à jour du chemin vers le dossier 'views' au lieu de 'templates'
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        $this->twig = new Environment($loader);
    }

    public function route(): void
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $parts = explode('/', $uri);
    $route = $parts[0] ?? null;
    $action = $parts[1] ?? 'list';  // Valeur par défaut à 'list' si aucune action n'est spécifiée

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
        // Injecter l'objet $twig dans le contrôleur
        if (method_exists($controller, $action)) {
            $controller->$action($this->twig, $_GET); // Passer $twig et $_GET
        } else {
            echo $this->twig->render('404.html.twig', ['title' => 'Page Not Found']);
        }
    } else {
        echo $this->twig->render('404.html.twig', ['title' => 'Page Not Found']);
    }
}

}
