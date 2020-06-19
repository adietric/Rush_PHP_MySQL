<?php
	session_start();
?>
	<header>
		<div class="head">
			<nav class="account">
			<?php
				if(isset($_SESSION['log_in'])){
					?>
				<div class="con-head">
					<div>
						<p>Bonjour, <?php echo htmlspecialchars($_SESSION['log_in']); ?>. Bienvenue</p>
					</div>
					<div>
						<i class="fas fa-sign-out-alt"></i>
						<a href="<?php echo file_exists('user/delog.php') ? "user/delog.php" : "../user/delog.php"; ?>">Déconnection</a>
					</div>
					<div>
						<i class="fas fa-shopping-cart"></i>
						<a href="<?php echo file_exists('cart/main-cart.php') ? "cart/main-cart.php" : "../cart/main-cart.php"; ?>">Mon Panier</a>
					</div>
				</div>
					<?php
				}
				else {
					?>
				<div class="con-head">
					<div>
						<p>Bonjour, Bienvenue.</p>
					</div>
					
					<div>
						<i class="fas fa-sign-in-alt"></i>
						<a href="<?php echo file_exists('user/login.php') ? "user/login.php" : "../user/login.php"; ?>">Connexion</a>
					</div>
					<div>
						<i class="fas fa-user-plus"></i>
						<a href="<?php echo file_exists('user/create.php') ? "user/create.php" : "../user/create.php"; ?>">Créer un compte</a>
					</div>
					<div>
						<i class="fas fa-shopping-cart"></i>
						<a href="<?php echo file_exists('cart/main-cart.php') ? "cart/main-cart.php" : "../cart/main-cart.php"; ?>">Mon Panier</a>
					</div>
				</div>
					<?php
				}
			?>
			</nav>
				<br/><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>"><h1>TheGoodWine</h1></a><br/>
			<div class="bar">
				<nav id="nav_bar">
					<ul>
						<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>">Tous nos produits</a></li>
						<li><a href="index.php?c=tr&p=all&r=all">Couleur</a>
							<ul>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=wh&p=all&r=all">Blanc</a></li>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=pk&p=all&r=all">Rosé</a></li>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=rd&p=all&r=all">Rouge</a></li>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=all&p=y&r=all">Pétillant</a></li>
							</ul>
						</li>
						<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=all&p=all&r=tr">Région</a>
							<ul>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=all&p=all&r=cr">Corse</a></li>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=all&p=all&r=la">Languedoc-Roussillon</a></li>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=all&p=all&r=lo">Loire</a></li>
								<li><a href="<?php echo file_exists('index.php') ? "index.php" : "../index.php"; ?>?c=all&p=all&r=rh">Rhône</a></li>
							</ul>
							 <?php 
								$i = 0;
								$link = mysqli_connect('localhost', 'root', 'password', 'thegoodwine');
								if($link === false)
									die("ERROR: Could not connect. " . mysqli_connect_error());
								$query = mysqli_query($link, "SELECT * FROM `user_data` ORDER BY `users` desc");
								while (($array = mysqli_fetch_assoc($query)) !== NULL) 
									if($array['users'] === $_SESSION['log_in'])
										if($array['god_mode'] == 1)
											$i = 1;
								if ($i === 1)
								{ 
									?>
								<li><a href="<?php echo file_exists('admin/index_admin.php') ? "admin/index_admin.php" : "../admin/index_admin.php"; ?>">Espace Admin</a>
								<?php } ?>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>