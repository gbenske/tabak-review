<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/tabak-review/assets/php/bootstrap.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/head.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/header.php";

?>

 <?php 
	$sql = "SELECT * FROM tabak";
	$statement = $pdo->query($sql);
	$tabaksorten = $statement ->fetchALL();
?>

	<div class="wrapper">
		<h1>Tabak Review GB</h1>

		<div class="flex-grid">

		<?php foreach ($tabaksorten as $tabak) { ?>
			<div class="col">
				<h2><?php echo $tabak['Hersteller'] ?></h2>
				<div class="sort"><?php echo $tabak['Sorte'] ?></div>
				<div class="rating"><?php echo $tabak['Bewertung'] ?></div>
			</div>
		<?php } ?>

		</div>
	</div>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/footer.php";
?>