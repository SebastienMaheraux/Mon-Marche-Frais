<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
<link href="css/StructureAll.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="inscription">
<?php
	 
		if ($_SERVER['HTTP_REFERER']=='http://localhost/Projet/NouvelUtilisateur.php'){
			$html ='Login ou mot de passe incorrect';
			echo $html;
		}
	
	?>
<h1>Inscription : <form action="NouvelUtilisateur.php" method="post">
        
        <label for="name"></label>  <input type="text" name="monNom"
  id="nom" placeholder="Nom svp" /><br />
  <label for="login"></label>   <input type="text" name="monIdentifiant"
  id="identifiant" placeholder="Login"  /><br />
  <label for="password"></label> 
    <input type="text" name="monMP"
  id="mp" placeholder="password" /><br />
  <input type="submit">
</form>
</h1>
</div>

<div class="connexion">
<h1>Connexion : <form action="IdentificationUtilisateur.php" method="post">
        
        
  <label for="login"></label>   <input type="text" name="monIdentifiant"
  id="identifiant" placeholder="Login"  /><br />
  <label for="password"></label> 
    <input type="text" name="monMP"
  id="mp" placeholder="password" /><br />
  <input type="submit">
</form>
</h1>
</div>




</body>

</html>