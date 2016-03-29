
<link href="css/menu_deroulant.css" rel="stylesheet" type="text/css">
<div id="header_page" class="header">
  	<div class="connect">
<?php 
	if (!EMPTY($_SESSION['name'])){ //si on est connecté
?>
	<h3><ul id="menu-accordeon">
		<li><a href="Main.php"><?php echo $_SESSION['name'];?></a>
			<ul>
				
<?php
		if($_SESSION['role']==1){ //si on est client
		?>
		<li><a href="commande.php">Commandes en cours</a></li>
		<li><a href="remplirHistorique.php">Historique</a></li>
		<?php
		}
?>
				
				<li><a href="deconnexion.php">Déconnexion</a></li>
			</ul>
		</li>
	</ul></h3>
<?php
	}else{                        //si on n'est pas connecté          
?>
	<h3><a href="id.php">connection </a></h3><?php 
	}
?>
	
    </div>
    <h1> Mon marché frais </h1>
    <h2>Tous vos fruits et légumes à porté de clic!</h2>
  </div>