<?php
session_start();
require_once 'src/Router.php'; 
$router = new Router();
$router->route();
?>
