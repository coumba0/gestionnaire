<?php include "config_bdd.php";
$id_supp = $_GET['id'];
$sql = "DELETE FROM books WHERE id = $id_supp";
$req = $conn->query($sql);
header('Location: index.php');
$conn = null;
