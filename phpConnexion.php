<?php
    if(filter_var($_POST['connEmail'], FILTER_VALIDATE_EMAIL) && isset($_POST['connPwd']) && ($_POST['connPwd'] != '')){
        require('connexion.php');
        $pwd = $_POST['connPwd'];
        $email = $_POST['connEmail'];
        $requete = $pdo->prepare("SELECT pwd FROM utilisateur WHERE email = :email");
        $requete->bindParam(':email',$email);
        $requete->execute();
        $resultat = $requete->fetch();
        $mdpStocke = $resultat['pwd'];
        if (password_verify($pwd, $mdpStocke))  
        {
            echo 'ok';  
        }
        else
        {
            echo 'false';
        }
    }
    else
    {
        echo 'Probleme de donnees';
    }