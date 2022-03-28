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

                <form action="" method="post" name="f">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="Enter First Name" class="form-control" required>
                    <br>

                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required>
                    <br>

                    <label>Age</label>
                    <input type="number" name="age" placeholder="Enter Age" class="form-control" required>
                    <br>

                    <label>Gender:</label>
                    <label>Male</label>
                    <input type="radio" name="gender" value="Male">

                    <label>Female</label>
                    <input type="radio" name="gender" value="Female">
                    <br>

                    <label>City</label>
                    <select name="city" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Karachi">Karachi</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Multan">Multan</option>
                        <option value="Peshawar">Peshawar</option>
                    </select>

                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter Email" class="form-control" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
                    <br>

                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter Username" class="form-control" required>
                    <br>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter  Password" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Your password must contain Upper-case, lower-case,8 letters & symbols" required>
                    <br>

                    <label>Confirm Password</label>
                    <input type="password" name="confirmpassword" placeholder="Re-Enter Password" class="form-control" required>
                    <a href="#" onclick="ShowPasswords()">Show Passwords</a>
                    <br>

                    <input type="submit" value="Signup" name="btnSignup" class="btn btn-success btn-block" onclick="return ComparePassword()">
                </form>

            </div>
        </div>
    </div>

    <?php
    
    if(isset($_POST['btnSignup']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age   = $_POST['age'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "insert into USERS values(Null,'$fname','$lname','$age','$gender','$city','$email','$username','$password')";
        $exec = mysqli_query($con,$query);
        if($exec==true)
        {
            $_SESSION['username'] = $username;
            echo "<script>alert('Registered Successfully..!!')</script>";
            echo "<script>alert('Your Username is ".$username." and Password is ".$password."')</script>";
            echo "<script>window.location.href='Login.php'</script>";
        }
        else
        {
            echo "<script>alert('Not Registered.!!')</script>";
        }

    }
    
    ?>

    <script>
        function ComparePassword()
        {
            var pass = f.password.value;
            var cpass = f.confirmpassword.value;
            if(pass == cpass)
            {
                return true;
            }
            else
            {
                alert('Password is not identical');
                return false;
            }
        }

        function ShowPasswords()
        {
            var pass = f.password;
            var cpass = f.confirmpassword;
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



  </body>
</html>