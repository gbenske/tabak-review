<body>
	<div class="wrapper">
		<header>
			<?php
				if(isset($_SESSION["userid"]))
				{
					$identification = $_SESSION["userid"];
					?>
						<ul>
							<li><a href='logout.php'>Abmelden</a></li>
							<li><a href='addTabak.php'>Tabak einfügen</a></li>
						</ul>

					<?php
				}
				else
				{
					?>
						<a href='login.php'>Anmelden</a>
					<?php
				}
			?>
		</header>
	</div>
