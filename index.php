<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestion de bibliothèque</h1>
        <a href="ajout.php" class="btn btn-primary mb-3">  
            Ajouter un livre
            </a>
        </button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Année</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php
        include "config_bdd.php";
        $sql = "SELECT * FROM books";
        $req = $conn->query($sql);

        while ($donnees = $req->fetch()) {
            $id = $donnees['id'];
            $title = $donnees['title'];
            $author = $donnees['author'];
            $year= $donnees['year'];
            $genre = $donnees['genre'];

            echo '
        <tr>
            <td> ' . $id. '</td>
            <td> ' . $title. '</td>
            <td> ' . $author. '</td>
            <td> ' . $year. '</td>
            <td> ' . $genre. '</td>
            <td><a href="modifier.php?id=' . $id . '" role="button" class="btn btn-warning btn-sm">Modifier</a></td>
            <td><a href="supprimer.php?id=' . $id. '" role="button" class="btn btn-danger">Supprimer</a></td>
        </tr>';
        }
        $conn = null;
        ?>



            </tbody>
        </table>











































    </div>
    <!-- Add Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Ajouter un livre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Auteur</label>
                            <input type="text" class="form-control" id="author">
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Année</label>
                            <input type="number" class="form-control" id="year">
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier le livre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="book-title" class="form-label">Titre du livre</label>
                        <input type="text" class="form-control" id="book-title" value="Titre factice">
                    </div>
                    <div class="mb-3">
                        <label for="book-author" class="form-label">Auteur du livre</label>
                        <input type="text" class="form-control" id="book-author" value="Auteur factice">
                    </div>
                    <div class="mb-3">
                        <label for="book-year" class="form-label">Année de publication</label>
                        <input type="number" class="form-control" id="book-year" value="2000">
                    </div>
                    <div class="mb-3">
                        <label for="book-genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="book-genre" value="Genre">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Sauvegarder les modifications</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Supprimer le livre</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Êtes-vous sûr de vouloir supprimer ce livre ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
            <button type="button" class="btn btn-danger">Oui, supprimer</button>
            </div>
        </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>