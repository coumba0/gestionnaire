
<?php
// Si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //  déclarer un tableau d'erreur vide
    $errors = [];

    //stocker les informations saisies par l'utilisateur 
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $year = htmlspecialchars($_POST['year']);
    $genre = htmlspecialchars($_POST['genre']);

    // Vérification des valeurs saisies par l'utilisateur
    if (empty($title)) {
        $errors['title'] = 'Veuillez remplir tous les champs';
    }

    if (empty($author)) {
        $errors['author'] = 'Veuillez remplir tous les champs';
    }

    if (empty($year)) {
        $errors['year'] = 'Veuillez remplir tous les champs';
    }

    if (empty($genre)) {
        $errors['genre'] = 'Veuillez entrer un genre';
    }

    if (empty($errors)) {
        // Connexion à la base de données
        include "config_bdd.php";

        // insertion des données
        $sql = "INSERT INTO books (title, author, year, genre) VALUES (:title, :author, :year, :genre)";

        // Préparation de la requête
        $stmt = $conn->prepare($sql);

        // Exécution de la requête SQL
        $stmt->execute([
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'genre' => $genre,
        ]);

        $conn = null;

        echo '
        
 
            Vos informations ont été enregistrées avec succès ! <a href="index.php" class="alert-link">Accéder à la page d\'accueil</a>
   
        ';
    } else {
        echo '<div class="alert alert-danger"> <p><strong>Vous n\'avez pas rempli le formulaire correctement</strong></p> <ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul> </div>';
    }
}
?>

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookModalLabel">Ajouter un livre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Auteur</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Année</label>
                        <input type="number" class="form-control" id="year" name="year">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>