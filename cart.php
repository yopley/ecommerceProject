<?php
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
                  <a href="index.php">Retour Produit</a></div>
                  <button class="btn btn-danger" id="clear">Vider le panier</button>
          </div> 
          <div class="row">
              <div class="col-12" id="resultat"></div>
          </div>
      <div class="row"  id="cible">
          <table>
            <?php
                foreach ($_SESSION['cart'] as $produit) {
                    foreach ($produit as $key => $value) {
                        echo $value;
                    }
                }
                ?>
                    
          </table>
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
    <script>
        $('#clear').click(function(){
            $.ajax({
                type: 'post',
                url: 'clear.php',
                timeout: 3000,
                success: function(data){
                    console.log(data);
                    if(data == 'ok')
                    {
                        $('#erreur').html('Bien ajoute');
                        $('#cible').empty();
                    }
                },
                error: function(){
                    $('#erreur').html('Cette requête AJAX n\'a pas abouti');
                }
            });
        })
    </script>
</body>
</html>