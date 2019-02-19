<?php
  if(session_id() == '')
  {
    session_start();
  }
    if(filter_var($_POST['qty'], FILTER_VALIDATE_INT) && filter_var($_POST['id'], FILTER_VALIDATE_INT)){
        $panier = $_SESSION['panier'];
        require('connexion.php');
        $requete = $pdo->prepare("SELECT * FROM produit WHERE id = :id");
        $requete->bindParam(':id', $_POST['id']);
        $requete->execute();
        $resultat = $requete->fetch();
        $_SESSION['cart'][]= [
            "id"=>$_POST['id'],
            "nom"=>$resultat['nom'],
            "qty"=>$_POST['qty']
        ];
    }
    else
    {
        echo 'Probleme de typage de donnees';
    }