
<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

    require "./Classes/DB.php";

    $bdd = DB::getInstance();

    $id = $_GET['id'];

    $sql = "DELETE FROM hiking WHERE id = $id";
    if ($bdd->exec($sql) !== false) {
        echo "l'id " . $id . " a bien été supprimé !";
        header("Location: read.php");
    }
}