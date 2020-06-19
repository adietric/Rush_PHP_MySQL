<?php
	session_start();
	$_SESSION['not_log'] = 1;
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style/includes.css" type="text/css" rel="stylesheet"/>
  <link rel="shortcut icon" type="image/png" href="https://www.donbrocoli.com/wp-content/uploads/2018/05/cropped-favicon.gif"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title>TheGoodWine</title>
</head>
<body style="margin-top:500px">
<?php
require_once 'includes/header.php';
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'thegoodwine');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>

<div class="wrapper">
    <div class="clear"></div>
    <div class="items">
	
	<?php
	session_start();
		if ($_GET['c'] === 'wh')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE color = 'Blanc' ORDER BY RAND()");
		elseif ($_GET['c'] === 'pk')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE color = 'Rose' ORDER BY RAND()");
		elseif ($_GET['c'] === 'rd')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE color = 'Rouge' ORDER BY RAND()");
		elseif ($_GET['c'] === 'pk')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE color = 'Rose' ORDER BY RAND()");
		elseif ($_GET['c'] === 'tr')
			$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY `tgw`.`color` ASC");
		elseif ($_GET['p'] === 'y')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE spark = 'Oui' ORDER BY RAND()");
		elseif ($_GET['r'] === 'cr')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE region = 'Corse' ORDER BY RAND()");
		elseif ($_GET['r'] === 'la')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE region = 'Languedoc-Roussilon' ORDER BY RAND()");
		elseif ($_GET['r'] === 'lo')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE region = 'Loire' ORDER BY RAND()");
		elseif ($_GET['r'] === 'rh')
			$query = mysqli_query($link, "SELECT * FROM `tgw` WHERE region = 'Rhone' ORDER BY RAND()");
		elseif ($_GET['r'] === 'tr')
			$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY `tgw`.`region` ASC");
		else
			$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY RAND()");
    	while (($array = mysqli_fetch_assoc($query)) !== NULL) {

		echo "<div class='item'>";
		echo "<img src=" . $array['img'] . " alt='item'/>";
		echo "<h2>" . $array['name'] . "</h2>";
		echo "<p>" . $array['color'] . " - " . $array['region'] . "</p><br/>";
		echo "<p>Prix: <em>" . $array['price'] ."</em></p>";
		echo "<div class='quantity'>";
		echo "<input type='number' value='4' min='1' max='stock' class='quantity-field'>";
		echo "<button class='add-to-cart' type='button'>Ajouter au panier</button>";
		echo "</div>";
		echo "</div>";
	}
	?>
	</div>
</div>
</body>
<footer>
<?php
require_once('../includes/footer.php');
?>
</footer>




        
            

        