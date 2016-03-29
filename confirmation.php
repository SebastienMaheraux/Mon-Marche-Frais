<!DOCTYPE html>
<html>
<head>
    <title>Confirmation</title>
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/welcome.css" />
</head>
<body>

	<?php	
	$bdd = new PDO('mysql:host=localhost;dbname=monsite','root',''
	,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$reponse=$bdd->query('SELECT *
	FROM user ORDER BY id_user desc limit 1');
	while ($donnees = $reponse->fetch())
{
	echo '<p>Mr ' . $donnees['name'] .  ' your login is ' 
	. $donnees['login'] . ' and your password: ' . $donnees['password'] . '</p>';
}
$reponse->closeCursor();



?>
</body>
</html>