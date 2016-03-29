<?php 
session_start(); //utilisation des super variables $_SESSION
if (!EMPTY ($_POST['nouveauNom'])&& !EMPTY($_POST['nouvelIdentifiant'])&& !EMPTY($_POST['nouveauMP'])){ //test si les champs sont remplis

	include_once('Database.php'); //ouverture database
	$reponse = $bdd->query('SELECT * FROM user WHERE login="'.$_POST['nouvelIdentifiant'].'"');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if ($donnees['login'] == $_POST['nouvelIdentifiant']){ //test si le login n'existe pas déjà

	header('location:id.php?newUser=t'); //redirection id.php avec la variable newUser
	exit();
	}else{
		
		try{ //entre les données dans la base de données

			$req = $bdd->prepare('insert into user(name,login,password,role) values (:nom, :identifiant, :motdepasse,\'client\')');
			 $req->execute(array('nom' =>$_POST['nouveauNom'],'identifiant'=>$_POST['nouvelIdentifiant'],
			 'motdepasse'=>$_POST['nouveauMP']));
			 
			
		
			
			
		}catch (PDOException $e) {
			echo("<pre>");
			var_dump($e);
		}
		$reponse = $bdd->query('SELECT * FROM user WHERE login="'.$_POST['nouvelIdentifiant'].'"');
		$donnees = $reponse->fetch();
		$reponse->closeCursor();
		
		//variables de ma session
		$_SESSION['id_user']=$donnees['id_user'];
		$_SESSION['name']=$donnees['name'];
		$_SESSION['login']=$donnees['login'];   
		$_SESSION['password']=$donnees['password'];
		$_SESSION['role']=1; // 1 = utilisateur
		echo $_SESSION['name'];
		header('location:Main.php');//redirection Main.php
		exit();
	}
}else{

	header('location:id.php?newUser=FALSE');//redirection id.php avec la variable newUser
	exit();
}
	
?>