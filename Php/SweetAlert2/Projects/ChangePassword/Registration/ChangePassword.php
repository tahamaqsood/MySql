<?php

// Including database connection
include('dbConnection.php');

// Starting session
session_start();

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


         <!-- Jquery CDN -->
         <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

         <!-- Sweet Alert2 Css file -->
         <link rel="stylesheet" href="dist/sweetalert2.min.css">

         <!-- Sweet Alert2 Js file -->
         <script src="dist/sweetalert2.all.min.js"></script>
  </head>
  <body>
      

     <!-- Using Bootstrap Grid System -->
     <div class="container" style="margin-top:30px;">
         <div class="row">
             <div class="col-md-5 mx-auto" style="-webkit-box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);
box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);">

             <!-- Change Password Form -->
             <form action="" method="post">

             <br>
             <!-- Current Password -->
             <label>Current Password</label>
             <input type="password" name="currentPassword" placeholder="Enter Your Current Password" class="form-control" id="crtpass" required>
             <br>


             <!-- New Password -->
             <label>New Password</label>
             <input type="password" name="newPassword" placeholder="Enter Your New Password" class="form-control" id="npass" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
             <br>


             <!-- Confirm Password -->
             <label>Confirm Password</label>
             <input type="password" name="confirmPassword" placeholder="Re-Enter Password" class="form-control" id="cpass" required>
             <br>


             <!-- Show Password -->
             <input type="checkbox" onclick="ShowPasswords()">
             <label>Show Passwords</label>
             <br>


             <!-- Change Password Button -->
             <input type="submit" value="Change Password" name="cpBtn" class="btn btn-success btn-block">
             <br>
             </form>
             </div>
         </div>
     </div>

     <?php
     
     if(isset($_POST['cpBtn']))
     {

        //  Only the user who logged in have right to change his/her password
         if(isset($_SESSION['UserID']))
         {

            //  taking user ID in id variable from Session object which was created when he logged in. 
             $id = $_SESSION['UserID'];


            //  Query to fetch all data of that specific user
             $query = "select * from USERS where ID='$id'";


            //  Storing fetch data into result variable
             $result = mysqli_query($con,$query);


            //  Converting fetch data into Associative array
             $data = mysqli_fetch_assoc($result);


            //  Storing old password in password variable with the help of Associative array
             $password = $data['PASSWORD'];


             if($result==true)
             {

                //  Storing field values in php variables
                 $currentPassword = $_POST['currentPassword'];
                 $newPassword = $_POST['newPassword'];
                 $confirmPassword = $_POST['confirmPassword'];


                //  Comparing Current password with Old Password
                 if($currentPassword == $password)
                 {

                    // Comparing New Password with Confirm Password
                     if($newPassword == $confirmPassword)
                     {
                        //  Update Query
                         $query = "update USERS set PASSWORD='$newPassword' where ID='$id'";

                        //  Executing query
                         $exec = mysqli_query($con,$query);
                         if($exec==true)
                         {
                            echo "<script>
                            swal.fire({
                                title: 'Updated Successfully!',
                                icon: 'success',
                                text: 'Your password has been changed successfully!',
                                confirmButtonColor: 'blue',
                                timer: 2000
                            }).then(function(){
                                window.location.href='Home.php';
                            });
                            </script>";
                         }
                     }
                     else
                     {
                        echo "<script>
                        swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'New Password and Confirm Password is not identical',
                            confirmButtonColor: 'blue'
                        });
                        </script>";
                     }
                 }
                 else
                 {
                     echo "<script>
                     swal.fire({
                         title: 'Error',
                         icon: 'error',
                         text: 'Your current password is invalid',
                         confirmButtonColor: 'blue'
                     });
                     </script>";
                 }
             }
         }
     }
     
     ?>

<script>

// For Show Passwords
 function ShowPasswords()
 {
     var crtpass = document.getElementById("crtpass");
     var npass = document.getElementById("npass");
     var cpass = document.getElementById("cpass");
     if(crtpass.type == "password" && npass.type == "password" && cpass.type == "password")
     {
        crtpass.type = "text";
        npass.type = "text";
        cpass.type = "text";
     }
     else
     {
        crtpass.type = "password";
        npass.type = "password";
        cpass.type = "password";
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