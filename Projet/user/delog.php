<?php
session_start();
if ($_SESSION['log_in'])
{
	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$i = 0;
	$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");	
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
	{
		if ($array['users'] === $_SESSION['log_in'])
		{
			$i = 1;
			break;
		}
	}
	if ($i === 1)
	{
		$sql = 'UPDATE `user_data` SET `connected`="0"';
		$_SESSION['log_in'] = NULL;
		header('Location: ./../index.php');
		if (!(mysqli_query($link, $sql) === TRUE))
			echo "Error de mise à jour de la database <br>";
		if ($link)
			mysqli_close($link);
		header('Location: ../index.php');
		return ;
	}
}

?>

<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style/login.css" type="text/css" rel="stylesheet"/>
</head>

<html>
	<body>
		<p> Problème lors de la deconnection de <?php echo($_SESSION['log_in']) ?> </p> <br/>
		<a href="./../index.php">Retourner à la page d'accueil</a>
	</body>
</html>

<?php

?>

