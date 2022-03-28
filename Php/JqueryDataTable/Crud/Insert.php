<!doctype html>
<html lang="en">
  <head>
    <title>Insert</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
       
  <!-- Bootstrap Grid System -->
     <div class="container" style="margin-top:20px;">
         <div class="row">
             <div class="col-md-4">

                 
                 <!-- Form -->
                 <form action="" method="post">

                     <!-- Name -->
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                     <br>

                     <!-- Age -->
                     <label>Age</label>
                     <input type="number" name="age" class="form-control" placeholder="Enter Age" required>
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
                         <option value="">Select</option>
                         <option value="Karachi">Karachi</option>
                         <option value="Lahore">Lahore</option>
                         <option value="Islamabad">Islamabad</option>
                         <option value="Faisalabad">Faisalabad</option>
                         <option value="Peshawar">Peshawar</option>
                     </select>
                     <br>

                     <!-- Email -->
                     <input type="text" name="email" class="form-control" placeholder="Enter Email" required pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
                     <br>

                     <!-- Insert Button -->
                     <input type="submit" value="Insert" name="btnInsert" class="btn btn-primary btn-block">

                     <!-- View Record Button -->
                     <a href="Retrieval.php" class="btn btn-info btn-block">View Records</a>

                 </form>

             </div>
         </div>
     </div>

     <?php
    //  Including Database Connection
     include('dbConnection.php');
     
     if(isset($_POST['btnInsert']))
     {
        //  Recieving field values in php variables 
         $name = $_POST['name'];
         $age = $_POST['age'];
         $gender = $_POST['gender'];
         $city = $_POST['city'];
         $email = $_POST['email'];


        // Query
         $query = "insert into USERS values(Null,'$name','$age','$gender','$city','$email')";

        //  Executing Query
         $exec = mysqli_query($con,$query);

        //  Checking whether the query executed or not..
         if($exec==true)
         {
            echo "<script>alert('New Record Added..!!')</script>";
         }
         else
         {
            echo "<script>alert('Data not added..!!')</script>";
         }

     }
     
     ?>

  </body>
</html>