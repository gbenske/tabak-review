<body>
	<div class="wrapper">
		<header>
			<?php
				if(isset($_SESSION["userid"]))
				{
					$identification = $_SESSION["userid"];
					?>
						<a href='logout.php'>Abmelden</a>
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
