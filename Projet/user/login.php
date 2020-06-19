<?php
session_start();
$w = 0;
if (!($_SESSION['log_in']))
{
	$w = 1;
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
			$test_pass = hash('whirlpool', $_POST['pass']);
			$s = 0;
			if ($array['attempt'] >= 3)
				$s = 1;
			else
			{
				$p = 0;
				$v = 0;
				if ($array['password'] !== $test_pass)
				{
					$attempt = $array['attempt'] + 1;
					$sql = 'UPDATE `user_data` SET `attempt`="'.$attempt.'"';
					$p = 1;
					if (!(mysqli_query($link, $sql) === TRUE))
						echo "Error de mise à jour de la database <br>";
					if ($link)
						mysqli_close($link);
				}
				else
				{
					$attempt = 0;
					$sql = 'UPDATE `user_data` SET `attempt`="'.$attempt.'"';
					$sql2 = 'UPDATE `user_data` SET `connected`="1"';
					$_SESSION['log_in'] = $_POST['login'];
					$v = 1;
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
	}
}
?>

<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style/login.css" type="text/css" rel="stylesheet"/>
  <title>Connexion</title>
</head>
<p style="color:red;" ><?php 
if ($_POST['submit'] === 'VALIDER')
{
	if ($w == 0)
		echo("Bonjour ".$_SESSION['log_in'].", veuillez vous déconnecter si vous voulez vous relog<br/>");
	if ($i == 0)
		echo("Login ".$_POST['login']." est introuvable, veuillez reéessayer <br/>");
	else if ($s == 1)
		echo("Le compte ".$_POST['login']." a été suspendu. Veuillez contacter l'administration <br/>");
	else if ($p == 1)
		echo("Mot de passe incorrect, veuillez reéessayer <br/>");
}
 ?></p>
<body>
<form action="login.php" method="POST">
  <h2>Connexion</h2>
  <div>
    <label for="login">Identifiant</label>
    <input type="text" id="login" name="login" maxlength="19" placeholder="Identifiant" value="" required>
  </div>
  <div>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="pass" maxlength="20"  placeholder="Mot de passe" value="" required>
  </div>
  <div>
    <input type="submit" name="submit" value="VALIDER">
    <a href="./create.php">Nouveau? Créer un compte</a>
  </div>
</form>
</body>
</html>