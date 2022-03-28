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

//For starting session
session_start();

if($_SESSION['uname']!=null)
{
    /*
     Now, for session time expiration, we will subtract Session's creation time with current time
     Current time - Creation Time Of Session
     2:02  - 2:00 = 2 minutes(120 seconds) which is greater than 60 seconds
    */
    if((time() - $_SESSION['CreationTime']) > 60)
    {
       header('location:Logout.php');
    }
    else
    {
        echo "Welcome ".$_SESSION['uname'];
    }
}
else
{
    header('location:Login.php');
}

?>
<br>

<!-- Logout Button For Destroying Session -->
<a href="Logout.php" class="btn btn-danger">Logout</a>
    
  </body>
</html>