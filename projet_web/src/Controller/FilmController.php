<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\TemplateRenderer;
use App\Entity\Film;
use App\Repository\FilmRepository;

class FilmController
{
    private TemplateRenderer $renderer;

    public function __construct()
    {
        $this->renderer = new TemplateRenderer();
    }

    public function list(array $queryParams)
    {
        $filmRepository = new FilmRepository();
        $films = $filmRepository->findAll();

        /* $filmEntities = [];
        foreach ($films as $film) {
            $filmEntity = new Film();
            $filmEntity->setId($film['id']);
            $filmEntity->setTitle($film['title']);
            $filmEntity->setYear($film['year']);
            $filmEntity->setType($film['type']);
            $filmEntity->setSynopsis($film['synopsis']);
            $filmEntity->setDirector($film['director']);
            $filmEntity->setCreatedAt(new \DateTime($film['created_at']));
            $filmEntity->setUpdatedAt(new \DateTime($film['updated_at']));

            $filmEntities[] = $filmEntity;
        } */

        //dd($films);

        echo $this->renderer->render('film/list.html.twig', [
            'films' => $films,
        ]);

        // header('Content-Type: application/json');
        // echo json_encode($films);
    }

    public function create()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        // Récupération des données du formulaire
        $title = $_POST['titre'] ?? null;
        $year = $_POST['annee'] ?? null;
        $type = $_POST['type'] ?? null;
        $director = $_POST['realisateur'] ?? null;
        $synopsis = $_POST['synopsis'] ?? null;
        $createdAt = new \DateTime();
        $updatedAt = new \DateTime();

        // Validation simple
        if (!$title || !$year || !$type || !$director || !$synopsis) {
            die('Tous les champs sont obligatoires.');
        }

        // Création d'un nouvel objet Film
        $film = new \App\Entity\Film();
        $film->setTitle($title);
        $film->setYear((int)$year);
        $film->setType($type);
        $film->setDirector($director);
        $film->setSynopsis($synopsis);
        $film->setCreatedAt($createdAt);
        $film->setUpdatedAt($updatedAt);

        // Enregistrement du film dans la base de données
        $filmRepository = new \App\Repository\FilmRepository();
        $filmRepository->save($film);

        // Redirection après l'ajout
        header('Location: /film/list');
        exit;
    }

    // Affichage du formulaire si méthode GET
    echo $this->renderer->render('film/create.html.twig');
}


public function update(array $queryParams)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!isset($queryParams['id'])) {
            die('ID du film manquant.');
        }

        $filmId = (int)$queryParams['id'];

        // données du formulaire
        $title = $_POST['titre'] ?? null;
        $year = $_POST['annee'] ?? null;
        $type = $_POST['type'] ?? null;
        $director = $_POST['realisateur'] ?? null;
        $synopsis = $_POST['synopsis'] ?? null;
        $updatedAt = new \DateTime();

        // Validation simple
        if (!$title || !$year || !$type || !$director || !$synopsis) {
            die('Tous les champs sont obligatoires.');
        }

        // Récupérer le film existant
        $filmRepository = new \App\Repository\FilmRepository();
        $film = $filmRepository->find($filmId);

        if (!$film) {
            die('Film introuvable.');
        }

        // Màj les informations du film
        $film->setTitle($title);
        $film->setYear((int)$year);
        $film->setType($type);
        $film->setDirector($director);
        $film->setSynopsis($synopsis);
        $film->setUpdatedAt($updatedAt);

        // Enregistrer les modifications
        $filmRepository->update($film);

        // Redirection après la mise à jour
        header('Location: /film/read?id=' . $filmId);
        exit;
    }
}


    public function delete(array $queryParams)
{
    if (!isset($queryParams['id'])) {
        die('ID du film manquant.');
    }

    $filmId = (int)$queryParams['id'];

    // Supprimez le film via le FilmRepository
    $filmRepository = new \App\Repository\FilmRepository();
    $filmRepository->delete($filmId);

    // Redirigez vers la liste des films
    header('Location: /film/list');
    exit;
}

public function read(array $queryParams)
{
    // Vérifiez que l'ID est fourni
    if (!isset($queryParams['id'])) {
        die('ID du film manquant.');
    }

    $filmId = (int)$queryParams['id'];

    // Récupérez les détails du film via le FilmRepository
    $filmRepository = new \App\Repository\FilmRepository();
    $film = $filmRepository->find($filmId);

    if (!$film) {
        die('Film introuvable.');
    }

    // Affichez les détails du film
    echo $this->renderer->render('film/read.html.twig', [
        'film' => $film,
    ]);
}

}
