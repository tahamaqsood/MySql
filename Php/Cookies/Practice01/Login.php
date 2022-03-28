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


               <form action="" method="post">
                   <label>Email</label>
                   <input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>">
                   <br>

                   <label>Password</label>
                   <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['decode'];}?>">

                   <input type="checkbox" name="RememberMe" <?php if(isset($_COOKIE['email'])){ ?> checked <?php }?>>
                   <label>Remember Me</label>

                   <input type="submit" value="Login" name="btnLogin" class="btn btn-info btn-block">
               </form>
           </div>
       </div>
   </div>


   <?php
   if(isset($_POST['btnLogin']))
   {
       $email = $_POST['email'];
       $password = $_POST['password'];

       $query = "select * from USERS where EMAIL='$email' and PASSWORD='$password' ";
       $result = mysqli_query($con,$query);

       $data = mysqli_fetch_assoc($result);

       $totalRows = mysqli_num_rows($result);

       if($totalRows==1)
       {
           $_SESSION['username'] = $data['USERNAME'];
           header('location:Home.php');

           if(isset($_POST['RememberMe']))
           {
               $encrypt = base64_encode($password);
               $decrypt = base64_decode($encrypt);


               setcookie('email',$email,time()+60*60*24*300);
               setcookie('password',$encrypt,time()+60*60*24*300);

               setcookie('decode',$decrypt,time()+60*60*24*300);
           }
           else
           {
               setcookie('email','',time()-6000*4000);
               setcookie('password','',time()-6000*4000);
           }
       }
       else
       {
           echo "<script>alert('Email or Password is incorrect.!')</script>";
       }

   }

   if(isset($_SESSION['username']))
   {
       header('location:Home.php');
   }
   
   
   ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>