<?php
	session_start();
	require_once '../includes/header.php';
	if (!($_POST['users']))
		echo("Vous devez renseigner le champ \"Nom\" ainsi que \"Password\" <br>");
	if ($_POST['users'] && $_POST['submit_adm_s'] && $_POST['submit_adm_s'] === 'AJOUTER')
	{
		$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
		if($link === false)
    		die("ERROR: Could not connect. " . mysqli_connect_error());
		if(!($_POST['god_mode']))
			$_POST['god_mode'] = 0;
		if(!($_POST['connected']))
			$_POST['connected'] = 0;
		if(!($_POST['cart']))
			$_POST['cart'] = 0;
		if(!($_POST['ban']))
			$_POST['ban'] = 0;
		if(!($_POST['attempt']))
			$_POST['attempt'] = 0;
		if(!($_POST['stock']))
			$_POST['stock'] = 0;
		if(!($_POST['ordered']))
			$_POST['ordered'] = 0;
		$i = 0;
		$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");
		while (($array = mysqli_fetch_assoc($query)) !== NULL)
			if ($array['users'] === $_POST['users'])
				$i = 1;
		if ($i === 1)
			echo("L'user ".$_POST['users']." est déjà dans la database, veuillez réessayer <br>");
		else
		{
			if(!($_POST['password']))
				echo("Le mot de passe n'est pas un format valide, veuillez réessayer <br>");
			else
			{
				$passw = hash('whirlpool', $_POST['password']);
				$sql = 'INSERT INTO `user_data` (`users`, `password`, `god_mode`, `connected`, `cart`, `ban`, `attempt`)
					VALUES ("'.$_POST['users'].'", "'.$passw.'", "'.$_POST['god_mode'].
						'", "'.$_POST['connected'].'", "'.$_POST['cart'].'", "'.$_POST['ban'].
						'", "'.$_POST['attempt'].'");';
				if (!($link->query($sql) === TRUE))
    				echo "Error: " . $sql . "<br>" . $conn->error;
				if ($link)
					mysqli_close($link);
				header('Location: ./admin_users.php');
				return;
			}
		}
		if ($link)
			mysqli_close($link);
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
		<a href="./admin_users.php">Réessayer</a>
		<a href="./../index.php">Retourner à la page d'accueil</a>
	</body>
</html>
