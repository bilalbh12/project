<?php

include_once("cnx.php");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="sign.css">
    </head>
    <body>
        <?php
        if(isset($_POST['send'])) {
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $email = trim($_POST['email']);
            $passwd = trim($_POST['passwd']);
            $result = mysqli_query($code, "SELECT * FROM usr WHERE email = '$email'");
            if(mysqli_num_rows($result) == 0)
            {
                $passwd = password_hash($passwd, PASSWORD_DEFAULT);
                mysqli_query($code, "INSERT INTO usr(nom, prenom, email, passwd) VALUES('$nom', '$prenom', '$email', '$passwd')");
                header('location: page.php');
            } else {
                echo 'ce compte est dejat inscrit';
            }
        }
        ?>
        <form method='post'>
            <div class="txt">Tous les formulaires est obligatoire : <br></div>

            Nom :
            <input type="text" name="nom" placeholder="Votre Nom" required>
            <br>

            Prenom :
            <input type="text" name="prenom" placeholder="Votre Prenom" required>
            <br>

            E-mail :
            <input type="email" name="email" placeholder="Votre E-amil" required>
            <br>

            Password :
            <input type="password" name="passwd" placeholder="Votre Password" required>
            <br>

            <button type="submit" name="send">submit</button>
        </form>
    </body>
</html>