<?php
session_start();
include('dbConnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <script src="dist/sweetalert2.min.js"></script>
  </head>
  <body>
      <div class="container" style="margin-top:100px;">
          <div class="row">
              <div class="col-md-5 mx-auto" style="-webkit-box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.71);
-moz-box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.71);
box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.71);">

              <form action="" method="post">
                  <br>
                  <h1 class="text-center" style="font-weight:900">ADMIN LOGIN</h1>
                  <br>
                  <input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" required>
                  <br>

                  <input type="password" name="password" placeholder="Enter Password" class="form-control" id="pass" value="<?php if(isset($_COOKIE['password'])) { $decode = base64_decode($_COOKIE['password']); echo $decode; } ?>" required>
                  <br>

                  <input type="checkbox" onclick="ShowPassword()">
                  <label>Show Password</label>
                  <br>

                  <input type="checkbox" name="RememberMe" <?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>>
                  <label>Remember Me</label>
                  <br>

                  <input type="submit" value="Login" name="LoginBtn" class="btn btn-info btn-block">
                  <br>

              </form>

              </div>
          </div>
      </div>

      <?php
      if(isset($_POST['LoginBtn']))
      {
          $email = $_POST['email'];
          $password = $_POST['password'];

          $query = "select * from ADMINS where EMAIL='$email' and PASSWORD='$password'";
          $result = mysqli_query($con,$query);
          $totalRows = mysqli_num_rows($result);
          $data = mysqli_fetch_assoc($result);

          if($totalRows==1)
          {
              $_SESSION['AdminName'] = $data['NAME'];
              echo "
              <script>
              swal.fire({
                  title: 'Login Successful!',
                  text: 'Welcome ".$_SESSION['AdminName']."',
                  icon: 'success',
                  confirmButtonColor: 'blue',
                  timer: 3000
              }).then(function(){
                  window.location.href='Retrieval.php';
              })
              </script>";
              if(isset($_POST['RememberMe']))
              {
                  setcookie('email',$email,time()+24*24*24*24);
                  setcookie('password',base64_encode($password),time()+24*24*24*24);
              }
              else
              {
                  setcookie('email','',time()-24*24*24*24);
                  setcookie('password','',time()-24*24*24*24);
              }
          }
          else
          {
            echo "
            <script>
            swal.fire({
                title: 'Login Failed!',
                text: 'Email or Password is incorrect',
                icon: 'error',
                confirmButtonColor: 'blue',
                timer: 3000
            })
            </script>
            ";
          }
      }
      
      ?>

      <script>
          function ShowPassword()
          {
              var pass = document.getElementById("pass");
              if(pass.type == "text")
              {
                  pass.type="password";
              }
              else
              {
                  pass.type="text";
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