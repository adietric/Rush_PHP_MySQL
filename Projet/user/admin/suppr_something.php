<?php
session_start();
require_once '../includes/header.php';
$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
if($link === false)
	die("ERROR: Could not connect. " . mysqli_connect_error());
$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
	if (strcmp($array['id'], $_POST['id']) == 0)
	{
		$sql = 'DELETE FROM `tgw` WHERE `id` = "'.$_POST['id'].'";';
		break;
	}
	if (!(mysqli_query($link, $sql) === TRUE))
		echo "Error de mise à jour de la database <br>";
	if ($link)
		mysqli_close($link);
	header('Location: ./admin_stock.php');
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
