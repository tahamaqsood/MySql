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
      
      ?>


    <!-- Using Bootstrap Grid System -->
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-md-4">

            <!-- Login Form -->
            <form action="" method="post">

            <!-- Email -->
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>">
            <br>


            <!-- Password -->
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['decrypted'];} ?>">

            <!-- Remember Me -->
            <input type="checkbox" name="RememberMe" <?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>>
            <label>Remember Me</label>


            <!-- Login Button -->
            <input type="submit" value="Login" class="btn btn-info btn-block" name="btnLogin">

            </form>

            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['btnLogin']))
    {
        // Recieving field values in php variables.
        $email = $_POST['email'];
        $password = $_POST['password'];


        // Storing MySql query in query variable.
        $query = "select * from USERS where EMAIL='$email' and PASSWORD='$password' ";


        // Executing MySql query through mysqli_query() function and storing fetch data in result variable.
        $result = mysqli_query($con,$query);


        // Converting fetched data into associative array.
        $data = mysqli_fetch_assoc($result);


        // Counting Total rows.
        $totalRows = mysqli_num_rows($result);


        // If total rows is 1 then it means the login is successful.
        if($totalRows==1)
        {
            if(isset($_POST['RememberMe']))
            {

                // For storing password in encrypted form. 
                $encrypt = base64_encode($password);


                // For retrieving original password after the logout.
                $decrypt = base64_decode($encrypt);


                // Cookie for storing email
                setcookie('email',$email,time()+60*60*24*7);


                // Cookie for storing password in encrypted form.
                setcookie('password',$encrypt,time()+60*60*24*7);


                // For decryption of password which is in encrypted form.
                setcookie('decrypted',$decrypt,time()+60*60*24*7);
            }
            else
            {
                setcookie('email','',time()-600000000);
                setcookie('password','',time()-600000000);
            }

            // Storing username is session object with the help of Associative array
            $_SESSION['username'] = $data['USERNAME'];


            // Redirecting to Home page after successfully login. 
            header('location:Home.php');
        }
        else
        {
            echo "<script>alert('Email or Password is incorrect.!!')</script>";
        }

    }

    // Restrict user to access login page without logging out (Users can't access login page without destroying their session)
    if(isset($_SESSION['username']))
    {
        // Redirecting to Home page
        header('location:Home.php');
    }
    
    
/*

===============
IMPORTANT NOTE:
===============
For 'Remember me' functionality, we used cookies to store email and password and then retrieve it in value attribute of html field
by calling Cookie object by it's key name.

 */
    ?>

  </body>
</html>