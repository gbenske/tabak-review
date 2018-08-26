<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/tabak-review/assets/php/bootstrap.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/head.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/header.php";

?>

<?php
	$selectImage = $pdo->prepare("SELECT * FROM images");
	$selectImage->setFetchMode(PDO::FETCH_ASSOC);
	$selectImage->execute();
?>

 <?php 
	// $sql = "SELECT s.Name, g.Geschmacksrichtung AS g1, g2.Geschmacksrichtung AS g2, g3.Geschmacksrichtung AS g3
	//  		FROM sorte s 
	//  		LEFT JOIN geschmack g ON s.ID_Geschmack = g.ID_Geschmack 
	//  		LEFT JOIN geschmack g2 ON s.ID_Geschmack_2 = g2.ID_Geschmack
	//  		LEFT JOIN geschmack g3 ON s.ID_Geschmack_3 = g3.ID_Geschmack";

 	$sql = "SELECT s.Name as Tabaksorte, h.Name as Hersteller, g1.Geschmacksrichtung AS g1, g2.Geschmacksrichtung AS g2, g3.Geschmacksrichtung AS g3, s.Bewertung
			FROM sorte s
			LEFT JOIN hersteller h ON s.ID_Hersteller = h.ID_Hersteller
			LEFT JOIN geschmack g1 ON s.ID_Geschmack = g1.ID_Geschmack
			LEFT JOIN geschmack g2 ON s.ID_Geschmack_2 = g2.ID_Geschmack
			LEFT JOIN geschmack g3 ON s.ID_Geschmack_3 = g3.ID_Geschmack";

	$statement = $pdo->query($sql);
	$tabaksorten = $statement ->fetchALL();
?>

	<div class="wrapper">
		<h1>Tabak Review GB</h1>

		<div class="flex-grid">

		<?php /* foreach ($selectImage as $image) { ?>
			<div class="col">
				<img src="../img/<?php echo $image['images']; ?>">
			</div>
		<?php } */?>


		<?php foreach ($tabaksorten as $sorte) { ?>
			<div class="col">
				<h2><?php echo $sorte['Hersteller'] ?></h2>
				<div class="sort"><?php echo $sorte['Tabaksorte'] ?></div>
				<div class="taste"><?php echo $sorte['g1'] ?></div>
				<div class="taste"><?php echo $sorte['g2'] ?></div>
				<div class="taste"><?php echo $sorte['g3'] ?></div>
				<div class="rating"><?php echo $sorte['Bewertung'] ?></div>
			</div>
		<?php } ?>

		</div>
	</div>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/footer.php";
?>