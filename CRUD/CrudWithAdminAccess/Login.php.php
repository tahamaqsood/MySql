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
  <div class="container" style="margin-top:20px;">
      <div class="row">
          <div class="col-md-4">
              <form action="Login.php" method="post">

                  <label>Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                  <br>

                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password" id="show" required>
                  <br>

                  <input type="checkbox" onclick="ShowPassword()">
                  <label>Show Password</label>
                  <br>

                  <input type="submit" value="Login" class="btn btn-info btn-block" name="btnLogin">

              </form>  
          </div>
      </div>
  </div>

<?php

if(isset($_POST['btnLogin']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from ADMIN where USERNAME='$username' AND PASSWORD='$password'";
    $result = mysqli_query($con,$query);
    $totalRows = mysqli_num_rows($result);
    if($totalRows==1)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "<script>alert('Welcome ".$_SESSION['username']."');window.location.href='Retrieval.php';</script>";
        
    }
    else
    {
        echo "<script>alert('Username or Password is incorrect')</script>";
    }
}

if(isset($_SESSION['username']))
{
    header('location:Retrieval.php');
}

?>


<script>
    function ShowPassword()
    {
        var pass = document.getElementById("show");
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>