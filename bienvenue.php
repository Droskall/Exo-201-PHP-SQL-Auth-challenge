
<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bienvenue !</title>
        <link rel="stylesheet" href="css/basics.css">
    </head>
    <body style="background: antiquewhite">
        <div style="color: olivedrab" ><?php echo 'Bienvenue, ' . $_SESSION['username'] . ' !'; ?></div>

        <ul>
            <li><a href="create.php">Créer une randonnée</a></li>
            <li><a href="read.php">Les randonnées</a></li>
        </ul>

        <form action="logout.php" method="post">
            <button id="enter" type="submit" name="button">Se déconnecter</button>
        </form>

    </body>
    </html>

    <?php
}
