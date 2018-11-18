<?php

require 'functions.php';


$pdo = initializePDOObject("mysql", "localhost", "tobacco_review", "root", "");


if(!isset($_SESSION)) { session_start(); }

