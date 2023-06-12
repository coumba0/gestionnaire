<?php
$id = $_POST['id'];
$title = htmlspecialchars($_POST['title']);
$author = htmlspecialchars($_POST['author']);
$year = htmlspecialchars($_POST['year']);
$genre = htmlspecialchars($_POST['genre']);

// Si les champs de saisie ne sont pas vides
if (!empty($_POST)) {
    // On déclare un tableau d'erreur vide pour l'instant
    $errors = [];

    // Vérification des valeurs saisies par l'utilisateur
    if (empty($title)) {
        $errors['title'] = 'Veuillez entrer le titre';
    }

    if (empty($author)) {
        $errors['author'] = 'Veuillez entrer l\'auteur';
    }

    if (empty($year)) {
        $errors['year'] = 'Veuillez entrer l\'année';
    }

    if (empty($genre)) {
        $errors['genre'] = 'Veuillez entrer le genre';
    }

    if (empty($errors)) {

        include "config_bdd.php";

        $sql = "UPDATE books SET title = :title, author = :author, year = :year, genre = :genre WHERE id = :id";

        // Préparer la requête SQL
        $stmt = $conn->prepare($sql);

        // Exécuter la requête SQL
        $stmt->execute([
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'genre' => $genre,
            'id' => $id
        ]);


        $conn = null;

        // Afficher un message de succès
        echo '
            
                Vos informations ont été modifiées avec succès ! <a href="index.php" class="alert-link">Accéder à la page d\'accueil</a>
     
        ';
    } else {
        // Afficher les erreurs
        echo '<div class="alert alert-danger"> <p><strong>Vous n\'avez pas rempli le formulaire correctement</strong></p> <ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul> </div>';
    }
}
?>