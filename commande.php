<?php session_start();      //utilisation variables SESSION?>
<!doctype html>

<?php include_once('Database.php'); //connexion bdd
	if (EMPTY($_SESSION['name'])){ //si on est connecté
		header('location:id.php'); //redirection page de connexion
	}else{ //on reste sur la page
 ?>
<html>
<head>
<meta charset="utf-8">
<title>Panier</title>
<link href="css/StructureAll.css" rel="stylesheet" type="text/css">
<link href="css/tableau_recapitulatif.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="container">

<table align="center">
	<caption>Votre Commande</caption> <!-- tableau qui résume les produits commandés, leurs quantité et le prix Total -->
	<thead><tr>
		<th id="name">Articles</th>
		<th>Prix</th>
		<th>Quantité</th>
		<th>Total</th>
	</tr></thead>
	<tfoot><tr>
		<td id="finalPrice"></td>
		<td id="finalPrice"> Total </td>
		<td id="finalPrice"></td>
		<td id="finalPrice"><?php 
		$req = $bdd->query("SELECT Sum(priceTot) AS value_sum FROM basket_line");
		$data = $req->fetch();  // prix total de la commande
		$req->closeCursor();
		$value_sum = number_format($data['value_sum'],2); // arrondir au centième
		echo $value_sum;
		
		?> euros</td>
	</tr></tfoot>
	<tbody>
	<?php
	include("header_page.php");
	$reponse = $bdd->query('SELECT * FROM basket_line'); 

	while($donnees = $reponse->fetch()){
		
	//remplissage tableau de commande

?>
		<tr><td>
			<?php echo $donnees['name'];?>
		</td><td>
			<?php echo $donnees['price']?>
		</td><td>
			<?php echo $donnees['quantity'];?>
		</td><td>
			<?php echo $donnees['priceTot'];?>
		</td></tr>
	<?php 
		}
		?>
		</tbody>
</table>
	
		<form align="center" action="remplirHistorique.php" method="post"> <!-- formulaire pour enovoyer les détails de la commande dans l'historique -->
			<label for="sum"></label><input type="hidden" name="value_sum" id="value_sum" value="<?php echo $data['value_sum'] ?>"/>
			<input type ="submit" id="submit" value ="Valider Commande" />
		</form>
		<h1><a href="Main.php"><input id="buttonEnd" type="button" value="Retour à mes achats"input></a></h1><!-- retour page main-->
	
  <!-- end .container --></div>
   <div class="footer">
    <p align="right">Mon groupe All right reserved</p>
    <!-- end .footer --></div>
</body>
<?php 	}
 ?>
</html>