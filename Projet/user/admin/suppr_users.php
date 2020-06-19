<?php
session_start();
require_once '../includes/header.php';
$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
if($link === false)
	die("ERROR: Could not connect. " . mysqli_connect_error());
$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
	if (strcmp($array['users'], $_POST['users']) == 0)
	{
		$sql = 'DELETE FROM `user_data` WHERE `users` = "'.$_POST['users'].'";';
		break;
	}
	if ($link->query($sql) === TRUE)
    {
		header('Location: ./admin_users.php');
		return;
	}	
	else
    	echo  "Error de mise à jour de la database <br>";
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
		<a href="./admin_users.php">Réessayer</a>
		<a href="./../index.php">Retourner à la page d'accueil</a>
	</body>
</html>
