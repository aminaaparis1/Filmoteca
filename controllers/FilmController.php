<?php

class FilmController
{
    public function index()
    {
        $films = [
            ['title' => 'Inception', 'year' => 2010],
            ['title' => 'The Matrix', 'year' => 1999],
            ['title' => 'Interstellar', 'year' => 2014]
        ];
        var_dump($films);
    }
    public function show($id)
    {
        $film = ['title' => 'Inception', 'year' => 2010, 'id' => $id];
        var_dump($film);
    }
}
