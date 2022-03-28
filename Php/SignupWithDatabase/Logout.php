<?php

//  Including Database Connection
include('dbConnection.php');


// Starting Session
session_start();


// Destroying Session
session_destroy();


// Redirecting to login page
header('location:Login.php');

?>