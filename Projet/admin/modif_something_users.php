<?php
session_start ();
require_once '../includes/header.php';
if (!($_POST['modif_adm_u'] === "MODIFIER"))
	echo("ACCEES DENIED </br>");
else
{
	if (!($_POST['users']))
		$_POST['users'] = $_POST['real_name'];
	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");
	$ok = 0;
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
	{
		if (strcmp($array['users'], $_POST['real_name']) == 0)
		{
			$ok = 1;
			break ;
		}
	}
	if ($ok === 0)
		echo("Aucun produit ne correspond à l'id ".$_POST['real_name'].". Veuillez réessayer <br/>");
	else
	{
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

		if(strcmp($_POST['password'], "") == 0)
			$passw = $array['password'];
		else
			$passw = hash('whirlpool', $_POST['password']);
		
		$sql = 'UPDATE `user_data` SET `users`="'.$_POST['users'].'", `password`="'.$passw.'", `god_mode`="'.
			$_POST['god_mode'].'", `connected`="'.$_POST['connected'].'", `cart`="'.$_POST['cart'].
			'", `ban`="'.$_POST['ban'].'", `attempt`="'.$_POST['attempt'].'" WHERE `users`="'.$_POST['real_name'].'"';
	

		if (!(mysqli_query($link, $sql) === TRUE))
    		echo "Error dans la database";
		if ($link)
			mysqli_close($link);
		header('Location: ./admin_users.php');
		return;
	}

}
if ($link)
	mysqli_close($link);
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
		<a href="./modif_or_suppr_users.php">Réessayer</a> <br>
		<a href="./../index.php">Retourner à la page d'accueil</a>
	</body>
</html>
