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


  <!-- Bootstrap Grid System -->
  <div class="container">
      <div class="row">
          <div class="col-md-4">

             <!-- Form For Adding Records -->
              <form action="Create.php" method="post">
             <label>Name</label>
             <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
             <br>

             <label>Age</label>
             <input type="text" name="age" placeholder="Enter Age" class="form-control" required>
             <br>

             <label>Gender:</label>

             <label>Male</label>
             <input type="radio" name="gender" value="Male">

             <label>Female</label>
             <input type="radio" name="gender" value="Female">
             <br>

             <label>Fees</label>
             <input type="text" name="fees" placeholder="Enter Fees" class="form-control" required>
             <br>

             <input type="submit" name="btnInsert" value="Insert" class="btn btn-primary btn-block">
             <a href="Retrieval.php" class="btn btn-info btn-block">View Records</a>

              </form>
          </div>
      </div>
  </div>

  <?php
//  Including Database Connection
  include('dbConnection.php');

  //If click on Insert button...
  if(isset($_POST['btnInsert']))
  {
    //Recieving text fields values in php variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $fees = $_POST['fees'];

    //MySql query
    $query = "insert into STUDENT values(Null,'$name','$age','$gender','$fees')";


    //Method for executing MySql query
    $exec = mysqli_query($con,$query);
    if($exec==true)
    {
        echo "<script>alert('Data inserted.!!')</script>";
    }
    else
    {
        echo "<script>alert('Data not inserted.!!')</script>";
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