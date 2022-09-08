<!DOCTYPE html>
<html>
<head>
	<?php include("entete.php") ?>
	<title>page de conexxion</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<script type="text/javascript" src="bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php 
	function Connexion($Nom, $Mdp,$alert)
	{
		$titre = "Eksi nga si Connecter kaay bi!";
		$paragraphe = "remmpliral pakh yii si souf ngir niou meune la binde";
		entete($titre, $paragraphe ,$alert);
		?>
		<div class="corp">
			<div class="form">
				<form>
					<label>Sa Tour</label><br>
					<input type="text" name="Tour" value=<?php echo $Nom; ?> ><br><br>
					<label> Sa mot de passe </label><br>
					<input type="password" name="mdp" value=<?php echo $Mdp; ?> ><br><br>
					<input type="submit" name="" class="submit"><br><br>
				</form>
			</div>
		</div>
		<div class="menue">
			<button type="button" class="btn">Souniouy Nataal </button>
			<a href="login.php"> <button type="button" class="btn">bindou kaay bi</button></a>
		</div>
	<?php }

		if (empty($_REQUEST["Tour"]) && empty($_REQUEST["mdp"])) {
			$alert="";
			$Nom="";
			$Mdp="";
			Connexion($Nom,$Mdp,$alert);
		}
		elseif(empty($_REQUEST["Tour"]) && !empty($_REQUEST["mdp"])) {
			$alert="Niouguilay Niaane nga remplir pakh yeupp Ngir meuneu dialleu";
			$Nom="";
			$Mdp="";
			Connexion($Nom,$Mdp,$alert);
		}
		elseif(!empty($_REQUEST["Tour"]) && empty($_REQUEST["mdp"])) {
			$alert="Niouguilay Niaane nga remplir pakh yeupp Ngir meuneu dialleu";
			$Nom=$_REQUEST["Tour"];
			$Mdp="";
			Connexion($Nom,$Mdp,$alert);
		}
		elseif(!empty($_REQUEST["Tour"]) && !empty($_REQUEST["mdp"])) {
			$Nom=$_REQUEST["Tour"];
			$Mdp=$_REQUEST["mdp"];

			//INFO BDD 
			$user = "root";
			$serveur= "localhost"; 
			$bdd="membrecafe";
			$password= "";
			$table = "Utilisateurs";
			$conn = mysqli_connect($serveur, $user, $password, $bdd);
			if (!$conn){
				echo "echec de la connexion";
			}
			$query="SELECT * FROM utilisateurs WHERE Prenom ='$Nom' and Mdp='$Mdp'" ;
			$res=mysqli_query($conn,$query);
			if (mysqli_num_rows($res)) {
				include("accueil.php");
			}
			else{
				$Nom="";
				$Mdp="";
				$alert="echec de la conexion, verifiez les informations entrées SVP";
				Connexion($Nom,$Mdp,$alert);
			}

			/*
			$result= mysqli_query($conn,$query);
			$tableau=array();
			$Indlign=0;
			while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
				$tableau[$Indlign][0] = $row[0];
				$tableau[$Indlign][1]= $row[1];
				$Indlign++;
			}
			print_r($tableau);*/

		}
	?>
	

</body>
</html>