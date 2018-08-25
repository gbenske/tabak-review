<body>
	<header>
		<div class="wrapper">
			<?php
				if(isset($_SESSION["userid"])) {
					$identification = $_SESSION["userid"];
					?>
						<ul>
							<li><a href="index.php">Start</a></li>
							<li><a href='addTabak.php'>Tabak einfügen</a></li>
							<li><a href='logout.php'>Abmelden</a></li>
						</ul>
					<?php
				} else {
					?>
						<ul>
							<li><a href="index.php">Start</a></li>
							<li><a href='login.php'>Anmelden</a></li>
						</ul>
					<?php
				}
			?>
		</div>
	</header>
