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
      

  <div class="container" style="margin-top:20px;">
      <div class="row">
          <div class="col-md-4">
              <form action="Insert.php" method="post">

                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                  <br>

                  <label>Age</label>
                  <input type="number" name="age" class="form-control" placeholder="Enter Age" required>
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
                  <br>


                  <input type="submit" value="Insert" class="btn btn-success btn-block" name="btnInsert">
                  <a href="Retrieval.php" class="btn btn-info btn-block">View Records</a>

              </form>  
          </div>
      </div>
  </div>




  <?php
 include('dbConnection.php');
 session_start();
 if($_SESSION['username']==null)
{
    header('location:Login.php');
}


  
if(isset($_POST['btnInsert']))
{
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $city = $_POST['city'];

   $query = "insert into USERS values (NULL,'$name','$age','$gender','$city')";
   $exec = mysqli_query($con,$query);
   if($exec==true)
   {
       echo "<script>alert('New Record Inserted')</script>";
   }
   else
   {
    echo "<script>alert('Data Not Inserted')</script>";
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