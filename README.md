# Filmoteca 🎥

Filmoteca est une application web de gestion de films qui permet aux utilisateurs d'ajouter, supprimer, consulter et modifier des informations sur les films.

## Fonctionnalités principales

### Ajouter un film ➕
- Vous pouvez ajouter un nouveau film en utilisant l'onglet **Ajouter un film**.
- Un formulaire 📝 vous permet de renseigner les informations du film (titre, description, etc.).
- Une fois le formulaire soumis, le film sera ajouté à la liste des films.

### Supprimer un film 🗑️
- Chaque film dans la liste dispose d'une option de suppression.
- Lorsque vous cliquez sur **Supprimer**, une alerte ⚠️ apparaît pour confirmer si vous êtes sûr de vouloir supprimer le film.
- Après confirmation ✅, le film sera définitivement supprimé de la liste.

### Consulter les détails d'un film (Read) 🔍
- Dans la liste des films, vous pouvez cliquer sur le titre d'un film pour accéder à sa page de détails.
- Cette page affiche toutes les informations associées au film sélectionné.

### Modifier un film (Update) ✏️
- Depuis la page de détails d'un film, vous pouvez cliquer sur le bouton **Modifier** pour mettre à jour les informations du film.
- Un formulaire 📝 s'affichera pour permettre la modification des informations.
- Une fois les modifications effectuées et le formulaire soumis, les nouvelles informations seront enregistrées et mises à jour.

## Installation et configuration ⚙️
1. Clonez ce dépôt sur votre machine locale :
   ```bash
   git clone https://github.com/aminaaparis1/Filmoteca.git
   ```

2. Naviguez dans le répertoire du projet :
   ```bash
   cd Filmoteca
   ```

3. Installez les dépendances avec Composer :
   ```bash
   composer install
   ```

4. Configurez votre environnement dans le fichier `.env`.

5. Démarrez les conteneurs Docker 🐳 :
   ```bash
   docker-compose up -d
   ```

6. Accédez à l'application dans votre navigateur à l'adresse :
   ```
   http://localhost
   ```

## Technologies utilisées 💻
- **PHP** (backend)
- **Twig** (template engine)
- **MySQL** (base de données)
- **Docker** (environnement de développement)
- **Adminer** (interface pour gérer la base de données)

## Auteur ✍️
- **Amina Zouane**

## Licence 📜
Ce projet est sous licence MIT. Vous êtes libre de l'utiliser et de le modifier selon vos besoins.
