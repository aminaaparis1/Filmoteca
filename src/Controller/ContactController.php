<?php

declare(strict_types=1);

namespace App\Controller;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class ContactController
{
    private $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new Environment($loader); 
    }
    public function index(array $params): void
    {
        echo $this->twig->render('contact/index.html.twig', [
            'title' => 'Contactez-nous', 
            'message' => 'Envoyez-nous un message via le formulaire ci-dessous.', 
        ]);
    }
    public function sendMessage(array $params): void
    {
        $name = $params['name'] ?? 'Anonyme';
        $email = $params['email'] ?? 'email@exemple.com';
        $message = $params['message'] ?? 'Aucun message';
        echo $this->twig->render('contact/thank_you.html.twig', [
            'title' => 'Merci!',
            'name' => $name,  
        ]);
    }
}
