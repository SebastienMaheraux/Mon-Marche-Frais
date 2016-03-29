<?php session_start()?>
<!doctype html>
<?php include_once('Database.php');?>
<html>
<head>
<meta charset="utf-8">
<title>Fruit</title>
<link href="css/StructureAll.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
 <?php 
 
include("header_page.php");
include("menu.php");
if (ISSET ($_SESSION['role'])){
if($_SESSION['role']==1){        //affichage session client

    include("panier.php");?>

<div class="traitGauche">
<?php 
    include_once('Database.php');
    $reponse = $bdd->query('SELECT * FROM article WHERE id_category=1 ');
    while($donnees = $reponse->fetch()){


?>











<div class="images">

<table width='500px'>
<tr>
<td>
<img src="<?php echo $donnees['image_src']?>"width="200" height="175" ></td>
<td>
<h2>
<?php echo $donnees['name'];?></h2>
</br> <h2>Prix:
<?php echo $donnees['price'];?> Euros/Kilo</h2></td>
</tr>
</table>

<form action="enregistrer.php" method="post">
<label for="quantité"></label><input type="number" name="combien"/>
<label for="prix"></label><input type="hidden" name="price" id="prix" value="<?php echo $donnees['price']?>" />
<label for="fruit"></label><input type="hidden" name="fruit" id="fruit" value="<?php echo $donnees['name']?>"/>
<input type ="submit" id="submit" value ="Submit" />
</form>

</div>
</br>
<?php   }
}else{ //début session admin  
?>

<form align="center" action="ajouterContenu.php" method="post">
<label for="type"></label><input type="hidden" name="id_category" id="id_category" value="1"/>
<label for="name"></label><input placeholder="Nom fruit ( ex : Fraise)"type="text" name="name" id="name"/><br/>
<label for="price"></label><input placeholder="Prix fruit concerné"type="text" name="price" id="price"/><br/>
<input type ="submit" id="submit" value ="Submit" />
</form>

<?php 

    if( isset($_GET['new'])){ 
        if($_GET['new']=="false"){
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
<?php include("footer.php"); 
?>

</body>

</html>