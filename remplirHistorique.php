<?php
session_start(); //utilisation variables sessions
?>
<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="css/StructureAll.css" rel="stylesheet" type="text/css">
<link href="css/tableau_recapitulatif.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php include_once('Database.php'); //connexion bdd

if(ISSET($_POST['value_sum'])){ //si le prix total est paramétré dans la page du panier
	
	try{

		$req = $bdd->prepare('insert into basket(id_user,price) values (:id_user,:price)'); //ajoute un numéro de commande et un prix total
		$req->execute(array('id_user'=>$_SESSION['id_user'],'price'=>$_POST['value_sum'])); 
			
		
		
	}catch (PDOException $e) {
		echo("<pre>");
		var_dump($e);
	}
}
		

?>

<div class="container">

<table align="center">
	<caption>Vos commandes</caption>
	
	<thead><tr>
		<th>Numéro de commande</th>
		<th>Prix Total</th>
	</tr></thead>
	<tbody>
	<?php
	include("header_page.php");	
	
	$reponse = $bdd->query('SELECT * FROM basket where id_user = "'.$_SESSION['id_user'].'"'); //afficahge des commandes passées par l'utilisateur connecté
	while($donnees = $reponse->fetch()){
		
?>
		<tr><td>
			<?php echo $donnees['id_basket'];?>
		</td><td>
			<?php echo $donnees['price']?>
		</td></tr>
		<?php } ?>
	</tbody>
</table>
<?php 
		$reponse->closeCursor();
		$req = $bdd->query("DELETE from basket_line "); //on supprime tous le panier dès que la commande est passée
		$req->closeCursor();
		$reponse = $bdd->query("ALTER TABLE `basket_line` auto_increment = 1;"); //on repasse la variables qui s'autoincrément par 1 afin de pouvoir repasser des commandes en commençant par 1
		$reponse->closeCursor();
		?>

	<h1><a href="Main.php"><input id="buttonEnd" type="button" value="Retour à l'accueil"input></a></h1>
  <!-- end .container --></div>
   <div class="footer">
    <p align="right">Mon groupe All right reserved</p>
    <!-- end .footer --></div>
	

</body>
</html>

