<?php
ini_set('error_reporting', -1);
ini_set('display_errors', 1);
  if(session_id() == '')
  {
    session_start();
    if(!$_SESSION['cart'])
    {
    $_SESSION['cart'] = array();
  }   
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Inscription / Connexion</title>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <a href="cart.php"><button class="btn btn-success">panier</button></a></div>
        </div>
      <div class="row">
            <?php
              echo 'panier : ';
              print_r($_SESSION['cart']);
                require('connexion.php');
                $requete = $pdo->prepare('SELECT * FROM produit');
                $requete->execute();
                while($resultats = $requete->fetch())
                {
                    echo '<div class="col-4"><a href="produit.php?id='.$resultats['id'].'">'.$resultats['nom'].'</a></div>';
                }
            ?>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>