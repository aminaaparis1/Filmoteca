<?php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmoteca</title>
    <style> 
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f0f0f5;
            color: #333;
        }

        /*HEADER*/
        header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        header nav ul li {
            margin: 0 15px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        header nav ul li a:hover {
            text-decoration: underline;
        }

        /*MAIN*/
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            flex-direction: column;
        }

        .accueil {
            text-align: center;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .accueil h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 15px;
        }

        .accueil p {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 25px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #555;
        }

        /*LISTE DES FILMS*/
        .film-list {
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .film-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            align-items: flex-start;
        }

        .film-item:last-child {
            border-bottom: none;
        }

        .film-item img {
            max-width: 150px; /* Ajuster la taille de l'image */
            margin-right: 20px; /* Espacement entre l'image et le texte */
            border-radius: 5px; /* Coins arrondis pour l'image */
        }

        .film-item h3 {
            margin-bottom: 5px;
            font-size: 1.5em;
        }

        .film-info {
            font-size: 0.9em;
            color: #555;
        }

        /*FOOTER*/
        footer {
            background-color: #1a1a1a;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 0.9em;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1> Filmoteca </h1>
        <nav>
            <ul>
                <li><a href="liste_films.html">Liste des films</a></li>
                <li><a href="#crud">CRUD des films</a></li>
                <li><a href="notes.html">Notes films</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="accueil">
            <h2>Site de liste de films</h2>
            <p>Découvrez nos différents films ainsi que leurs caractéristiques.</p>
            <a href="liste_films.html" class="btn">En savoir plus</a>
        </section>
        
    </main>
    <footer>
        <p>&copy; 2024 Notre Site. Tous droits réservés.</p>
    </footer>
</body>
</html>
?>
