<?php
    require('asset/action/indexContoler.php');
?>

<!-- Corp Html -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Url Lite</title>
		<link rel="stylesheet" type="text/css" href="asset/style.css">
		<link rel="icon" type="image/png" href="asset/img/favico.png">
	</head>

	<body>
		<!-- PRESENTATION -->
		<section id="hello">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<!-- HEADER -->
				<header>
					<img src="asset/img/logo.png" alt="logo" id="logo">
				</header>

				<!-- VP -->
				<h1>Une url longue ? Raccourcissez-là ?</h1>
				<h2>Largement meilleur et plus court que les autres.</h2>

				<!-- FORM -->
				<form method="post" action="../">
					<input type="url" name="url" placeholder="Collez un lien à raccourcir">
					<input type="submit" value="Raccourcir">
				</form>

				<?php if(isset($_GET['error']) && isset($_GET['message'])) { ?>
					<div class="center">
						<div id="result">
							<b><?php echo htmlspecialchars($_GET['message']); ?></b>
						</div>
					</div>
				<?php } else if(isset($_GET['short'])) { ?>
					<div class="center">
						<div id="result">
							<b>URL RACCOURCIE : </b>
							http://localhost/?q=<?php echo htmlspecialchars($_GET['short']); ?>
						</div>
					</div>
				<?php } ?>

			</div>

		</section>

		<!-- BRANDS -->
		<section id="brands">
			
			<!-- CONTAINER -->
			<div class="container">
				<h3>Ces marques nous font confiance</h3>
				<img src="asset/img/1.png" alt="1" class="picture">
				<img src="asset/img/2.png" alt="2" class="picture">
				<img src="asset/img/3.png" alt="3" class="picture">
				<img src="asset/img/4.png" alt="4" class="picture">
			</div>

		</section>

		<!-- FOOTER -->
		<footer>
			<img src="asset/img/logo2.png" alt="logo" id="logo"><br>
			2018 © Bitly<br>
			<a href="https://devpeyroteric.fr/#section5">Contact</a> - <a href="https://devpeyroteric.fr">À propos</a>
		</footer>
	</body>
</html>