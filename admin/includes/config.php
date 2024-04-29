<?php

const DB_HOST = 'localhost:8889';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'cms_photogallery_oop';

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//if ($connection) {echo "DB Connection true";}