<!doctype html>
<html lang="en">
  <head>
    <title>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
<?php
//Including Database Connection
include('dbConnection.php');
/*
Catching User ID from URL with the help of GET Method. Also using null coalescing operator to avoid
error after the page refreshes.
*/
$UpdateID = $_GET['id']??"";

//MySql Query
$query="select * from STUDENT where ID = '$UpdateID'";

//Executing mysql query and storing fetched data in result variable 
$result = mysqli_query($con,$query);

//Converting result variable in Associative array
$data = mysqli_fetch_assoc($result);
?>
 
 <!-- Bootstrap grid system -->
<div class="container">
      <div class="row">
          <div class="col-md-4">

              <!-- Update Form -->
              <form action="Update.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $data['ID'];?>">
             <label>Name</label>
             <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $data['NAME'];?>" required>
             <br>

             <label>Age</label>
             <input type="text" name="age" placeholder="Enter Age" class="form-control" value="<?php echo $data['AGE'];?>" required>
             <br>

             <label>Gender:</label>
             <input type="text" name="gender" placeholder="Enter Gender" class="form-control" value="<?php echo $data['GENDER'];?>" required>
             
             <br>

             <label>Fees</label>
             <input type="text" name="fees" placeholder="Enter Fees" class="form-control" value="<?php echo $data['FEES'];?>" required>
             <br>

             <input type="submit" name="btnUpdate" value="Update" class="btn btn-info btn-block">
             <a href="Retrieval.php" class="btn btn-default btn-block">Cancel</a>

              </form>
          </div>
      </div>
  </div>
<?php
//If click on Update Button
if(isset($_POST['btnUpdate']))
{
  //Recieving text fields values in php variables
  $id = $_POST['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $fees = $_POST['fees'];

  //MySql query
  $query = "update STUDENT set NAME='$name',AGE='$age',GENDER='$gender',FEES='$fees' where ID='$id'";

  //Method for executing MySql query
  $exec = mysqli_query($con,$query);
  if($exec==true)
  {
    echo "<script>alert('Data Updated.!!');
    window.location.href='Retrieval.php';</script>";
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