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
	$sql = "SELECT t.name AS tobacco, t.id AS tobaccoId, m.name  AS manufacturer, r.count AS `count`, r.note AS note
			FROM tobacco t
			INNER JOIN tobacco_to_flavor tf ON tf.id_tobacco = t.id
			INNER JOIN manufacturer m ON m.id = t.id_manufacturer
			INNER JOIN rating r ON r.id_tobacco = t.id
			GROUP BY t.id";

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


		<?php foreach ($tobaccos as $tobacco) { 

			$sql = "SELECT f.name AS flavor
					FROM tobacco_to_flavor tf
					INNER JOIN flavor f ON f.id = tf.id_flavor
					WHERE tf.id_tobacco = ".$tobacco['tobaccoId'];

			$statement = $pdo->query($sql);
			$flavors = $statement->fetchALL(PDO::FETCH_ASSOC);

			$result = array_map(function($value) {
				return $value['flavor'];
			}, $flavors);

			?>
			<div class="col">
				<h2><?php echo $tobacco['manufacturer'] ?></h2>
				<div class="tobacco"><?php echo $tobacco['tobacco'] ?></div>
				<div class="flavor"><?php echo implode(', ', $result) ?></div>
				<div class="rating"><?php echo $tobacco['count'] ?></div>
			</div>
		<?php } ?>

		</div>
	</div>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/inc/footer.php";
?>