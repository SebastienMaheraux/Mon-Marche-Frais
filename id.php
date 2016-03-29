<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
<link href="css/StructureAll.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="inscription">

<h1>Inscription : <form action="NouvelUtilisateur.php" method="post" > <!--envoit des infos par formulaire sur le nouvel utilisateur-->
			<p>
			<label for="name"></label><input type="text" name="nouveauNom"
			id="nom"placeholder="name" value=""/><br />
			<label for="login"></label><input type="text" name="nouvelIdentifiant"
			id="identifiant" placeholder="Login"  /><br />
			<label for="password"></label><input type="password" placeholder="password" name="nouveauMP"
			id="mp" /><br />
			<?php
		if( isset($_GET['newUser'])){ //récupération de la variables newUser par l'url de la page NouvelUtilisateur.php
			if ($_GET['newUser']=='FALSE'){
				?><div class="erreur"> * remplissez tous les champs</div><?php
				
			}
			if($_GET['newUser']=='t'){
				?><div class="erreur"> * login/password incorrect</div><?php
			
			}
		}
		?>
			<input type ="submit" value ="Submit" />
			</p>
		</form>
</h1>
</div>

<div class="connexion">
<h1>Connexion :<form action="IdentificationUtilisateur.php" method="post"> <!--envoit des infos par formulaire sur l' utilisateur-->
			<p>

			<label for="login"></label><input type="text" name="monIdentifiant" id="identifiant"placeholder="Login"  /><br />
			<label for="password"></label><input type="password"   name="monMP"
			id="mp" placeholder="password"  /><br />
			<?php
		if ( isset($_GET['FailId'])){ //récupération de la variables newUser par l'url de la page IdentificationUtilisateur.php
			$id= $_GET['FailId'];
			if ($id=='FALSE'){
		
				?><div class="erreur"> * remplissez tous les champs</div><?php
				
			}
			if($id=='mp'){
				?><div class="erreur"> * login/password incorrect</div><?php
				
			}
		}
		?>
			<input type ="submit" value ="Submit" />
			</p>
		</form>
</h1>
</div>




</body>

</html>