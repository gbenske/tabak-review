<?php

require 'functions.php';


$pdo = initializePDOObject("mysql", "localhost", "germanbenske_ws", "root", "");


if(!isset($_SESSION)) { session_start(); }

