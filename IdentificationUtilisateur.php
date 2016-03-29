<?php
session_start(); //utilisation variabkles SESSION

if (!EMPTY($_POST['monIdentifiant'])&& !EMPTY($_POST['monMP'])){ //verification champs remplis

	include_once('Database.php'); //connexion bdd
	$reponse = $bdd->query('SELECT * FROM user WHERE login="'.$_POST['monIdentifiant'].'"'); //on vérifie que le login existe déjà
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if ($donnees['login'] == $_POST['monIdentifiant'] && $donnees['password'] == $_POST['monMP']){
	//initialisation variables session
		$_SESSION['id_user']=$donnees['id_user'];
		$_SESSION['name']=$donnees['name'];
		$_SESSION['login']=$donnees['login'];   
		$_SESSION['password']=$donnees['password'];
		if($donnees['role']==client){
		$_SESSION['role']=1;	//1 = utilisateur
		}
		if($donnees['role']==admin){
		$_SESSION['role']=0;	//0 = admin
		}
		header('location: Main.php'); //redirection main page d'accueil
		exit();
		
	}else{
	
		header('location: id.php?FailId=mp'); //redirection identification page de connexion si le le mot de passe existe

	}
}else{
 
	header('location: id.php?FailId=FALSE'); //redirection identification page de connexion si les champs ne sont pas remplis
		exit();

}
	
?>
