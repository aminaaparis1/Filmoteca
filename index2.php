<?php
session_start();

require_once 'controllers/FilmController.php';
require_once 'controllers/UserController.php';

function router() {
    $url = isset($_GET['url']) ? $_GET['url'] : '';
    $url = explode('/', trim($url, '/'));

    $controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'FilmController';
    $actionName = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

    if (file_exists('controllers/' . $controllerName . '.php')) {
        require_once 'controllers/' . $controllerName . '.php';
        $controller = new $controllerName();

        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            http_response_code(404);
            echo "Erreur 404 : Action non trouvée.";
        }
    } else {
        http_response_code(404);
        echo "Erreur 404 : Contrôleur non trouvé.";
    }
}
router();
?>
