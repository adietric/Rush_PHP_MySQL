<?php
	session_start();
	require_once '../includes/header.php';
	if ($_SESSION['stock_id'] === NULL)
		$_SESSION['stock_id'] = -1;
?>

<html>
<head>
        <meta charset="UTF-8">
        <title>admin_stock.php</title>
		<link href="../style/includes.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="margin-top:500px">
<table>
    <thead>
        <tr>
            <th colspan="11">Admin_Stock</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Nom</b></td>
            <td><b>Couleur</b></td>
            <td><b>Bulles</b></td>
            <td><b>Region</b></td>
            <td><b>Prix</b></td>
            <td><b>Millesim</b></td>
            <td><b>Image</b></td>
            <td><b>En stock</b></td>
            <td><b>Commandés</b></td>
            <td><b>#id</b></td>
			<td></td>
        </tr>
<?php

	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
    while (($array = mysqli_fetch_assoc($query)) !== NULL) 
	{
		?>
		<tr>
            <td><?php echo $array['name']?></td>
            <td><?php echo $array['color']?></td>
            <td><?php echo $array['spark']?></td>
            <td><?php echo $array['region']?></td>
            <td><?php echo $array['price']?></td>
            <td><?php echo $array['year']?></td>
            <td><?php echo $array['img']?></td>
            <td><?php echo $array['stock']?></td>
            <td><?php echo $array['ordered']?></td>
            <td><?php echo $array['id']?></td>
			<td> <form action="modif_or_suppr.php" method="POST">
    			<INPUT type="submit" name="modif_or_suppr" value="MODIFIER/SUPPRIMER"
				onclick="window.location='put_something.php';"/>
				<input type="hidden" name="id" value="<?php echo $array['id']?>" />
			</form> </td>
   </tr><?php
	} ?>
				<form method="POST" action="put_something.php" >
        <tr>
            <td> <INPUT type="text" name="name" maxlength="149" value="" /> </td>
            <td> <INPUT type="text" name="color" maxlength="5" value="" /> </td>
            <td> <INPUT type="text" name="spark" maxlength="3" value="" /> </td>
            <td> <INPUT type="text" name="region" maxlength="49" value="" /> </td>
            <td> <INPUT type="number" min="0" max="99999" name="price" maxlength="5" value="" /> </td>
            <td> <INPUT type="number" min="0" max="9999" name="year" maxlength="4" value="" /> </td>
            <td> <INPUT type="text" name="img" maxlength="499" value="" /> </td>
            <td> <INPUT type="number" min="0" max="9999" name="stock" maxlength="4" value="" /> </td>
            <td> <INPUT type="number" min="0" max="99999" name="ordered" maxlength="4" value="" /> </td>
            <td> <INPUT type="number" min="0" max="999" name="id" maxlength="3" value="" /> </td>
			<td> <INPUT type="submit" name="submit_adm_s" value="AJOUTER" /> </td>
        </tr>
				</form>
    </tbody>
</table>
		
</html>
<?php 
	if ($link)
		mysqli_close($link);
?>