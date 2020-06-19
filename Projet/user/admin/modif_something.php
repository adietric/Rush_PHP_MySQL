<?php

require_once 'includes/header.php';
session_start ();
if (!($_POST['modif_adm_s'] === "MODIFIER"))
	echo("ACCEES DENIED </br>");
else
{


	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
	$ok = 0;
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
	{
		if (strcmp($array['id'], $_POST['real_id']) == 0)
		{
			$ok = 1;
			break;
		}
	}
	if ($ok === 0)
		echo("Aucun produit ne correspond à l'id ".$_POST['real_id'].". Veuillez réessayer <br/>");
	else
	{

		if(!($_POST['name']))
			$_POST['name'] = $array['name'];
		if(!($_POST['color']))
			$_POST['color'] = $array['color'];
		if(!($_POST['spark']))
			$_POST['spark'] = $array['spark'];
		if(!($_POST['region']))
			$_POST['region'] = $array['region'];
		if(!($_POST['price']))
			$_POST['price'] = $array['price'];
		if(!($_POST['year']))
			$_POST['year'] = $array['year'];
		if(!($_POST['img']))
			$_POST['img'] = $array['img'];
		if(!($_POST['stock']))
			$_POST['stock'] = $array['stock'];
		if(!($_POST['ordered']))
			$_POST['ordered'] = $array['ordered'];
		
		if ($_POST['id'])
		{
			$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
			while (($array = mysqli_fetch_assoc($query)) !== NULL)
			{
				if (strcmp($array['id'], $_POST['id']) == 0)
				{
					echo("L'id ".$_POST['id']." est déjà utilisé, veuillez réessayer. <br/>");
					mysqli_close($link);
				}
			}
		}
			else if (!($_POST['id']))
				$_POST['id'] = $_POST['real_id'];

			$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
			while (($array = mysqli_fetch_assoc($query)) !== NULL)
				if (strcmp($array['id'], $_POST['id']) == 0)
					break;
				$sql = 'UPDATE `tgw` SET `name`="'.$_POST['name'].'", `color`="'.$_POST['color'].'", `spark`="'.
					$_POST['spark'].'", `region`="'.$_POST['region'].'", `price`="'.$_POST['price'].
					'", `year`="'.$_POST['year'].'", `img`="'.$_POST['img'].'", `stock`="'.$_POST['stock'].
					'", `ordered`="'.$_POST['ordered'].'", `id`="'.$_POST['id'].'" WHERE `id`="'.$_POST['real_id'].'"';

				if (!(mysqli_query($link, $sql) === TRUE))
					echo "Error de mise à jour de la database <br>";
				if ($link)
					mysqli_close($link);
				header('Location: ./admin_stock.php');
				return ;
	}
}
?>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

	<body style="margin-top:500px">
		<a href="./admin_stock.php">Réessayer</a> <br>
		<a href="./../index.php">Retourner à la page d'accueil</a>
	</body>
</html>
