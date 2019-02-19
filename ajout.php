<?php
    if((isset($_POST['nom'])) && ($_POST['nom'] != '')){
        require('connexion.php');
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];       
        $requete = $pdo->prepare("INSERT INTO produit (id,nom,prix,description) VALUES (null,:nom, :prix, :description)");
        $requete->bindParam(':nom',$nom);
        $requete->bindParam(':prix',$prix);
        $requete->bindParam(':description',$description);
        $requete->execute();
        echo 'ok';
    }
   