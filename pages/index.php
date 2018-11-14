<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/bootstrap.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/head.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/header.php";

?>

<?php
	// $selectImage = $pdo->prepare("SELECT * FROM images");
	// $selectImage->setFetchMode(PDO::FETCH_ASSOC);
	// $selectImage->execute();
?>

 <?php 
	// $sql = "SELECT s.Name, g.Geschmacksrichtung AS g1, g2.Geschmacksrichtung AS g2, g3.Geschmacksrichtung AS g3
	//  		FROM sorte s 
	//  		LEFT JOIN geschmack g ON s.ID_Geschmack = g.ID_Geschmack 
	//  		LEFT JOIN geschmack g2 ON s.ID_Geschmack_2 = g2.ID_Geschmack
	//  		LEFT JOIN geschmack g3 ON s.ID_Geschmack_3 = g3.ID_Geschmack";

 	/*$sql = "SELECT s.Name as Tabaksorte, h.Name as Hersteller
	 		FROM sorte s
			LEFT JOIN hersteller h ON s.ID_Hersteller = h.ID_Hersteller"; */

	//$sql = "SELECT *
	//		FROM sorte s
	//		LEFT JOIN geschmack_zu_sorte gs ON s.ID_Sorte = gs.ID_Sorte 
	//		WHERE gs.ID_Sorte = 1";

	$sql = "SELECT t.name AS tobacco, f.name AS flavor, m.name  AS manufacturer, r.count AS `count`, r.note AS note
			FROM tobacco t
			INNER JOIN tobacco_to_flavor tf ON tf.id_tobacco = t.id
			INNER JOIN flavor f ON f.id = tf.id_flavor
			INNER JOIN manufacturer m ON m.id = t.id_manufacturer
			INNER JOIN rating r ON r.id_tobacco = t.id";

	$statement = $pdo->query($sql);
	$tobaccos = $statement ->fetchALL();
?>

	<div class="wrapper">
		<h1>Tabak Review GB</h1>

		<div class="grid-wrapper">

		<?php /* foreach ($selectImage as $image) { ?>
			<div class="col">
				<img src="../img/<?php echo $image['images']; ?>">
			</div>
		<?php } */?>


		<?php foreach ($tobaccos as $tobacco) { ?>
			<div class="col">
				<h2><?php echo $tobacco['manufacturer'] ?></h2>
				<div class="tobacco"><?php echo $tobacco['tobacco'] ?></div>
				<div class="flavor"><?php echo $tobacco['flavor'] ?></div>
				<div class="rating"><?php echo $tobacco['count'] ?></div>
			</div>
		<?php } ?>

		</div>
	</div>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/footer.php";
?>