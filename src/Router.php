<?php
class Router
{
    public function route()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = trim($url, '/');
        var_dump($url);
    }
}
