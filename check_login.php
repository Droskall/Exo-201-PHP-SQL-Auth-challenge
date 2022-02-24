
<?php
//Check if credentials are valid
include './lib/function.php';
require './Classes/DB.php';

if (issetPostParams('username', 'password')) {
    $bdd = DB::getInstance();

    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    // je récupère que le nom de l'utilisateur
    $stmt = $bdd->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username);

    $stmt->execute();

    foreach ($stmt->fetchAll() as $user) {
        // Je vérifie que le mdp cripté sur ma base de donnée que j'ai récupéré grace à la boucle '$user['password']' correpond au mdp entré par l'utilisateur
        if (password_verify($password, $user['password'])) {
            // Si les 2 mdp correspondent alors on ouvre la session et on stocke les données de l'utilisateur dans une session.
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;


            // on redirige l'utilisateur à la page bienvenue.
            header("Location: bienvenue.php");
        }

        else {
            echo "Non";
        }
    }
}
else {
    echo "Aucun compte associé à ce nom d'utilistaur ou mot de passe";
}