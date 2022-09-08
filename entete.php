<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	function entete($titre, $paragraphe ,$alert)
	{?>
		<div class="entete">
			<h1> <?php echo $titre; ?> </h1>
			<p><?php echo $paragraphe; ?></p>
			<hr>
			<p class="alert"> <?php echo $alert; ?> </p>
		</div>
	<?}

	 ?>

</body>
</html>