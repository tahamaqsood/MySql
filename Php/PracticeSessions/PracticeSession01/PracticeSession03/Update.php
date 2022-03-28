<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Sweet Alert2 Css File -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">

    <!-- Sweet Alert2 Js File -->
    <script src="dist/sweetalert2.all.min.js"></script>

  </head>
  <body>

  <?php
  include('dbConnection.php');
  $UpdateID = $_GET['id']??"";
  $query = "select * from USERS where ID='$UpdateID'";
  $result = mysqli_query($con,$query);
  $data = mysqli_fetch_assoc($result);
  ?>
      

  <!-- Using Bootstrap Grid System -->
  <div class="container" style="margin-top:100px;">
          <div class="row">
              <div class="col-md-5 offset-2" style="-webkit-box-shadow: 0px 0px 8px 3px rgba(0,0,0,0.71);
-moz-box-shadow: 0px 0px 8px 3px rgba(0,0,0,0.71);
box-shadow: 0px 0px 8px 3px rgba(0,0,0,0.71);">

              <!-- Update Form -->
              <form action="" method="post" enctype="multipart/form-data">
              <br>

              <!-- Form Heading -->
              <h1 style="font-weight:900;" class="text-center" colspan="5">UPDATE FORM</h1>

              <!-- Hidden field for id -->
              <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">

              <!-- Name -->
              <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $data['NAME']; ?>" required>
              <br>

              <!-- Age -->
              <input type="number" name="age" placeholder="Enter Age" class="form-control" value="<?php echo $data['AGE']; ?>" required>
              <br>
              
              

              <?php
                  if($data['GENDER']=="Male")
                  {
                      echo "<label>Male</label>
                      <input type='radio' name='gender' value='Male' Checked>

                      <label>Female</label>
                      <input type='radio' name='gender' value='Female'>
                      ";
                  }
                  else if($data['GENDER']=="Female")
                  {
                    echo "<label>Male</label>
                    <input type='radio' name='gender' value='Male'>

                    <label>Female</label>
                    <input type='radio' name='gender' value='Female' Checked>
                    ";
                  }
                  ?>

              <!-- For City -->
              <?php
              if($data['CITY']=="Karachi")
              {
                  echo 
                  "<select name='city' class='form-control' required>
                  <option value=''>Select City</option>
                  <option value='Karachi' selected>Karachi</option>
                  <option value='Lahore'>Lahore</option>
                  <option value='Islamabad'>Islamabad</option>
                  <option value='Peshawar'>Peshawar</option>
                  <option value='Multan'>Multan</option>
              </select>
              <br>";
              }
              else if($data['CITY']=="Lahore")
              {
                echo 
                "<select name='city' class='form-control' required>
                <option value=''>Select City</option>
                <option value='Karachi'>Karachi</option>
                <option value='Lahore' selected>Lahore</option>
                <option value='Islamabad'>Islamabad</option>
                <option value='Peshawar'>Peshawar</option>
                <option value='Multan'>Multan</option>
            </select>
            <br>";
              }
              else if($data['CITY']=="Islamabad")
              {
                echo 
                "<select name='city' class='form-control' required>
                <option value=''>Select City</option>
                <option value='Karachi' >Karachi</option>
                <option value='Lahore'>Lahore</option>
                <option value='Islamabad' selected>Islamabad</option>
                <option value='Peshawar'>Peshawar</option>
                <option value='Multan'>Multan</option>
            </select>
            <br>";
              }
              else if($data['CITY']=="Peshawar")
              {
                echo 
                "<select name='city' class='form-control' required>
                <option value=''>Select City</option>
                <option value='Karachi' >Karachi</option>
                <option value='Lahore'>Lahore</option>
                <option value='Islamabad'>Islamabad</option>
                <option value='Peshawar' selected>Peshawar</option>
                <option value='Multan'>Multan</option>
            </select>
            <br>";
              }
              else if($data['CITY']=="Multan")
              {
                echo 
                "<select name='city' class='form-control' required>
                <option value=''>Select City</option>
                <option value='Karachi' >Karachi</option>
                <option value='Lahore'>Lahore</option>
                <option value='Islamabad'>Islamabad</option>
                <option value='Peshawar'>Peshawar</option>
                <option value='Multan' selected>Multan</option>
            </select>
            <br>";
              }
              ?>

              <!-- Hidden Field For Old Image -->
              <input type="hidden" name="OldImage" value="<?php echo $data['IMAGE_PATH']; ?>">

              
              <!-- Email With Regular Expression -->
              <input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php echo $data['EMAIL']; ?>" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
              <br>

              <!-- For Displaying Old image above image controller -->
              <?php
              if($data['IMAGE_PATH']!="" && $data['IMAGE_PATH']!=null)
              {
                  echo "<img src='$data[IMAGE_PATH]' width='70' height='70'>";
              }
              ?>
              <br><br>

              <!-- Image Controller -->
              <input type="file" name="image">
              <br><br>

              <!-- Update Button -->
              <input type="submit" value="Update Record" name="UpdateBtn" class="btn btn-success btn-block">

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
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $OldImage = $_POST['OldImage'];

      //   For Image
        $image_name = $_FILES['image']['name'];   //actual name
        $image_temp_name = $_FILES['image']['tmp_name'];  //temporary name
        $image_type = $_FILES['image']['type'];   //image format
        $image_size = $_FILES['image']['size'];  //image size

        if(is_uploaded_file($_FILES['image']['tmp_name']))
        {
            if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
          {
              if($image_size<=1000000)
              {
                //   Storing a real location of our images folder in folder variable along with image name
                  $folder = "images/" . $image_name;
                  $query = "update USERS set NAME='$name',AGE='$age',GENDER='$gender',CITY='$city',EMAIL='$email',IMAGE_PATH='$folder' where ID='$id'";
                  $exec = mysqli_query($con,$query);
                  if($exec==true)
                  {
                    echo "<script>
                    swal.fire({
                      title: 'Updated Successfully!',
                      text: 'Record has been updated',
                      icon: 'success',
                      confirmButtonColor: 'blue',
                      timer: '2000'
                    }).then(function() {
                      window.location.href='Retrieval.php';
                    });
                    </script>";
                    move_uploaded_file($image_temp_name,$folder);
                    unlink($OldImage);
                  }
                  else
                  {
                    echo "<script>
                    swal.fire({
                      title: 'Updation Failed!',
                      text: 'Data not updated',
                      icon: 'error',
                      confirmButtonColor: 'blue'
                    });
                    </script>";
                  }
              }
              else
              {
                echo "<script>
                    swal.fire({
                      title: 'Image Size is too big!',
                      text: 'Image size should be less than 1MB',
                      icon: 'error',
                      confirmButtonColor: 'blue'
                    });
                    </script>";
              }
          }
          else
          {
            echo "<script>
                    swal.fire({
                      title: 'Invalid Format!',
                      text: 'Image format not supported',
                      icon: 'error',
                      confirmButtonColor: 'blue'
                    });
                    </script>";
          }
        }
        else
        {
        $query = "update USERS set NAME='$name',AGE='$age',GENDER='$gender',CITY='$city',EMAIL='$email' where ID='$id'";
        $exec = mysqli_query($con,$query);
        if($exec==true)
        {
          echo "<script>
          swal.fire({
            title: 'Updated Successfully!',
            text: 'Record has been updated',
            icon: 'success',
            confirmButtonColor: 'blue',
            timer: '2000'
          }).then(function() {
            window.location.href='Retrieval.php';
          });
          </script>";
        }
        else
        {
          echo "<script>
          swal.fire({
            title: 'Updation Failed!',
            text: 'Data not updated',
            icon: 'error',
            confirmButtonColor: 'blue',
            timer: '2000'
          });
          </script>";
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