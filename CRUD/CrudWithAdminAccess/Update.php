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
  $UpdateId = $_GET['id']??"";
  if($_SESSION['username']==null)
  {
     header('location:Login.php');
  }
  $query = "select * from USERS where ID='$UpdateId'";
  $result = mysqli_query($con,$query);
  $data = mysqli_fetch_assoc($result);


  ?>

<div class="container" style="margin-top:20px;">
      <div class="row">
          <div class="col-md-4">
              <form action="Update.php" method="post">

              <input type="hidden" name="id" value="<?php echo $data['ID'];?>">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $data['NAME'];?>" required>
                  <br>

                  <label>Age</label>
                  <input type="number" name="age" class="form-control" placeholder="Enter Age" value="<?php echo $data['AGE'];?>" required>
                  <br>

                  <label>Gender:</label>
                  <input type="text" name="gender" class="form-control" placeholder="Enter Gender" value="<?php echo $data['GENDER'];?>" required>
                  <br>

                  <label>Gender:</label>
                  <input type="text" name="city" class="form-control" placeholder="Enter City" value="<?php echo $data['CITY'];?>" required>  
                  <br>


                  <input type="submit" value="Update" class="btn btn-info btn-block" name="btnUpdate">
                  

              </form>  
          </div>
      </div>
  </div>


  <?php
  
  if(isset($_POST['btnUpdate']))
  {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $query = "update USERS set NAME='$name',AGE='$age',GENDER='$gender',CITY='$city' where ID = $id";
    $exec = mysqli_query($con,$query);
    if($exec==true)
    {
        echo "<script>alert('Data Updated.!!');
        window.location.href='Retrieval.php';
        </script>";
    }
    else
    {
        echo "<script>alert('Data Not Updated.!!')</script>";
    }

  }
  
  ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>