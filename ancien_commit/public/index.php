<?php

//maj
declare(strict_types=1); 

require __DIR__ . '/../vendor/autoload.php'; 

use App\Core\Router; 

// FRONT-CONTROLLER
$router = new Router(); 
$router->route(); 
