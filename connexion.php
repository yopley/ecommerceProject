<?php
    setlocale(LC_ALL, 'fr_FR');
	$hote = 'localhost';
	$bdd = 'produit';
	$util = 'root';
	$mdp = '';
	try
	{
		$pdo = new PDO('mysql:host='.$hote.';dbname='.$bdd,$util,$mdp);
		// On définit le codage en utf8
		$pdo->exec("set character set utf8");
	}
	catch (PDOException $e)
	{
		echo 'Connexion échouée :'.$e-> getMessage();
		exit();
	}
?>
