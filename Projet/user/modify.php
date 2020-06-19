<?php
session_start();
$i = 1;
$p = 1;
$v = 0;
if ($_POST['submit'] === 'VALIDER')
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
	if ($i === 1)
	{
		$test_pass = hash('whirlpool', $_POST['oldpass']);
		$s = 0;
		$p = 1;
		$v = 1;
		if ($array['password'] !== $test_pass)
			$p = 0;
		else if ($_POST['newpass'] === NULL)
			$v = 0;
		else 
		{
			$new_pass = hash('whirlpool', $_POST['newpass']);
			$sql = 'UPDATE `user_data` SET `password`="'.$new_pass.'"';
			$sql2 = 'UPDATE `user_data` SET `attempt`="0"';
			header('Location: ./../index.php');
			if (!(mysqli_query($link, $sql) === TRUE))
				echo "Error de mise à jour de la database <br>";
			if (!(mysqli_query($link, $sql2) === TRUE))
				echo "Error de mise à jour de la database <br>";
			if ($link)
				mysqli_close($link);
			return ;
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
  <title>Modifier mot de passe</title>
</head>
<p style="color:red;" ><?php 
if ($_POST['submit'] === 'VALIDER')
{
	if ($i == 0)
		echo("Login ".$_POST['login']." est introuvable, veuillez reéessayer <br/>");
	else if ($p == 0)
		echo("Le mot de passe du compte ".$_POST['login']." est incorrect, veuillez réessayer <br/>");
	else if ($v == 1)
		echo("Le nouveau mot de passe incorrect, veuillez reéessayer <br/>");
}
 ?></p>

 <body>
<form action="modify.php" method="POST">
  <h2>Modifier mon mot de passe</h2>
  <div>
    <label for="login">Identifiant</label>
    <input type="text" id="login" name="login" maxlength="19" placeholder="Identifiant" required>
  </div>
  <div>
    <label for="password">Ancien mot de passe</label>
    <input type="password" id="password" name="oldpass" maxlength="20" placeholder="Ancien mot de passe" required>
  </div>
  <div>
    <label for="password">Nouveau mot de passe</label>
    <input type="password" id="password" name="newpass" maxlength="20" placeholder="Nouveau mot de passe" required>
  </div>
  <div>
	<input type="submit" name="submit" value="VALIDER">
    <a href="./../index.php">Retour</a>
  </div>
</form>
</body>
</html>