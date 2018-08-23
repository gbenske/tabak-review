		<footer>
			<?php
				if(isset($_SESSION["userid"]))
				{
					$Kennung = $_SESSION["userid"];
					?>
					    <footer>
						<p>Du bist angemeldet.<br>
						<span><a href='logout1.php'>Abmelden</a></span></p>
						</footer> 
					<?php
				}
				else
				{
					?>
					<footer>
						<p>Du bist nicht <a href='login.php'>angemeldet</a></p>
					</footer>
					<?php
				}
			?>
        </footer>
    </body>
</html>