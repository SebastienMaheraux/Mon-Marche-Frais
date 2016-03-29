<?php
session_start();



	$nom_fichier = basename($_SERVER['HTTP_REFERER']);
	include_once('Database.php'); 
	
	$reponse = $bdd->query('SELECT * FROM article WHERE name="'.$_POST['fruit'].'"'); //reprend les variable de la page fruit ou legume ou aromate que l'on souhaite ajouté au panier
	$donnees = $reponse->fetch();
	$_price = $donnees['price'];
	$_id_article = $donnees['id_article'];
	$_quantite = $_POST['combien'];
	$_quantite = abs ($_quantite); //pas possible de commander - x produits
	$_priceTot = $_quantite*$_price; //calcul du prix en fonction de la quantite 
	
	
	try{ 								
		$req = $bdd->prepare('insert into basket_line(id_article,priceTot,name,quantity,price) values (:id, :priceTot,:name, :quantity, :price)'); //remplissage des ligne du panier 
				 $req->execute(array('id' =>$_id_article,'priceTot'=>$_priceTot,'name'=>$_POST['fruit'],'quantity'=>$_quantite,'price'=>$_price));
				 
	}catch (PDOException $e) {
		echo("<pre>");
		var_dump($e);
	}
	
	header('location:'.$nom_fichier.''); //retour à la page précédente
	exit();
	
?>
