<?php session_start() //utilisation des variables SESSION  //////////////////////////////////a noter les pages fruits, legumes et aromates sont quasiments les mêmes donc seul celle ci serra commentée?>
<!doctype html>
<?php include_once('Database.php'); //connexion bdd?>
<html>
<head>
<meta charset="utf-8">
<title>Fruit</title>
<link href="css/StructureAll.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
 <?php 
 //inclus les morceaux de pages : menu produits et header
include("header_page.php"); 
include("menu.php");
if (ISSET ($_SESSION['role'])){	//test si on est identifié
if($_SESSION['role']==1){        //affichage session client

    include("panier.php");  //inclus le menu panier?>

<div class="traitGauche"> <!-- trait gauche à coté des produits -->
<?php 
    $reponse = $bdd->query('SELECT * FROM article WHERE id_category=3 ');
    while($donnees = $reponse->fetch()){    //affichage de tous les article de catégorie 3=aromates


?>











<div class="images">

<table width='500px'>  <!-- affichage de l'image, du nom et du prix dans un tab -->
<tr>
<td>
<img src="<?php echo $donnees['image_src']?>"width="200" height="175" ></td> <!-- affichage de l'image-->
<td>
<h2>
<?php echo $donnees['name'];?></h2> <!-- affichage du nom du produit présent dans la bdd-->
</br> <h2>Prix:
<?php echo $donnees['price'];?> Euros/Kilo</h2></td> <!-- affichage du prix du produit présent dans la bdd-->
</tr>
</table>

<form action="enregistrer.php" method="post"> <!-- formulaire pour enovoyer le nombre de produits sélectionnés, leur prix et leur catégorie -->
<label for="quantité"></label><input type="number" name="combien"/>
<label for="prix"></label><input type="hidden" name="price" id="prix" value="<?php echo $donnees['price']?>" />
<label for="fruit"></label><input type="hidden" name="fruit" id="fruit" value="<?php echo $donnees['name']?>"/>
<input type ="submit" id="submit" value ="Submit" />
</form>

</div>
</br>
<?php   } //fin boucle while
}else{ //début session admin  
?>

<form align="center" action="ajouterContenu.php" method="post"> <!-- formulaire pour enovoyer le nom du produit ajouté, leur prix et leur catégorie -->
<label for="type"></label><input type="hidden" name="id_category" id="id_category" value="3"/>
<label for="name"></label><input placeholder="Nom aromate ( ex : Ail)"type="text" name="name" id="name"/><br/>
<label for="price"></label><input placeholder="Prix fruit concerné"type="text" name="price" id="price"/><br/>
<input type ="submit" id="submit" value ="Submit" />
</form>

<?php 

    if( isset($_GET['new'])){ 
        if($_GET['new']=="false"){ //récupère la variable envoyé par l'URL de la page ajouterContenu.php et gérer l'affichage
            ?><div class="erreur">Produit existant</div><?php
            
        }
        if($_GET['new']=="true"){
            ?><div class="erreur">Nouveau produit enregistré</div><?php
            
        }
    }
    
    






} 
}?>

</div>
</div>
<?php include("footer.php"); //footer
?>

</body>

</html>