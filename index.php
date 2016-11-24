<?php

//setcookie("username", "taguchi");

session_start();

//$_SESSION['username'] = "taguchi";


unset($_SESSION['username']);

echo $_SESSION['username'];
