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
							<li><a href="index.php">Start</a></li>
							<li><a href='addTabak.php'>Tabak einfügen</a></li>
							<li><a href='logout.php'>Abmelden</a></li>
						</ul>
					</nav>
						
					<?php
				} else {
					?>
						<nav>
							<ul>
								<li><a href="index.php">Start</a></li>
								<li><a href='login.php'>Anmelden</a></li>
							</ul>
						</nav>
					<?php
				}
			?>
		</div>
		<div class="progress-container">
			<div class="progress-bar" id="progress-bar"></div>
		</div>  
	</header>
