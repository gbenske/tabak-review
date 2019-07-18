<?php 
	$json = file_get_contents(__DIR__ . "/../../rev-manifest.json");
    $assets = json_decode($json, true);
?>

<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/web/assets/php/bootstrap.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/head.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/header.php";
?>
	<main> 
		<div class="hero video">
			<video autoplay loop muted>
				<source src="/web/assets/video/hero-video-start.mp4" type="video/mp4"> 
			</video>
			<div class="wrapper">
				<div class="entrance">
					<h1 class="center">Willkommen beim <br/> Shisha Guide</h1>
				</div>
			</div>
		</div>
		<div class="wrapper">
			
			<section>
				<div class="col-60">
					<div class="row">
						<div class="col col-40">
							<h2>Lorem Ipsum</h2>

							<p>
								Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
							</p>
						</div>

						<div class="col col-20">
							<img src="" alt="">
						</div>
					</div>
				</div>
			</section>

		</div>
	</main>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/footer.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/pages/svg.php";
?>