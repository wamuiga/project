<?php
DEFINE ('DB_USER','vicente');
DEFINE('DB_PASSWORD','vincent96');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','Wamuiga_db');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$dbc)
{
	echo "Could not connect to database!".mysqli_connect_error();
}

