<?php
	session_start();
	require_once '../includes/header.php';
	if ($_SESSION['log_in'] === NULL)
	{
		echo("BAD ACCESS !!! </br>");
		return ;
	}
	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$i = 0;
	$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
	 	if (strcmp($_SESSION['log_in'], $array['users']) == 0)
		{
			$i = 1;
			break;
		}
	if ($i !== 1 || strcmp($array['god_mode'], 1) != 0)
	{
		echo("BAD ACCESS !!! </br>");
		return;
	}
?>

<html>
<head>
        <meta charset="UTF-8">
        <title>admin_users.php</title>
		<link href="../style/includes.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="margin-top:500px">
<table>
    <thead>
        <tr>
            <th colspan="8">Admin_Users</th>
        </tr>
    </thead>
    <tbody >
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
<?php

	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");
    while (($array = mysqli_fetch_assoc($query)) !== NULL) 
	{
		?>
		<tr>
            <td><?php echo $array['users']?></td>
            <td><?php echo $array['password']?></td>
            <td><?php echo $array['god_mode']?></td>
            <td><?php echo $array['connected']?></td>
            <td><?php echo $array['cart']?></td>
            <td><?php echo $array['ban']?></td>
            <td><?php echo $array['attempt']?></td>
			<td> <form action="modif_or_suppr_users.php" method="POST">
    			<INPUT type="submit" name="modif_or_suppr_users" value="MODIFIER/SUPPRIMER"
				onclick="window.location='put_something_users.php';"/>
				<input type="hidden" name="users" value="<?php echo $array['users']?>" />
			</form> </td>
   </tr><?php
	} ?>
				<form method="POST" action="put_something_users.php" >
        <tr>
            <td> <INPUT type="text" name="users" maxlength="19" value="" /> </td>
            <td> <INPUT type="text" name="password" maxlength="253" value="" /> </td>
            <td> <INPUT type="number" name="god_mode" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="connected" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="cart" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="ban" min="0" max="1" value="" /> </td>
            <td> <INPUT type="number" name="attempt" min="0" max="1" value="" /> </td>
			<td> <INPUT type="submit" name="submit_adm_s" value="AJOUTER" /> </td>
        </tr>
				</form>
    </tbody>
</table>
</body>
</html>
<?php 
	if ($link)
		mysqli_close($link);
?>