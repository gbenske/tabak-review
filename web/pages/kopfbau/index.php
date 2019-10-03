<?php 
	$json = file_get_contents(__DIR__ . "/../../../rev-manifest.json");
    $assets = json_decode($json, true);
?>

<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/web/assets/php/bootstrap.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/head.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/web/assets/inc/header.php";
?>
	<main>
		<div class="wrapper">
			<section id="first">
				<h1 class="center">Der Kopfbau und deren Varianten</h1>

				<p>
					Es gibt eine Menge Varianten wie man den Kopf baut. Hier stelle ich vier verschiedene Kopfbauarten vor, die ich über die Jahre getestet habe und die ich als gut empfinde.
				</p>
			</section>

			<section>
				<div class="col-60">
					<div class="row flex">
						<div class="col col-24">
							<img src="/web/assets/img/content/start/kopfbau.png" alt="">
						</div>

						<div class="col col-36">
							<h2>Der Standard Kopfbau</h2>

							<p>
								Der Standard Kopfbau besteht aus einem Tonkopf und einen einfachen Kaminaufsatz. Statt dem Kamin kann man natürlich Alufolie verwenden. Jeder wie er mag. Beim Tonkopf ist es wichtig einen Tonkopf mit einer guten Lochung zu haben. Am Bild seht Ihr ein Beispiel. Den Kopf befüllt man nun mit Tabak. Dabei gibt es auch mehrere Varianten, wie man den Kopf nun befüllt. Manche befüllen den Tabak nur bis zum Rand, manche über den Rand (Overpacking).
							</p>

							<p>
								Ich empfehle euch den Tabak bis zum Rand zu befüllen. Ich habe nur schlechte Erfahrung mit dem Overpacking gemacht. Ganz wichtig ist hierbei <strong>nicht pressen und stopfen</strong>. Wenn man den Tabak zu sehr reindrückt, kann es zu einem schlechten Durchzug kommen, daher einfach fallen lassen und nur <strong>leicht andrücken</strong>. Als Kohle nehmt Ihr am besten Naturkohle und <strong>keine Selbstanzünderkohle</strong>. Für diesen Kopfbau sind drei Naturkohlen ausreichend.
							</p>

							<p>
								Eine weitere Variante wäre statt einem Tonkopf, einen Steinkopf zu verwenden. Die Lochung ist bei dem Kopf sehr gut, da die Löcher schräg liegen und groß sind. Des Weiteren wird er euch nicht so schnell kaputt gehen wenn er mal runterfallen sollte und der Steinkopf "blutet" nicht. Beim Tonkopf hat man das Problem, das er nach und nach die Molasse vom Tabak aufnimmt und irgendwann qillt er über und das nennt man "bluten". Den Tonkopf müsste man häufiger auskochen und für faule Menschen wie mich zum Beispiel ist der Steinkopf am geeignesten. Beim Steinkopf ist es aber zu Empfehlen, das man einen Sieb dazu kauft. Dadurch spart man viel Tabak.
							</p>
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="col-60">
					<div class="row flex reverse">
						<div class="col col-36">
							<h2>Der SWT Setup</h2>

							<p>
								Der SWT Setup wurde von den YouTubern ShishaWarenTester entwickelt. Dafür benötigt man einen Phunnelkopf (s.Bild) und einen Lotusaufsatz. Als Phunnelkopf empfielt sind der Saphire Squeeze No.9. Der Tabak wird wie in einer Donutform gegeben und auch hier nur leicht angepresst. Daa der Saphire Squeeze No.9 in der Mitte mehrere Löcher hat, muss man diese Löchter während des Kopfbaus frei machen, da sonst der Durchzug beieinflusst wird und der Tabak sonst auch in euere Shisha gezogen wird. Auch hier muss der Tabak nur bis zum Rand gefüllt sein. Nicht drüber. 
							</p>

							<p>
								Hier werden nur zwei Naturkohlen verwendet. Nachdem die Hälfte der Naturkohlen durchgeglüht ist, setzt man den Lotusaufsatz mit auf den Anzünder. Das erspart das Anrauchen. Wenn die Kohlen durch sind, steckt man den Lotusaufsatz auf dem Kopf und setzt dazu den Deckel obendrauf. Hierbei ist zu beachten, das die Öffnungen vorest offen bleiben. Später, wenn die Kohlen kleiner werden, kann man die Öffnungen schließen.
							</p>

							<p>
								Vorteil bei dem Kopfbau ist, das man zu einem eine Kohle spart, die Kohle nicht abäschen muss und im Sommer sogar einen Windschutz hat. Die Rauchzeit beträgt hier 1 - 1,5 Stunden, je nachdem was für Kohlen man benutzt, welchen Tabak man raucht und mit vielen Personen man an der Pfeife zieht.
							</p>

							<div class="btn">
								<a href="https://www.youtube.com/watch?v=rLAfBALSUIo" target="_blank">Zum SWT Setup</a>
							</div>
						</div>

						<div class="col col-24">
							<img src="/web/assets/img/content/start/wasserpfeife.png" alt="">
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="col-60">
					<div class="row flex">
						<div class="col col-24">
							<img src="/web/assets/img/content/start/kopfbau.png" alt="">
						</div>

						<div class="col col-36">
							<h2>Der Zomo Kopfbau</h2>

							<p>
								Der Zomo Kopfbau ist sehr stark in Brasilien verbreitet. Hierzu benötigt man auch einen Phunnelkopf. Hier spielt es keine wirkliche große Rolle, welchen Phunnelkopf man nun verwendet. Man befüllt den Kopf wie gehabt bis zum Rand und spannt nun Alufolie drüber. Entweder 4-lagige oder Panzeralufolie. Man macht nun eine Rundlochung und stellt auf der Alufolie nun einen Sieb vom Kaminkopf drauf. Anstelle von 3 Kohlen nimmt man nun 4 Kohlen. Dieser Kopfbau ist sehr gut geeignet für Zomo Tabak. Natürlich ist es für andere Tabakhersteller auch geeignet. 
							</p>
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