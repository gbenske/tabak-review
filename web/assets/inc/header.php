<body>
	<header>
		<div class="wrapper">
			<div class="hamburger">
				<div class="icon"></div>
			</div>
			<?php
				if(isset($_SESSION["userid"])) {
					$identification = $_SESSION["userid"];
					?>
					<nav>
						<ul>
							<li><a href="/web/pages/index.php">Start</a></li>
							<li><a href="/web/pages/tabakbewertung/index.php">Tabakbewertung</a></li>
							<li><a href="/web/pages/kopfbau/index.php">Kopfbau</a></li>
							<li><a href="/web/pages/beste-wasserpfeifen/index.php">Beste Wasserpfeifen</a></li>
							<li><a href='/web/pages/tabak-einfuegen/index.php'>Tabak einfügen</a></li>
							<li><a href='/web/pages/anmelden/logout.php'>Abmelden</a></li>
						</ul>
					</nav>
						
					<?php
				} else {
					?>
						<nav>
							<ul>
								<li><a href="/web/pages/index.php">Start</a></li>
								<li><a href="/web/pages/tabakbewertung/index.php">Tabakbewertung</a></li>
								<li><a href="/web/pages/kopfbau/index.php">Kopfbau</a></li>
								<li><a href="/web/pages/beste-wasserpfeifen/index.php">Beste Wasserpfeifen</a></li>
								<li><a href='/web/pages/anmelden/login.php'>Anmelden</a></li>
							</ul>
						</nav>
					<?php
				}
			?>
		</div>
	</header>
