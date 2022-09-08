<!DOCTYPE html>
<html>
<?php include("controleLogin.php") ?>
<head>
	<title>pageou bindoukaay bi</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<script type="text/javascript">
		function test(){
		if (document.getElementById("goor").checked="true"){
			document.getElementById("Jiguen").disabled="true";
		}
		else {
			document.getElementById("Jiguen").disabled="false";
		}
		}
		function test1(){
			if (document.getElementById("Jiguen").checked="true"){
				document.getElementById("goor").disabled="true";
			}
			else {
				document.getElementById("goor").disabled="false";
			}
		}
		function verif_case(goor,Jiguen){
 			var obj1=document.getElementById("goor");
 			var obj2=document.getElementById("Jiguen");
			if(obj1.checked!=true && obj2.checked!=true  ){
  				alert("Faw nga beuss benne si niari case yooyu si souf !!");
  				return false;
				}
				return  true
			}

	</script>
</head>
<body>
	<?
 	function Controle($nameChamps)
	{
		$value;
		if (empty($_REQUEST[$nameChamps])) {
			$value = null;
		}
		else {
			$value= $_REQUEST[$nameChamps];
		}
		return $value;
	}
	$nameTour = "Tour";
	$nameSante = "sante";
	$nameAtte = "atte";
	$nameMdp = "mdp";
	if (empty($_REQUEST['Tour'])&& empty($_REQUEST['sante']) && empty($_REQUEST['atte'])&&empty($_REQUEST['mdp'])&&empty($_REQUEST['goor'])&&empty($_REQUEST['Jiguen'])) {
		Formulaire($tour=null, $sante=null, $atte=null, $mdp=null,$alert=null);
	}

	elseif(empty($_REQUEST['Tour'])|| empty($_REQUEST['sante']) || empty($_REQUEST['atte'])||empty($_REQUEST['mdp']))
	{?>
		<?do {
			$alert="Niouguilay Niaane nga remplir pakh yeupp Ngir meuneu dialleu";
			$tour= Controle($nameTour);
			$sante=Controle($nameSante);
			$atte=Controle($nameAtte);
			$mdp=Controle($nameMdp);
			Formulaire($tour,$sante, $atte, $mdp,$alert);
		} while (!empty($_REQUEST['Tour']) && !empty($_REQUEST['sante']) && !empty($_REQUEST['atte'])&& !empty($_REQUEST['mdp']));
	}
	else{
		$sexe=$_REQUEST["sexe"];
		$tour = $_REQUEST["Tour"];
		$sante = $_REQUEST["sante"];
		$atte = $_REQUEST["atte"];
		$mdp = $_REQUEST["mdp"];

		$user = "root";
		$serveur= "localhost"; 
		$bdd="membrecafe";
		$password= "";
		$table = "Utilisateurs";
		$conn = mysqli_connect($serveur, $user, $password, $bdd);
		if (!$conn){
			echo "echec de la connexion";
		}
		$query = "INSERT INTO utilisateurs(Prenom, Nom, Age, Mdp, Sexe) VALUES ('$tour', '$sante', '$atte', '$mdp', '$sexe')";
		if (mysqli_query($conn, $query)) {
     		 include("accueil.php");
		}
	else{
		echo "Erreur : " . $query . "<br>" . mysqli_error($conn);
	}
	}
	?>
</body>
</html>