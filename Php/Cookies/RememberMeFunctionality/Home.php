<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      

  <?php

      // Including database connection.   
      include('dbConnection.php');


      // Starting session.   
      session_start();


      // Restrict user to enter in home page without logging in.
      if($_SESSION['username']==null)
      {
        // Redirecting to Login page.
          header('location:Login.php');
      }
      else
      {
        echo "<script>alert('Weclome ".$_SESSION['username'].".!!')</script>";
      }   
   
  ?>


   <!-- Home Page Heading -->
   <h1> Welcome To Home Page</h1>
   <br>


   <!-- Logout Button -->
   <a href="Logout.php" class="btn btn-danger">Logout</a>

  </body>
</html>