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

<h1>Tabak Review GB</h1>

<?php foreach ($tabaksorten as $tabak) { ?>
	<div>
		<?php echo $tabak['Hersteller'] ?>
		<?php echo $tabak['Sorte'] ?>
		<?php echo $tabak['Geschmack'] ?>
		<?php echo $tabak['Bewertung'] ?>
	</div>
<?php } ?>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'] . "/tabak-review/assets/inc/footer.php";
?>