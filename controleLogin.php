<!DOCTYPE html>
<html>
<head>
	<?php include("entete.php") ?>
	<title>
	<title>pageou bindoukaay bi</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<script type="text/javascript" src="bootstrap.bundle.min.js"></script>
	</title>
</head>
<body>
<?php
	function Formulaire($tour, $sante, $atte, $mdp, $alert)
	{ 
		$titre=  "Eksi nga si bindou kaay bi!";
		$paragraphe= "remmpliral pakh yii si souf ngir niou meune la binde";
		entete($titre, $paragraphe ,$alert);
		?>
		<div class="corp">
			<div class="form">
				<form action="login.php" method="get" onsubmit="return verif_case(goor,Jiguen) ">
					<label>Sa Tour</label><br>
					<input type="text" name="Tour" value=<?php echo $tour;  ?> ><br><br>
					<label>Sa Sante</label><br>
					<input type="text" name="sante" value=<?php echo $sante; ?> ><br><br>
					<label>Say Atte</label><br>
					<input type="number" name="atte" maxlength="2" value= <?php echo $atte ?>><br><br>
					<label> Sa mot de passe </label><br>
					<input type="password" name="mdp" value=<?php echo $mdp; ?>><br><br>
					<label>Goor</label>
					<input type="checkbox" name="sexe" value="M" class="radio" id="goor" onclick="test()">
					<label>Jiguen</label>
					<input type="checkbox" name="sexe" class="radio" value="F" id="Jiguen" onclick="test1()"><br><br>
					<input type="submit" name="" class="submit" onclick="gBox(goor,Jiguen)"><br><br>
				</form>
			</div>
		</div>
		<div class="menue">
			<button type="button" class="btn">Souniouy Nataal </button>
			<a href="connexion.php"> <button type="button" class="btn">Connecté kaay bi</button></a>
		</div>
	 <?php }?>
</body>
</html>