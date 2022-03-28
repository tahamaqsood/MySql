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

    include('dbConnection.php');
    session_start();

    ?>

    <div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-4">
            <form action="" method="post" name="f">

                <label>Username</label>
                <input type="text" name="username" placeholder="Enter Username" class="form-control" required value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>">
                <br>

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control" required value="<?php if(isset($_COOKIE['password'])) { $decrypt = base64_decode($_COOKIE['password']); echo $decrypt; } ?>">
                <br>

                <input type="checkbox" onclick="ShowPassword()">
                <label>Show Password</label>
                <br>

                <input type="checkbox" name="RememberMe" <?php if(isset($_COOKIE['username'])){ ?> checked <?php } ?>>
                <label>Remember Me</label>

                <input type="submit" value="Login" name="btnLogin" class="btn btn-info btn-block">

                <a href="Signup.php" class="btn btn-success btn-block">Register Yourself</a>


            </form>
        </div>
    </div>
    </div>

    <?php
    
     if(isset($_POST['btnLogin']))
     {
         $username = $_POST['username'];
         $password = $_POST['password'];

         $query = "select * from USERS where USERNAME='$username' and PASSWORD='$password'";
         $result = mysqli_query($con,$query);

         $data = mysqli_fetch_assoc($result);
         $totalRow = mysqli_num_rows($result);

         if($totalRow==1)
         {
             $_SESSION['Name'] = $data['FNAME'];
             header('location:Home.php');

             if(isset($_POST['RememberMe']))
             {
                 $encrypt = base64_encode($password);

                 setcookie('username',$username,time()+60*60*1000);
                 setcookie('password',$encrypt,time()+60*60*1000);
             }
             else
             {
                setcookie('username','',time()-60*60*1000);
                setcookie('password','',time()-60*60*1000);
             }
         }
         else
         {
             echo "<script>alert('Username or Password is invalid')</script>";
         }
     }

     if(isset($_SESSION['Name']))
     {
        header('location:Home.php');
     }

    ?>

    <script>
        function ShowPassword()
        {
            var pass = f.password;
            if(pass.type == "password")
            {
                pass.type = "text";
            }
            else
            {
                pass.type = "password";
            }
        }
    </script>

      


  </body>
</html>