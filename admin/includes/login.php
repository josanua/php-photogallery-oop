<?php

require_once 'init.php';

if ($session->is_signed_in()) {
    redirect("admin.php");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Method to check database user

    if($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Username or password is incorrect";
    }
} else {
    $username = "";
    $password = "";
}