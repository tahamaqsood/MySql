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

// Including database connection
include('dbConnection.php');

// Starting session
session_start();
?>

      <!-- Using Bootstrap Grid System -->
      <div class="container" style="margin-top:30px;">
          <div class="row">
              <div class="col-md-6 offset-3" style="-webkit-box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);
box-shadow: 0px 0px 7px 3px rgba(0,0,0,0.75);">

              <!-- Signup Form -->
              <form action="" method="post" name="f">

              <br>

              <!-- First Name -->
              <label>First Name</label>
              <input type="text" name="fname" placeholder="Enter First Name" class="form-control" required>
              <br>


              <!-- Last Name -->
              <label>Last Name</label>
              <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required>
              <br>


              <!-- Age -->
              <label>Age</label>
              <input type="number" name="age" placeholder="Enter Age" class="form-control" required>
              <br>


              <!-- Gender -->
              <label>Gender:</label>

              <label>Male</label>
              <input type="radio" name="gender" value="Male">

              <label>Female</label>
              <input type="radio" name="gender" value="Female">
              <br>


              <!-- City -->
              <label>City</label>
              <select name="city" class="form-control" required>
                  <option value="">Select City</option>
                  <option value="Karachi">Karachi</option>
                  <option value="Lahore">Lahore</option>
                  <option value="Islamabad">Islamabad</option>
                  <option value="Peshawar">Peshawar</option>
                  <option value="Quetta">Quetta</option>
              </select>
              <br>


              <!-- Email -->
              <input type="text" name="email" placeholder="Enter Email" class="form-control" required pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
              <br>


              <!-- Password -->
              <input type="password" name="password" placeholder="Enter Password" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required id="pass">
              <br>


              <!-- Confirm Password -->
              <input type="password" name="cpassword" placeholder="Re-Enter Password" class="form-control" required id="cpass">
              <br>


              <!-- Show Password -->
              <input type="checkbox" onclick="ShowPasswords()">
              <label>Show Passwords</label>
              <br>


              <!-- Signup Button -->
              <input type="submit" value="Signup" class="btn btn-success btn-block" onclick=" return ComparePasswords()" name="SignupBtn">
              <br>

              </form>

              </div>
          </div>
      </div>


<?php

if(isset($_POST['SignupBtn']))
{
    // Recieving values in php variables form fields
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query
    $query = "insert into USERS values(Null,'$fname','$lname','$age','$gender','$city','$email','$password')";

    // Executing query
    $exec = mysqli_query($con,$query);

    if($exec==true)
    {
        
        echo "<script>
        swal.fire({
            title: 'Registration Completed Successfully!',
            text: 'Your email is ".$email." and password is ".$password."',
            icon: 'success',
            confirmButtonColor: 'blue'
        }).then(function(){
            window.location.href='Login.php';
        });
        </script>";
    }
    else
    {
        echo "<script>
         $(document).ready(function(){
             swal.fire({
                 title: 'Registeration Failed',
                 icon: 'error',
                 text: 'Unable to Register!',
                 confirmButtonColor: 'blue'
             });
         });
         </script>";
    }
}
?>

      <script>

        //   For Showing Passwords
          function ShowPasswords()
          {
              var pass = document.getElementById("pass");
              var cpass = document.getElementById("cpass");
              if(pass.type == "password" && cpass.type == "password")
              {
                  pass.type = "text";
                  cpass.type = "text";
              }
              else
              {
                pass.type = "password";
                cpass.type = "password";
              }
          }
      </script>

      <script>
          //   For Comparing Password and Confirm Password
        function ComparePasswords()
        {
            var pass = f.password.value;
            var cpass = f.cpassword.value;
            if(pass != cpass)
            {
                swal.fire({
                    title: 'Password Not Matched!',
                    icon: 'error',
                    text: 'Password and Confirm Password is not identical',
                    confirmButtonColor: 'blue'
                });
                return false;       
            }
            else
            {
                return true;
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