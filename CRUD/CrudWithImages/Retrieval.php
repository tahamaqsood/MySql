<?php
// Including Database Connection
include('dbConnection.php');

// Query
$query = "select * from EMPLOYEES";

// Executing query
$result = mysqli_query($con,$query);

// For Counting rows 
$totalRows = mysqli_num_rows($result);
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
      <div class="container" style="margin-top:20px;">
          <div class="row">
              <div class="col-md-9 offset-1">

              <a href="Insert.php" class="btn btn-primary float-right">Add New Record</a>
              <br><br>

                  <!-- Table -->
                  <table class="table table-bordred table-hover table-striped">
                      <tr>
                          <th>IDs</th>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>City</th>
                          <th>Email</th>
                          <th>Image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>

                      <?php
                      if($totalRows>0)
                      {
                        //   Converting Fetch data into Associative array
                          while($data=mysqli_fetch_assoc($result))
                          {
                              echo "<tr>
                              <td>".$data['ID']."</td>
                              <td>".$data['NAME']."</td>
                              <td>".$data['AGE']."</td>
                              <td>".$data['GENDER']."</td>
                              <td>".$data['CITY']."</td>
                              <td>".$data['EMAIL']."</td>
                              <td><img src='$data[IMAGE_PATH]' width='70' height='70'></td>
                              <td><a href='Update.php?id=$data[ID]' class='btn btn-success'>Edit</a></td>
                              <td><a href='Delete.php?id=$data[ID]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
      
                              </tr>";
                          }    
                      }
                      else
                      {
                        echo "<script>alert('Table is empty!')</script>";
                      }
                      ?>

                  </table>
              </div>
          </div>
      </div>


      <!-- Java Script Function for confirmation of record deletion -->
      <script>
          function Confirmation()
          {
              return confirm('Are you sure you want to delete this record?');
          }
      </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>