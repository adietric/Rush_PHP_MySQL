<?php
	session_start();
	require_once '../includes/header.php';
	$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
	if($link === false)
		die("ERROR: Could not connect. " . mysqli_connect_error());
	$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
	$ok = 0;
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
		if (strcmp($array['id'], $_POST['id']) == 0)
			{
				$ok = 1;
				break;
			}
	if ($ok === 0 || $_POST['modif_or_suppr'] !== "MODIFIER/SUPPRIMER")
	{
		?>
<html>
	<head>
	 	 <meta charset="utf-8">
	 	 <meta http-equiv="x-ua-compatible" content="ie=edge">
		<link href="../style/includes.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body style="margin-top:500px"></body>


	<?php
		echo("Aucune donnée n'est trouvée <br>");
		return ;
	}
	else
	{

?>
<html>
	<head>
	 	 <meta charset="utf-8">
	 	 <meta http-equiv="x-ua-compatible" content="ie=edge">
		<link href="../style/includes.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
<body style="margin-top:500px">
<table>
    <thead>
        <tr>
            <th colspan="11">MODIFICATION / SUPPRESSION</th>
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
			<td> <form action="suppr_something.php" method="POST">
			<INPUT type="submit" name="suppr_adm_s" value="SUPPRIMER" onclick="window.location='suppr_something.php';"/> 
				<input type="hidden" name="id" value="<?php echo $array['id']?>" />
			</form>
			</td>
		</form> </td>
   </tr>
   				<form method="POST" action="modif_something.php" >
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
            <td> <INPUT type="number" min="0" max="999" name="id" maxlength="3" value="" /> 
				<INPUT type="hidden" name="real_id" value="<?php echo $array['id']?>" />
			</td>
			<td> <INPUT type="submit" name="modif_adm_s" value="MODIFIER" /> </td>
        </tr>
				</form>
    </tbody>


</body>
<?php } ?>
</html>
