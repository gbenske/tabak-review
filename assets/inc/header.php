<body>
	<header>
		<?php if(isset($_SESSION["userid"])) { ?>
		<nav>
				<ul>
					<li><a href="login.php">Abmelden</a></li>
				</ul>
		</nav>
		<?php }	else { ?>
			<nav>
				<ul>
					<li><a href="login.php">Anmelden</a></li>
				</ul>
			</nav>
		<?php }	?>
	</header>
