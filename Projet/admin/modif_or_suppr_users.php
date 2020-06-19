<?php
	session_start();
	require_once '../includes/header.php';
	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");
	$ok = 0;
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
		if (strcmp($array['users'], $_POST['users']) == 0)
			{
				$ok = 1;
				break;
			}
	if ($ok === 0 || $_POST['modif_or_suppr_users'] !== "MODIFIER/SUPPRIMER")
	{
		echo("L'users ".$_POST['users']." n'est pas dans la base de donneée");
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
			<a href="../index.php">Retourner à la page d'accueil</a>
		</body>
	</html>

	<?php

	}
	else
	{
		?>

	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link href="../style/includes.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
<table>
<body style="margin-top:500px">
    <thead>
        <tr>
            <th colspan="8">Admin_Users</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Nom</b></td>
            <td><b>Password</b></td>
            <td><b>God_mode</b></td>
            <td><b>Connected</b></td>
            <td><b>Cart</b></td>
            <td><b>Ban</b></td>
            <td><b>Attempt</b></td>
			<td></td>
        </tr>
		<tr>
            <td><?php echo $array['users']?></td>
            <td><?php echo $array['password']?></td>
            <td><?php echo $array['god_mode']?></td>
            <td><?php echo $array['connected']?></td>
            <td><?php echo $array['cart']?></td>
            <td><?php echo $array['ban']?></td>
            <td><?php echo $array['attempt']?></td>
			<td> <form action="suppr_users.php" method="POST">
    			<INPUT type="submit" name="suppr_users" value="SUPPRIMER"
				onclick="window.location='suppr_users.php';"/>
				<input type="hidden" name="users" value="<?php echo $array['users']?>" />
			</form> </td>
   		</tr>
   				<form method="POST" action="modif_something_users.php" >
        <tr>
            <td>
				<INPUT type="text" name="users" maxlength="19" value="" />
				 <INPUT type="hidden" name="real_name" value="<?php echo $array['users']?>" />
			</td>
            <td> <INPUT type="text" name="password" maxlength="254" value="" /> </td>
            <td> <INPUT type="number" name="god_mode" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="connected" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="cart" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="ban" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="attempt" min="0" max="1" value="" /> </td>
			</td>
			<td> <INPUT type="submit" name="modif_adm_u" value="MODIFIER" /> </td>
        </tr>
				</form>
    </tbody>

</body>
<?php } ?>
</html>