<?php
    if((isset($_POST['nom'])) && ($_POST['nom'] != '')){
        require('connexion.php');
        $nom = $_POST['nom'];
        $email = $_POST['email'];       
        $pwd = password_hash($_POST['pwd'],PASSWORD_BCRYPT);
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $requete = $pdo->prepare("INSERT INTO login (id,nom,email,pwd) VALUES (null,:nom, :email, :pwd)");
            $requete->bindParam(':nom',$nom);
            $requete->bindParam(':email',$email);
            $requete->bindParam(':pwd',$pwd);
            $requete->execute();
            header('Location: index.php');
        }
        else
        {
            echo 'Mauvais email';
        }
    }
   
    if(session_id() == '')
    {
        session_start();
    }
    echo $_SESSION['nom'];
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Inscription</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="inscription.php" method="post">
                    <label>Nom</label>
                    <input type="text" name="nom"><br>
                    <label>Email</label>
                    <input type="email" name="email"><br>
                    <label>Pwd</label>
                    <input type="pwd" name="pwd"><br>
                    <button class="btn btn-success" type="submit"> OK</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>