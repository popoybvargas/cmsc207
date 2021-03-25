<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'cmsc207');
define('DB_USER', 'cmsc207');
define('DB_PASS', 'r3d-foLds');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$db)
{
	die('Failed to connect to database!');
}

// $conn = new mysqli('localhost', 'cmsc207', 'r3d-foLds', 'cmsc207');

?>