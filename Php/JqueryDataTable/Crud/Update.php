<!doctype html>
<html lang="en">
  <head>
    <title>Update</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


  <?php
  // Including Database Connection
include('dbConnection.php');


// Storing id in php variable from query string
$UpdateID = $_GET['id']??"";


// Query
$query = "select * from USERS where ID = $UpdateID";

// Executing query
$result = mysqli_query($con,$query);

// Converting fetched data into associative array
$data = mysqli_fetch_assoc($result);
?>


<!-- Bootstrap Grid System -->
  <div class="container" style="margin-top:20px;">
      <div class="row">
          <div class="col-md-4">


          <!-- Form -->
          <form action="" method="post">

                  
                   <!-- Hidden Field for id -->
                   <input type="hidden" name="id" value="<?php echo $data['ID']?>">

                   <!-- Name -->
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" placeholder="Enter Name" required value="<?php echo $data['NAME'];?>">
                     <br>

                     <!-- Age -->
                     <label>Age</label>
                     <input type="number" name="age" class="form-control" placeholder="Enter Age" required value="<?php echo $data['AGE'];?>">
                     <br>

                     <!-- Gender -->
                     <label>Gender</label>
                     <input type="text" name="gender" class="form-control" placeholder="Enter Gender" required value="<?php echo $data['GENDER'];?>">
                     <br>

                     <!-- City -->
                     <label>City</label>
                     <input type="text" name="city" class="form-control" placeholder="Enter City" required value="<?php echo $data['CITY'];?>">
                     <br>

                     <!-- Email -->
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" placeholder="Enter Email" required value="<?php echo $data['EMAIL'];?>">
                     <br>

                     <!-- Update Button -->
                     <input type="submit" value="Update" name="btnUpdate" class="btn btn-success btn-block">

          </form>

          </div>
      </div>
  </div>

  <?php
  
  if(isset($_POST['btnUpdate']))
  {
    //  Recieving field values in php variables
      $id = $_POST['id'];
      $name = $_POST['name'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $city = $_POST['city'];
      $email = $_POST['email'];


      // Update query
      $query = "update USERS set NAME='$name', AGE='$age', GENDER='$gender', CITY='$city', EMAIL='$email' where ID='$id'";

      // Executing Query
      $exec = mysqli_query($con,$query);
      if($exec==true)
      {
         echo "<script>alert('Data Successfully Updated..!!');window.location.href='Retrieval.php';</script>";
      }
      else
      {
        echo "<script>alert('Data Not Updated..!!')</script>";
      }
  }
  
  ?>


</body>
</html>