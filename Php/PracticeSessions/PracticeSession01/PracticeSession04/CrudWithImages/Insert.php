<?php
session_start();
include('dbConnection.php');
if($_SESSION['AdminName']==null)
{
    header("Location:Login.php");
}
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
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <script src="dist/sweetalert2.min.js"></script>
  </head>
  <body>
      <div class="container" style="margin-top:50px;">
          <div class="row">
              <div class="col-md-5 offset-2" style="-webkit-box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.71);
-moz-box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.71);
box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.71);">
                  <form action="" method="post" enctype="multipart/form-data">
                      <br>
                      <h1 class="text-center" style="font-weight:900; color:grey">ADD NEW RECORD</h1>
                      <input type="text" name="fname" placeholder="Enter First Name" class="form-control" required>
                      <br>

                      <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required>
                      <br>

                      <input type="number" name="age" placeholder="Enter Age" class="form-control" required>
                      <br>

                      <label>Male</label>
                      <input type="radio" name="gender" value="Male">
                      <label>Female</label>
                      <input type="radio" name="gender" value="Female">
                      <br>

                      <select name="city" class="form-control" required>
                          <option value="">Select City</option>
                          <option value="Lahore">Lahore</option>
                          <option value="Karachi">Karachi</option>
                          <option value="Islamabad">Islamabad</option>
                          <option value="Peshawar">Peshawar</option>
                      </select>
                      <br>

                      <input type="file" name="image" required>
                      <br>
                      <br>

                      <input type="submit" value="Insert" name="InsertBtn" class="btn btn-primary btn-block">
                      <a href="Retrieval.php" class="btn btn-info btn-block">View Records</a>
                      <br>


                  </form>
              </div>
          </div>
      </div>



      <?php
      if(isset($_POST['InsertBtn']))
      {
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $age = $_POST['age'];
          $gender = $_POST['gender'];
          $city = $_POST['city'];
          
          $image_name = $_FILES['image']['name'];
          $image_temp_name = $_FILES['image']['tmp_name'];
          $image_type = $_FILES['image']['type'];
          $image_size = $_FILES['image']['size'];

          if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
          {
              if($image_size<=1000000)
              {
                $folder = "images/" . $image_name;
                $query = "insert into USERS values (Null,'$fname','$lname','$age','$gender','$city','$folder')";
                $exec = mysqli_query($con,$query);
                if($exec==true)
                {
                    echo "
              <script>
              swal.fire({
                  title: 'Data Added!',
                  text: 'New Record has been created successfully',
                  icon: 'success',
                  confirmButtonColor: 'blue',
                  timer: 3000
              });
              </script>";
              move_uploaded_file($image_temp_name,$folder);
                }
              }
              else
              {
                echo "
                <script>
                swal.fire({
                    title: 'Too Large!',
                    text: 'Image size shoulde be less than 1MB',
                    icon: 'error',
                    confirmButtonColor: 'blue',
                    timer: 3000
                })
                </script>
                ";
              }
          }
          else
          {
            echo "
            <script>
            swal.fire({
                title: 'Invalid Format!',
                text: 'Format not supported',
                icon: 'error',
                confirmButtonColor: 'blue',
                timer: 3000
            })
            </script>
            ";
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