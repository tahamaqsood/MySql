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
      
    <!-- Bootstrap Grid System -->
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-4">

            <!-- Login Form -->
                <form action="">

                <!-- Username -->
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter Username" class="form-control">
                <br>

                <!-- Password -->
                <label>Password</label>
                <input type="text" name="password" placeholder="Enter Password" class="form-control">
                <br>

                <!-- Login Button -->
                <input type="submit" value="Login" name="btnLogin" class="btn btn-success btn-block">
                </form>

            </div>
        </div>
    </div>

<?php

//Starting session
session_start();

//Condition for login button
if(isset($_REQUEST['btnLogin']))
{
    //Condition username and password
    if($_REQUEST['username'] == "Usman" && $_REQUEST['password'] == "GrayHat")
    {
       //Recieving username in session object 
       $_SESSION['uname'] = $_REQUEST['username'];

       //Current time of Session's creation    
       $_SESSION['CreationTime'] = time();

       //For Redirecting to Home page
       header('location:Home.php');    
    }
    else
    {
        echo "Username or password is incorrect";
    }
}

?>

  </body>
</html>