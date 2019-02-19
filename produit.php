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
              <div class="col-12"><a href="index.php">Retour Produit</a></div>
          </div> 
          <div class="row">
              <div class="col-12" id="resultat"></div>
          </div>
      <div class="row">
          <form id="addProduct" method="post">
            <?php
                require('connexion.php');
                $id = $_GET['id'];
                $requete = $pdo->prepare('SELECT * FROM produit WHERE id = :id ');
                $requete->bindParam(':id',$id);
                $requete->execute();
                $resultat = $requete->fetch();
                
                    echo '<div class="col-4">'.$resultat['nom'].'<br>'.$resultat['prix'].'<br>'.$resultat['description'];
                    echo '<input type="number" name="qty" value="1">';
                    echo '<input type="hidden" name="id" value="'.$resultat['id'].'">';
                    echo '<button class="btn btn-success">Ajouter au panier</button>';
                    echo '</div>';
                ;
            ?>
            </form>
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
        $('#addProduct').submit(function(event){
            event.preventDefault();
            console.log('j ajoute');
            $.ajax({
                type: 'post',
                url: 'ajoutPanier.php',
                data: $( this ).serialize(),
                timeout: 3000,
                success: function(data){
                    console.log(data);
                    if(data = 'ok')
                    {
                        $('#erreur').html('Bien ajoute');
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