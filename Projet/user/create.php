<?php
session_start();
$i = 0;
$p = 0;
$n = 0;
if($_SESSION['log_in'] !== NULL)
	$n = 1;
else if ($_POST['submit'] === 'JE CREE MON COMPTE')
{
	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$i = 0;
	$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");	
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
	{
		if ($array['users'] === $_POST['login'])
		{
			$i = 1;
			break;
		}
	}
	$p = 0;
	if ($i === 0)
	{
		if ($_POST['pass'] === NULL)
			$p = 1;
		else
		{
			$passw = hash('whirlpool', $_POST['pass']);
			$sql = 'INSERT INTO `user_data` (`users`, `password`, `god_mode`, `connected`, `cart`, `ban`, `attempt`)
				VALUES ("'.$_POST['login'].'", "'.$passw.'", "0", "0", "0", "0", "0");';
			if (!(mysqli_query($link, $sql) === TRUE))
				echo "Error de mise à jour de la database <br>";
			if ($link)
				mysqli_close($link);
			header('Location: ./../index.php');
		}
	}
}
?>


<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style/login.css" type="text/css" rel="stylesheet"/>
  <title>Nouveau compte</title>
</head>
<p style="color:red;" ><?php 
	if ($n == 1)
		echo("Bonjour ".$_SESSION['log_in'].", veuillez vous déconnecter avant de créer un compte<br/>");
	else if ($i == 1)
		echo("Login ".$_POST['login']." est déjà utilisé, veuillez reéessayer <br/>");
	else if ($p == 1)
		echo("Mot de passe incompatible, veuillez reéessayer avec un nouveau mot de passe<br/>");
 ?></p>
<body>
<form action="create.php" method="POST">
  <h2>Créer un compte</h2>
  <div>
    <label for="login">Identifiant</label>
    <input type="text" id="login" name="login" maxlength="19" placeholder="Identifiant" required>
  </div>
  <div>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" maxlength="20" name="pass" placeholder="Mot de passe" required>
  </div>
  <div>
	<input type="submit" name="submit" value="JE CREE MON COMPTE">
    <a href="./../index.php">Retour</a>
  </div>
</form>
</body>
</html>