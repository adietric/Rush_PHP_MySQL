<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style/cart.css" type="text/css" rel="stylesheet"/>
  <link href="../style/includes.css" type="text/css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title>Panier</title>
</head>
<?php
require_once('../includes/header.php');
?>
<body>
  <main>
    <div class="basket">
      <div class="basket-labels">
        <ul>
          <li class="it item-heading">Articles</li>
          <li class="price">Prix</li>
          <li class="quantity">Quantité</li>
          <li class="subtotal">Sous-total</li>
        </ul>
      </div>
	  <?php 
	  		$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
			if($link === false)
				die("ERROR: Could not connect. " . mysqli_connect_error());
			$query = mysqli_query($link, "SELECT * FROM `tgw` ORDER BY id desc");
    		while (($array = mysqli_fetch_assoc($query)) !== NULL) 
			{
				if ($array['ordered'] > 1)
				{ 
					$tot = $array['ordered'] * $array['price'];
					?>

      					<div style="position:relative;" class="basket-product">
      					  <div class="it">
      					    <div class="product-image"><?php
      					     echo "<img src=" . $array['img'] . " alt='item'/>";?>
      					    </div>
      					    <div class="product-details">
      					      <p><strong> <?php echo $array['color'] ?>/ <?php echo $array['region'] ?> </strong></p>
      					      <h1><strong><span class="item-quantity"> </span></strong> <?php echo $array['name'] ?> </h1>
      					    </div>
      					  </div>
      					  <div class="price"> <?php  echo $array['ordered'] ." x ". $array['price'] ?> </div>
      					  <div class="quantity">
      					    <input type="number" value="4" min="1" max="stock" class="quantity-field">
      					  </div>
      					  <div class="subtotal"> Sous-total: <?php echo $tot ?> </div>
      					  <div class="remove">
      					    <button>Supprimer</button>
      					  </div>
      					</div>
				<?php
				}
			} ?>
      <div class="basket-product">
        <div class="summary-total-items"><span class="total-items"></span>Votre Panier</div>
        <div class="summary-total">
          <div class="sutotal">Total : +total</div>
        </div>
        <div class="summary-checkout">
          <button class="checkout-cta">Paiement</button>
        </div>
</div>
      </div>
    </aside>
  </main>
</body>
<footer>
<?php
require_once('../includes/footer.php');
?>
</footer>
</html>