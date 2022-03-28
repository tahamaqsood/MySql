<?php
// Including Database Connection
include('dbConnection.php');

// Storing Query string value in php variable
$UpdateID = $_GET['id']??""; 

// Query
$query = "select * from EMPLOYEES where ID='$UpdateID'";

// Executing Query
$result = mysqli_query($con,$query);

// Converting Fetch data into Associative array
$data = mysqli_fetch_assoc($result);
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

      <!-- Using Bootstrap Grid System  -->
      <div class="container" style="margin-top:40px;">
          <div class="row">
              <div class="offset-2 col-md-6"
              style="-webkit-box-shadow: 0px 0px 4px 5px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 4px 5px rgba(0,0,0,0.75);
box-shadow: 0px 0px 4px 5px rgba(0,0,0,0.75);">
  
  <h1 class="text-center" colspan="6" style="font-weight:900">UPDATE &nbsp; FORM</h1>

<br><br>
                  <!-- Update Form -->
                  <form action="" method="post" enctype="multipart/form-data">

                  <!-- Hidden Field For ID -->
                  <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">

                  <!-- Name -->
                  <label>Name</label>
                  <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $data['NAME']; ?>" required>
                  <br>

                  <!-- Age -->
                  <label>Age</label>
                  <input type="text" name="age" placeholder="Enter Age" class="form-control" value="<?php echo $data['AGE']; ?>" required>
                  <br>

                  <!-- Gender -->
                  <label>Gender:</label>
                  <?php
                  if($data['GENDER']=="Male")
                  {
                      echo "<label>Male</label>
                      <input type='radio' name='gender' value='Male' checked>

                      <label>Female</label>
                      <input type='radio' name='gender' value='Female'>
                      ";
                  }
                  else
                  {
                    echo "<label>Male</label>
                    <input type='radio' name='gender' value='Male'>

                    <label>Female</label>
                    <input type='radio' name='gender' value='Female' checked>
                    ";
                  }
                  ?>
                  <br>

                  <!-- City -->
                  <label>City</label>
                  <?php
                  if($data['CITY']=="Karachi")
                  {
                      echo"
                       <select name='city' class='form-control' required>

                       <option value=''>Select City</option>
                       <option value='Karachi' selected>Karachi</option>
                       <option value='Lahore'>Lahore</option>
                       <option value='Islamabad'>Islamabad</option>
                       <option value='Peshawar'>Peshawar</option>
                       
                       </select>
                      ";
                  }
                  else if($data['CITY']=="Lahore")
                  {
                    echo"
                    <select name='city' class='form-control' required>

                    <option value=''>Select City</option>
                    <option value='Karachi'>Karachi</option>
                    <option value='Lahore' selected>Lahore</option>
                    <option value='Islamabad'>Islamabad</option>
                    <option value='Peshawar'>Peshawar</option>
                    
                    </select>
                   ";
                  }
                  else if($data['CITY']=="Islamabad")
                  {
                    echo"
                    <select name='city' class='form-control' required>

                    <option value=''>Select City</option>
                    <option value='Karachi'>Karachi</option>
                    <option value='Lahore'>Lahore</option>
                    <option value='Islamabad' selected>Islamabad</option>
                    <option value='Peshawar'>Peshawar</option>
                    
                    </select>
                   ";
                  }
                  else if($data['CITY']=="Peshawar")
                  {
                    echo"
                    <select name='city' class='form-control' required>

                    <option value=''>Select City</option>
                    <option value='Karachi'>Karachi</option>
                    <option value='Lahore'>Lahore</option>
                    <option value='Islamabad'>Islamabad</option>
                    <option value='Peshawar' selected>Peshawar</option>
                    
                    </select>
                   ";
                  }
                  ?>
                  <br>

                  <!-- Email -->
                  <label>Email</label>
                  <input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php echo $data['EMAIL'] ?>" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
                  <br>


                  <!-- For Displaying Image above file controller -->
                  <?php
                  if($data['IMAGE_PATH']!="" && $data['IMAGE_PATH']!=null)
                  {
                      echo "<img src='$data[IMAGE_PATH]' width='70' height='70'>";
                  }
                  ?>
                  <br>

                  
                  <!-- Image -->
                  <input type="file" name="image">
                  <br><br>

                  <!-- Hidden Field for Old Image -->
                  <input type="hidden" name="OldImage" value="<?php echo $data['IMAGE_PATH']; ?>">
                  <br>

                  <!-- Update Button -->
                  <input type="submit" value="Update" name="UpdateBtn" class="btn btn-success btn-block">

                  <!-- Cancel Button -->
                  <a href="Retrieval.php" class="btn btn-danger btn-block">Cancel</a>
                  <br>
                  </form>
              </div>
          </div>
      </div>


      <?php
      if(isset($_POST['UpdateBtn']))
      {
        //   Recieving Field values in php Variables.
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $OldImage = $_POST['OldImage'];

        // For Image
        $image_name = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];

        // Storing folder location in a folder variable
        $folder = "images/";


        // If record update with image
        if(is_uploaded_file($_FILES['image']['tmp_name']))
        {
            // Validation for image type/format
            if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
            {
                // Validation for image size
                if($image_size<=1000000)
                {
                    // concatinating folder location with image name (Our folder name images which containing images)
                    $folder = $folder . $image_name;

                    // Update query
                    $query = "Update EMPLOYEES set NAME='$name',AGE='$age',GENDER='$gender',CITY='$city',EMAIL='$email',IMAGE_PATH='$folder' where ID='$id'";
                    $exec = mysqli_query($con,$query);
                    if($exec==true)
                    {
                        echo "<script>alert('Data Updated Succesfully!');window.location.href='Retrieval.php'</script>";

                        // For moving image from temporary folder to actual folder 
                        move_uploaded_file($image_temp_name,$folder);

                        // For deleting old image from old folder
                        unlink($OldImage);
                    }
                    else
                    {
                        echo "<script>alert('Data not updated!')</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Image size should be less than 1MB')</script>";
                }
            }
            else
            {
                echo "<script>alert('Image format not supported')</script>";
            }
        }
        else
        {
            // if record update without image

            // Update query
            $query = "Update EMPLOYEES set NAME='$name',AGE='$age',GENDER='$gender',CITY='$city',EMAIL='$email' where ID='$id'";
            $exec = mysqli_query($con,$query);
            if($exec==true)
            {
                echo "<script>alert('Data Updated Succesfully!');window.location.href='Retrieval.php'</script>";
            }
            else
            {
                echo "<script>alert('Data not updated!')</script>";
            }
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