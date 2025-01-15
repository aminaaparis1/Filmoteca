<?php

declare(strict_types=1);

namespace App\Repository;

use App\Core\DatabaseConnection;
use App\Service\EntityMapper;
use App\Entity\Film;

class FilmRepository
{
    private \PDO $db; // Instance de connexion à la base de données
    private EntityMapper $entityMapperService; // Service pour mapper les entités

    public function __construct()
    {
        // Initialise la connexion à la base de données en utilisant DatabaseConnection
        $this->db = DatabaseConnection::getConnection();
        // Initialise le service de mappage des entités
        $this->entityMapperService = new EntityMapper();
    }


    public function findAll(): array
{
    // Requête SQL pour récupérer tous les films
    $query = 'SELECT * FROM film';
    $stmt = $this->db->query($query);


    $films = $stmt->fetchAll(\PDO::FETCH_ASSOC);


    if (!$films) {
        return []; 
    }


    return $this->entityMapperService->mapToEntities($films, Film::class);
}

    public function find(int $id): Film
    {

        $query = 'SELECT * FROM film WHERE id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->execute(['id' => $id]);

        $film = $stmt->fetch();
        return $this->entityMapperService->mapToEntity($film, Film::class);
    }

    public function save(Film $film): void
{
    $query = 'INSERT INTO film (title, year, type, director, synopsis, created_at, updated_at) 
              VALUES (:title, :year, :type, :director, :synopsis, :createdAt, :updatedAt)';
    $stmt = $this->db->prepare($query);

    $stmt->execute([
        'title' => $film->getTitle(),
        'year' => $film->getYear(),
        'type' => $film->getType(),
        'director' => $film->getDirector(),
        'synopsis' => $film->getSynopsis(),
        'createdAt' => $film->getCreatedAt()->format('Y-m-d H:i:s'),
        'updatedAt' => $film->getUpdatedAt()->format('Y-m-d H:i:s'),
    ]);
}

public function delete(int $id): void
{
    $query = 'DELETE FROM film WHERE id = :id';
    $stmt = $this->db->prepare($query);
    $stmt->execute(['id' => $id]);
}

public function update(Film $film): void
{
    $query = "
        UPDATE film
        SET 
            title = :title,
            year = :year,
            type = :type,
            director = :director,
            synopsis = :synopsis,
            updated_at = :updated_at
        WHERE id = :id
    ";

    $stmt = $this->db->prepare($query);
    $stmt->execute([
        'title' => $film->getTitle(),
        'year' => $film->getYear(),
        'type' => $film->getType(),
        'director' => $film->getDirector(),
        'synopsis' => $film->getSynopsis(),
        'updated_at' => $film->getUpdatedAt()->format('Y-m-d H:i:s'),
        'id' => $film->getId(),
    ]);
}


}
