<?php

      // Including database connection.   
      include('dbConnection.php');


      // Starting session.   
      session_start();


      // Destroying Session.
      session_destroy();
      
      
      // Redirecting to Login page.
      header('location:Login.php');
   
?>