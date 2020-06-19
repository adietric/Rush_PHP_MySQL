<?php
	session_start();
	require_once '../includes/header.php';
	if ($_POST['submit_adm_s'] && $_POST['submit_adm_s'] === 'AJOUTER')
	{
		$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
		if($link === false)
    		die("ERROR: Could not connect. " . mysqli_connect_error());

		if(!($_POST['name']))
			$_POST['name'] = "###";

		if(!($_POST['color']))
			$_POST['color'] = "###";

		if(!($_POST['spark']))
			$_POST['spark'] = "###";

		if(!($_POST['region']))
			$_POST['region'] = "###";

		if(!($_POST['price']))
			$_POST['price'] = 0;

		if(!($_POST['year']))
			$_POST['year'] = 0;

		if(!($_POST['img']))
			$_POST['img'] = "###";

		if(!($_POST['stock']))
			$_POST['stock'] = 0;

		if(!($_POST['ordered']))
			$_POST['ordered'] = 0;

		if(!($_POST['id']))
		{
			$_POST['id'] = $_SESSION['stock_id'];
			$_SESSION['stock_id'] = $_SESSION['stock_id'] - 1;
		}
		else
		{
			$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
			while (($array = mysqli_fetch_assoc($query)) !== NULL)
				if ($array['id'] === $_POST['id'])
				{
					echo("L'id ".$_POST['id']." est déjà utilisé, veuillez réessayer. <br/>");
					mysqli_close($link);
					return ;
				}
		}




		$sql = 'INSERT INTO `tgw` (`name`, `color`, `spark`, `region`, `price`, `year`, `img`, `stock`, `ordered`, `id`)
				VALUES ("'.$_POST['name'].'", "'.$_POST['color'].'", "'.
				$_POST['spark'].'", "'.$_POST['region'].'", "'.$_POST['price'].'", "'.$_POST['year'].'", "'.
				$_POST['img'].'", "'.$_POST['stock'].'", "'.$_POST['ordered'].'", "'.$_POST['id'].'");';
	if (!(mysqli_query($link, $sql) === TRUE))
		echo "Error de mise à jour de la database <br>";
	if ($link)
		mysqli_close($link);
	header('Location: ./admin_stock.php');
	}
?>

<html lang="fr">

	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link href="../style/includes.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>

<html>
	<body style="margin-top:500px">
		<a href="./admin_stock.php">Réessayer</a> <br>
		<a href="./../index.php">Retourner à la page d'accueil</a>
	</body>
</html>
