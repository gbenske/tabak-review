<?php

require 'functions.php';


$pdo = initializePDOObject("mysql", "localhost", "tabak_review", "root", "");


if(!isset($_SESSION)) { session_start(); }

