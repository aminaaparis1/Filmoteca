<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;

class FilmController
{
    public function list($twig, array $queryParams)
    {
        $filmRepository = new FilmRepository();
        $films = $filmRepository->findAll();
        echo $twig->render('list.html.twig', [
            'title' => 'Films',
            'films' => $films
        ]);
    }

    public function create()
    {
        echo "Création d'un film";
    }

    public function read(array $queryParams)
    {
        $filmRepository = new FilmRepository();
        $film = $filmRepository->find((int) $queryParams['id']);

        dd($film);
    }

    public function update()
    {
        echo "Mise à jour d'un film";
    }

    public function delete()
    {
        echo "Suppression d'un film";
    }
}
