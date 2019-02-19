<?php
    if(isset($_POST['nom']) && ($_POST['nom'] != '') && isset($_POST['prenom']) && ($_POST['prenom'] != '')
    && isset($_POST['pwd']) && ($_POST['confirmPwd'] != '')&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && filter_var($_POST['age'], FILTER_VALIDATE_INT)
    && ($_POST['pwd'] == $_POST['confirmPwd'])){
        require('connexion.php');
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $pwd = password_hash($_POST['pwd'],PASSWORD_BCRYPT);
        $requete = $pdo->prepare("INSERT INTO utilisateur (id, nom, prenom, age, email, pwd) VALUES (null, :nom, :prenom, :age, :email, :pwd)");
        $requete->bindParam(':nom',$nom);
        $requete->bindParam(':prenom',$prenom);
        $requete->bindParam(':age',$age);
        $requete->bindParam(':email',$email);
        $requete->bindParam(':pwd',$pwd);
        $requete->execute();
        echo 'ok';
    }
    else
    {
        echo 'Probleme de donnees';
    }