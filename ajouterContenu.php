<?php session_start(); //utilisation variables session


if (!EMPTY ($_POST['name'])&& !EMPTY($_POST['price'])){ //test si les champs ont bien été remli

	include_once('Database.php'); //connexion bdd
	
	
	if($_POST['id_category']==1){//stock le nom de la page précédente car avec $_SERVER[HTTP_REFERER] on peut avoir des suites tel que : fruits.php?new=false?new=true?new=...
		$nom_page = 'fruits.php';
	}
	if($_POST['id_category']==2){
		$nom_page = 'legumes.php';
	}
	if($_POST['id_category']==3){
		$nom_page = 'aromates.php';
	}
	
	//fruits.php ou legumes.php ou aromates.php
	
	$reponse = $bdd->query('SELECT * FROM article WHERE name="'.$_POST['name'].'"');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if ($donnees['name'] == $_POST['name']){ //si un produit existe déjà
		
		header('location:'.$nom_page.'?new=false'); //redirection vers la page précédente avec la variable new
		exit();
	}else{
	
	$image = "images/".$_POST['name'].".jpeg"; //créé le lien vers l'image correspondante
		
		try{ //entre le nouveau produit

			$req = $bdd->prepare('insert into article(name,id_category,image_src,price) values (:name,:id_category,:image_src,:price)');
			 $req->execute(array('name'=>$_POST['name'],'id_category'=>$_POST['id_category'],'image_src'=>$image,'price'=>$_POST['price']));
			 
			
		
			
			
		}catch (PDOException $e) {
			echo("<pre>");
			var_dump($e);
		}
		header('location:'. $nom_page.'?new=true'); //redirection vers la page précédente avec la variable new
	}
}



?>
