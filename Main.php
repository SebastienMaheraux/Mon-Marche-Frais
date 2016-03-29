<?php session_start()  // utilisation variables de session?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="css/StructureAll.css" rel="stylesheet" type="text/css">


</head>

<body>

<div class="container">
  <?php include("header_page.php");
		include("menu.php");
		if(!EMPTY($_SESSION['role'])){
			if($_SESSION['role']==1){		//affichage uniquement pour le client, super variable définie dans IdentificationUtilisateur.php et NouvelUtilisateur.php

		
			
			
			include("panier.php");
			}
		}
  ?>
  
  
  <div>
  	<h3>Bienvenue sur notre Projet de Technologie Web</h3>
  	<h4> Vous etes actuellement sur la Home page de notre site. Nous vous invitons à le visiter.</br>
	Et surtout n'oubliez pas manger des fruits frais. </br>	</h4>
  
  
  
  </div>
  
  <!-- end .container --></div>
   <?php include('footer.php');?>
</body>
</html>
