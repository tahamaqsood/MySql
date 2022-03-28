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
      
     <!-- Using Bootstrap Grid System  -->
     <div class="container" style="margin-top:20px;">
         <div class="row">
             <div class="col-md-4">

             <!-- Login Form -->
             <form action="Login.php" method="post">

             <!-- Username -->
             <label>Username</label>
             <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
             <br>


             <!-- Password -->
             <label>Password</label>
             <input type="password" name="password" class="form-control" placeholder="Enter Password" required id="Show">
             <br>


             <!-- Checkbox For Show Password Functionality -->
             <input type="checkbox" onclick="ShowPassword()">
             <label>Show Password</label>
             <br>


             <!-- Login Button -->
             <input type="submit" value="Login" class="btn btn-primary btn-block" name="btnLogin">


             <!-- Registration Button -->
             <a href="Signup.php" class="btn btn-success btn-block">Register Yourself</a>
             </form>

             </div>
         </div>
     </div>

     <?php
     
    //  Including Database Connection
    include('dbConnection.php');

    // Starting Session
    session_start();

    // Condition For Login Button
    if(isset($_POST['btnLogin']))
    {
        // Recieving field's values in php variables
        $username = $_POST['username'];
        $password = $_POST['password'];


        // MySql Query
        $query = "select * from USERS where USERNAME='$username' and PASSWORD='$password'";


        // Storing fetched data in result variable
        $result = mysqli_query($con,$query);


        // Counting Rows after the data fetched
        $totalRows = mysqli_num_rows($result);


        // Condition to restrict getting multiple rows in-case. 
        if($totalRows==1)
        {
            // Creating Session For User and storing username in Session object
            $_SESSION['username'] = $username;


            // Redirecting to Home page
            header('location:Home.php');
        }
        else
        {
            echo "<script>alert('Username or Password is incorrect')</script>";
        }

    }


    // Condition to restrict user from entering login page after he/she login successfully.!
    if(isset($_SESSION['username']))
    {
        // Redirecting to Home page
        header('location:Home.php');
    }
     
     ?>


     <!-- Using Javascript For "Show Password" Functionality  -->
     <script>

         function ShowPassword()
         {
            //  Storing password field in Javascript variable by calling id of Password's field
             var pass = document.getElementById("Show");


            //  Condition to check type of password field.
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