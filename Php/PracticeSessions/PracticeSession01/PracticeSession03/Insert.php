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
      

      <!-- Using Bootstrap Grid System -->
      <div class="container" style="margin-top:100px;">
          <div class="row">
              <div class="col-md-5 offset-2" style="-webkit-box-shadow: 0px 0px 8px 3px rgba(0,0,0,0.71);
-moz-box-shadow: 0px 0px 8px 3px rgba(0,0,0,0.71);
box-shadow: 0px 0px 8px 3px rgba(0,0,0,0.71);">

              <!-- Insert Form -->
              <form action="" method="post" enctype="multipart/form-data">
              <br>

              <!-- Form Heading -->
              <h1 style="font-weight:900;" class="text-center" colspan="5">ADD NEW RECORD</h1>

              <!-- Name -->
              <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
              <br>

              <!-- Age -->
              <input type="number" name="age" placeholder="Enter Age" class="form-control" required>
              <br>

              <!-- Gender -->
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
                  <option value="Multan">Multan</option>
              </select>
              <br>

              <!-- Email With Regular Expression -->
              <input type="text" name="email" placeholder="Enter Email" class="form-control" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
              <br>

              <!-- Image Controller -->
              <input type="file" name="image" required>
              <br><br>

              <!-- Insert Button -->
              <input type="submit" value="Add Record" name="InsertBtn" class="btn btn-primary btn-block">

              <!-- View Records Button -->
              <a href="Retrieval.php" class="btn btn-info btn-block">View Records</a>
              <br>

              </form> 
              </div>
          </div>
      </div>

      <?php
      include('dbConnection.php');

      if(isset($_POST['InsertBtn']))
      {
          $name = $_POST['name'];
          $age = $_POST['age'];
          $gender = $_POST['gender'];
          $city = $_POST['city'];
          $email = $_POST['email'];

        //   For Image
          $image_name = $_FILES['image']['name'];   //actual name
          $image_temp_name = $_FILES['image']['tmp_name'];  //temporary name
          $image_type = $_FILES['image']['type'];   //image format
          $image_size = $_FILES['image']['size'];  //image size


          if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
          {
              if($image_size<=1000000)
              {
                //   Storing a real location of our images folder in folder variable along with image name
                  $folder = "images/" . $image_name;
                  $query = "insert into USERS values(Null,'$name','$age','$gender','$city','$email','$folder')";
                  $exec = mysqli_query($con,$query);
                  if($exec==true)
                  {
                    echo "<script>
                    swal.fire({
                      title: 'Data Added Successfully!',
                      text: 'New Record has been created',
                      icon: 'success',
                      confirmButtonColor: 'blue',
                      timer: '2000'
                    });
                    </script>";
                    move_uploaded_file($image_temp_name,$folder);
                  }
                  else
                  {
                    echo "<script>
                    swal.fire({
                      title: 'Data Creation Failed!',
                      text: 'Data Not Added',
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
      ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>