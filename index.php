<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Sneaker Shop</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/arrow.css" />
<link
	href="https://fonts.googleapis.com/css?family=Oswald|Quattrocento&display=swap"
	rel="stylesheet">
</head>
<body>
	<header>
		<h1>GALERÍA DE PRODUCTO</h1>
		<hr>
	</header>
	<section id="main">
		<ul class="gallery">
			<?php
include_once 'includes/db.php';
$con = openCon('config/db_products.ini');
$con->set_charset("utf8mb4");
$sql = "select s.model as model, s.price as precio, s.image as image, s.observation, c.description as color, b.description as brand, date_format(s.initial_date,'%d-%m-%Y') as date from sneakers s inner join brands b on s.id_brands=b.id_brand inner join colors c on s.id_colors=c.id_colors order by s.initial_date desc";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    ?>
<li>
				<div class="box">
					<figure>
						<img src="<?php echo substr($row ['image'],3)?>">
						<figcaption>
							<h3><?php echo($row['brand'].' '.$row['model'])?></h3>
							<h4><?php echo 'Color: '.$row['color']?></h4>
							<p><?php echo('$ '.$row['precio'])?></p>
							<time><?php echo $row['date'] ?></time>
						</figcaption>
					</figure>
				</div>
			</li>
<?php
}
?>

</ul>
		<!-- <ul class="gallery">
			<li>
				<div class="box">
					<figure>
						<img src="img/Adidas_10K.jpg" alt="Adidas_10K.jpg">
						<figcaption>
							<h3>Adidas 10K</h3>
							<p>$3199</p>
							<time>16/07/2022</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/Converse_CTA_Street_High.jpg"
							alt="Converse_CTA_Street_High.jpg">
						<figcaption>
							<h3>Converse CTA Street</h3>
							<p>$2199</p>
							<time>16/07/2022</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/Converse_Zakim.jpg" alt="Converse_Zakim.jpg">
						<figcaption>
							<h3>Converse Zakim</h3>
							<p>$2499</p>
							<time>16/07/2022</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/Fila_Revolution.jpg" alt="Fila_Revolution.jpg">
						<figcaption>
							<h3>Fila Revolution</h3>
							<p>$3199</p>
							<time>16/07/1994</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/Lacoste_Strideur_116.jpg"
							alt="Lacoste_Strideur_116.jpg">
						<figcaption>
							<h3>Lacoste Strideur 116</h3>
							<p>$2999</p>
							<time>16/07/2019</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/New_Balance_MS574CD.jpg"
							alt="New_Balance_MS574CD.jpg">
						<figcaption>
							<h3>New Balance MS574CD</h3>
							<p>$4000</p>
							<time>06/06/2016</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/Nike_Air_Max_Advantage.jpg"
							alt="Nike_Air_Max_Advantage.jpg">
						<figcaption>
							<h3>Nike Air Max Advantage</h3>
							<p>$3800</p>
							<time>02/07/2019</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/Nike_Downshifter_7.jpg" alt="Nike_Downshifter_7.jpg">
						<figcaption>
							<h3>Nike Downshifter 7</h3>
							<p>$4200</p>
							<time>16/05/2019</time>
						</figcaption>
					</figure>
				</div>
			</li>
			<li>
				<div class="box">
					<figure>
						<img src="img/Nike_Md_Runner_2.jpg" alt="Nike_Md_Runner_2.jpg">
						<figcaption>
							<h3>Nike Md Runner 2</h3>
							<p>$2400</p>
							<time>16/01/2019</time>
						</figcaption>
					</figure>
				</div>
			</li>
		</ul> -->
	</section>
	<footer>
		<hr>
		<h3 id="footer-text">Copyright 2019 - Gera Design</h3>
	</footer>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<div class="arrow">
		<a href="#" id="toTop"> <img src="img/backToTop.png"
			alt="img/Adidas_10K.jpg" /> <img class="top" src="img/backToTop.png"
			alt="img/Adidas_10K.jpg" />
		</a>
	</div>
	<script src="js/arrow.js"></script>
</body>
</html>