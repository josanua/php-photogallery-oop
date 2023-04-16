<?php

const DB_HOST = 'localhost:3306';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'gallery_db';

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//$connection = mysqli_connect() or die('Error : ' . mysql_error());

//$connection::mysql_error();

if ($connection) {echo "DB Connection true";}