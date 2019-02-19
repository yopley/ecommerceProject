<?php
    if((isset($_POST['email'])) && ($_POST['email'] != '')){
        require('connexion.php');
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $requete = $pdo->prepare("SELECT nom,pwd FROM login WHERE email = :email ");
        $requete->bindParam(':email',$email);
        $requete->execute();
        $resultat = $requete->fetch();
        $pwdStocke = $resultat['pwd'];
        echo $pwd;
        //password verify check le password soumis et le pwd stockee en bdd
        if(password_verify($pwd,$pwdStocke)){
            echo 'on est log';
            if(session_id() == '')
            {
                session_start();
            }
            $_SESSION['nom'] = $resultat['nom'];
            echo $_SESSION['nom'];
        }
        else
        {
            echo 'degage';
        }
        //header('Location: index.php');
    }
    else
    {
        echo 'on a un souci';
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

    <title>Inscription</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="login.php" method="post">
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