<?php
// Including Database Connection
include('dbConnection.php');
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
  </head>
  <body>
      

  <!-- Using Bootstrap Grid System -->
  <div class="container" style="margin-top:40px;">
      <div class="row">
          <div class="col-md-5 offset-2" style="-webkit-box-shadow: 0px 0px 4px 5px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 4px 5px rgba(0,0,0,0.75);
box-shadow: 0px 0px 4px 5px rgba(0,0,0,0.75);">

<br>

              <!-- Insert Form -->
              <form action="" method="post" enctype="multipart/form-data">

              <!-- Name -->
              <label>Name</label>
              <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
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
              <select name="city" class="form-control" required>
                  <option value="">Select City</option>
                  <option value="Karachi">Karachi</option>
                  <option value="Lahore">Lahore</option>
                  <option value="Islamabad">Islamabad</option>
                  <option value="Peshawar">Peshawar</option>
              </select>
              <br>

              <!-- Email -->
              <input type="text" name="email" placeholder="Enter Email" class="form-control" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
              <br>

              <!-- Image -->
              <label>Image</label>
              <br>
              <input type="file" name="image" required>
              <br><br>

              <!-- Insert Button -->
              <input type="submit" value="Insert" name="InsertBtn" class="btn btn-primary btn-block">
              
              <!-- View Records Button -->
              <a href="Retrieval.php" class="btn btn-info btn-block">View Records</a>
              <br>

              </form>
          </div>
      </div>
  </div>
  <!-- Note: We used 'file' type for image controller and enctype to support file uploading in our form  -->

  <?php
  if(isset($_POST['InsertBtn']))
  {
      $name = $_POST['name'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $city = $_POST['city'];
      $email = $_POST['email'];

    //   Now for image, we will use $_FILES to recieve file values from form. $_FILES return values in array form 

    /*
    Note: $_FILES return these values:
    (1)image name (Key = 'name')
    (2)image temporary name (Key = 'tmp_name')
    (3)image type/image format (Key = 'type') 
    (4)image size (Key = 'size')
    */
      $image_name = $_FILES['image']['name'];
      $image_temp_name = $_FILES['image']['tmp_name'];
      $image_type = $_FILES['image']['type'];
      $image_size = $_FILES['image']['size'];

    //   Giving folder variable a location of our images folder
    $folder = "images/";


    // Validation For Image type
    // Note: We will use strtolower(); method to convert image type into lower case and then compare with with type
    if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
    {

        // Validation for Image size
        if($image_size<=1000000)
        {
            // concatinating folder location with image name (Our folder name images which containing images)
            $folder = $folder . $image_name;
            $query = "insert into EMPLOYEES value(Null,'$name','$age','$gender','$city','$email','$folder')";
            $exec = mysqli_query($con,$query);
            if($exec==true)
            {
                echo "<script>alert('Data Inserted!')</script>";

                // For moving image from temporary folder to actual folder
                move_uploaded_file($image_temp_name,$folder);
            }
            else
            {
                echo "<script>alert('Data not inserted!')</script>";
            }
        }
        else
        {
            echo "<script>alert('Image size should be less than 1MB')</script>";
        }
    }
    else
    {
        echo "<script>alert('Image format not supported!')</script>";
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