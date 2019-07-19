<?php
session_start();
session_destroy();
header("location: /../../web/pages/index.php");
exit();

