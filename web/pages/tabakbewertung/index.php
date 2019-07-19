<?php 
	$json = file_get_contents(__DIR__ . "/../../../rev-manifest.json");
    $assets = json_decode($json, true);
?>

<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/web/assets/php/bootstrap.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/head.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/header.php";
?>

<?php
	// $selectImage = $pdo->prepare("SELECT * FROM images");
	// $selectImage->setFetchMode(PDO::FETCH_ASSOC);
	// $selectImage->execute();
?>

<?php /* foreach ($selectImage as $image) { ?>
						<div class="col">
							<img src="../img/<?php echo $image['images']; ?>">
						</div>
					<?php } */?>

 <?php 
	$sql = "SELECT t.name AS tobacco, t.id AS tobaccoId, m.name AS manufacturer, r.count AS `count`, r.note AS note
			FROM tobacco t
			INNER JOIN tobacco_to_flavor tf ON tf.id_tobacco = t.id
			INNER JOIN manufacturer m ON m.id = t.id_manufacturer
			INNER JOIN rating r ON r.id_tobacco = t.id
			GROUP BY t.id";

	$statement = $pdo->query($sql);
	$tobaccos = $statement ->fetchALL();
?>
	<main> 
		<section id="first">
			<div class="wrapper">
				<h1>Tabakbewertungen</h1>

				<p>
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
				</p>

				<div class="search-form">
					<input type="text" autocomplete="off" placeholder="Suchen" />
					<figure>
						<svg>
							<title>Suche</title>
							<use xlink:href="#search" />
						</svg>
					</figure>
				</div>

				<div class="sort-form">
					<fieldset class="sort-group">
						<legend class="sort-label">Sortieren nach:</legend>
						<div class="sort-options">
							<label class="active">
								<input type="radio" name="sort-value" value="dom" checked /> Normal
							</label>
							<label>
								<input type="radio" name="sort-value" value="name" /> Name
							</label>
							<label>
								<input type="radio" name="sort-value" value="rating" /> Bewertung
							</label>
						</div>
					</fieldset>
				</div>

				<div class="results"></div>

				<section id="all-products" class="container">
					<div id="grid" class="col-60">
						<div id="row" class="row flex">
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
								
								<div class="col col-15" data-name="<?php echo $tobacco['manufacturer'] ?>" data-rating="<?php echo $tobacco['count'] ?>">
									<div class="products">
										<div class="img-holder">
											<img src="/web/assets/img/content/start/holster-tobacco.png" alt="" />
										</div>
										
										<div class="listEntry">
											<div class="products-flipper">
												<div class="side front">
													<div class="headline">
														<h2><?php echo $tobacco['manufacturer'] ?></h2>
													</div>
													<div class="tobacco"><?php echo $tobacco['tobacco'] ?></div>
													<div class="flavor"><?php echo implode(', ', $result) ?></div>
													<div class="btn-wrapper">
														<div class="btn rating">
															<span>Bewertung</span>
														</div>
														<div class="btn note">
															<span>Bemerkung</span>
														</div>
													</div>
												</div>

												<div class="side back-rating">
													<h2>Bewertung</h2>
													<div class="rating"><?php echo $tobacco['count'] ?></div>
												</div>

												<div class="side back-note">
													<div class="content">
														<h2>Notiz</h2>
														<p class="note"><?php echo $tobacco['note'] ?></p>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
		</section>
	</main>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/footer.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/pages/svg.php";
?>