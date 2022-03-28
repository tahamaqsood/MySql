<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <!-- Jquery CDN -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

      <!-- Sweet Alert2 Css file -->
      <link rel="stylesheet" href="dist/sweetalert2.min.css">

      <!-- Sweet Alert2 Js file -->
      <script src="dist/sweetalert2.all.min.js"></script>


  </head>
  <body>
      <?php

       // including database connection    
      include('dbConnection.php');

      //starting session
      session_start();

      ?>

       <!-- Using Bootstrap Grid System -->
      <div class="container" style="margin-top:30px;">
          <div class="row">
              <div class="col-md-6 offset-3" style="-webkit-box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);
box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);">

              <!-- Login Form -->
              <form action="" method="post">
                  <br>

              <!-- Email -->
              <label>Email</label>
              <input type="text" name="email" placeholder="Enter Email" class="form-control" required value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; }?>">
              <br>


              <!-- Password -->
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter Password" class="form-control" required id="pass" value="<?php if(isset($_COOKIE['password'])) { echo base64_decode($_COOKIE['password']); } ?>">
              <br>


              <!-- Show Password -->
              <input type="checkbox" onclick="ShowPassword()">
              <label>Show Password</label>
              <br>


              <!-- Remember Me -->
              <input type="checkbox" name="RememberMe" <?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>>
              <label>Remember Me</label>


              <!-- Login Button -->
              <input type="submit" value="Login" name="LoginBtn" class="btn btn-info btn-block">
              <br>

              </form>


              </div>
          </div>
      </div>


      <?php
      if(isset($_POST['LoginBtn']))
      {
        //   Recieving field values in php variables
          $email = $_POST['email'];
          $password = $_POST['password'];

        //   If user checks on Remember me
          if(isset($_POST['RememberMe']))
          {
              setcookie('email',$email,time()+60*60*60);
              setcookie('password',base64_encode($password),time()+60*60*60);
          }
          else
          {
            setcookie('email','',time()-60*60*60);
            setcookie('password','',time()-60*60*60);
          }

        //   Query
          $query = "select * from USERS where EMAIL='$email' and PASSWORD='$password'";

        //   Fetch Data
          $result = mysqli_query($con,$query);

        //   Converting Fetch data into Associative array
          $data = mysqli_fetch_assoc($result);

        //   Converting data into row
          $totalRows = mysqli_num_rows($result);

          if($totalRows==1)
          {
            // Storing User First Name and ID in Session object
            $_SESSION['UserFirstName'] = $data['FNAME'];
            $_SESSION['UserID'] = $data['ID'];

            echo "<script>
        swal.fire({
            title: 'Login Successful!',
            text: 'Welcome ".$_SESSION['UserFirstName']."',
            icon: 'success',
            confirmButtonColor: 'blue',
            timer: 1000
        }).then(function(){
            window.location.href='Home.php';
        });
        </script>";

          }
          else
          {
            echo "<script>
            swal.fire({
                title: 'Error',
                icon: 'error',
                text: 'Email or Password is invalid',
                confirmButtonColor: 'blue'
            });
            </script>";
          }
      }

      
      ?>

      <script>

        //   For Show Password
          function ShowPassword()
          {
              var pass = document.getElementById("pass");
              if(pass.type == "password")
              {
                  pass.type="text";
              }
              else
              {
                  pass.type="password";
              }
          }
      </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>