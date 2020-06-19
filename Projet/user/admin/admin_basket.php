<?php
	session_start();
	require_once '../includes/header.php';  
?>

<html>
<head>
        <meta charset="UTF-8">
        <title>admin_basket.php</title>
		<link href="../style/includes.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="margin-top:500px">
<table>
    <thead>
        <tr>
            <th colspan="6">Admin_basket</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Nom User</b></td>
            <td><b>Quantitée</b></td>
            <td><b>Produit</b></td>
            <td><b>Subtotal</b></td>
            <td><b>Total</b></td>
			<td></td>
        </tr>
<?php

	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$query = mysqli_query($link, "SELECT * FROM `basket` ORDER BY `users` desc");
    while (($array = mysqli_fetch_assoc($query)) !== NULL) 
	{
		?>
		<tr>
            <td><?php echo $array['users']?></td>
            <td><?php echo $array['quantite']?></td>
            <td><?php echo $array['product']?></td>
            <td><?php echo $array['subtotal']?></td>
            <td><?php echo $array['total']?></td>
			<td> <form action="modif_or_suppr_basket.php" method="POST">
    			<INPUT type="submit" name="modif_or_suppr" value="MODIFIER/SUPPRIMER"
				onclick="window.location='put_something_basket.php';"/>
				<input type="hidden" name="users" value="<?php echo $array['users']?>" />
			</form> </td>
   </tr><?php
	} ?>
				<form method="POST" action="put_something_basket.php" >
        <tr>
            <td> <INPUT type="text" name="users" maxlength="50" value="" /> </td>
            <td> <INPUT type="number" name="quantite" min="0" max="100" value="" /> </td>
            <td> <INPUT type="number" name="product" min="0" max="100" value="" /> </td>
            <td> <INPUT type="number" name="subtotal" min="0" max="10000" value="" /> </td>
            <td> <INPUT type="number" name="total" min="0" max="1000000000" value="" /> </td>
			<td> <INPUT type="submit" name="submit_adm_b" value="AJOUTER" /> </td>
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