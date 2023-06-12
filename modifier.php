<?php
$id = $_GET['id'];
include "config_bdd.php";

// Récupérer les informations du livre à partir de la base de données
$sql = "SELECT title, author, year, genre FROM books WHERE id = :id";
$req = $conn->prepare($sql);
$req->execute(['id' => $id]);

$book = $req->fetch(PDO::FETCH_ASSOC);
$title = $book['title'];
$author = $book['author'];
$year = $book['year'];
$genre = $book['genre'];
?>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier le livre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="modifier_traitement.php">
                    <div class="mb-3">
                        <label for="book-title" class="form-label">Titre du livre</label>
                        <input type="text" class="form-control" id="book-title" name="title" value="<?php echo $title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="book-author" class="form-label">Auteur du livre</label>
                        <input type="text" class="form-control" id="book-author" name="author" value="<?php echo $author; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="book-year" class="form-label">Année de publication</label>
                        <input type="number" class="form-control" id="book-year" name="year" value="<?php echo $year; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="book-genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="book-genre" name="genre" value="<?php echo $genre; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-outline-success">Sauvegarder les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>