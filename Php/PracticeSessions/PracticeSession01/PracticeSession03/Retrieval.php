<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- Data Table CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <!-- Data Table Style CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


    <!-- Sweet Alert2 Css File -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">

    <!-- Sweet Alert2 Js File -->
    <script src="dist/sweetalert2.all.min.js"></script>
    

</head>
<body>
    

<?php
      session_start();
      include('dbConnection.php');
      $query = "select * from USERS";
      $result = mysqli_query($con,$query);
      $totalRows = mysqli_num_rows($result);

      if($totalRows<=0)
      {
        echo "<script>alert('Table is empty! No Records Found :( ')</script>";
      }
      else
      {
          ?>
          
          <!-- Using Bootstrap Grid System -->
          <div class="container" style="margin-top:30px;">
              <div class="row">
                  <div class="col-md-10">

                  <!-- Add New Rocrd Button -->
                  <a href="Insert.php" class="btn btn-primary float-right">Add New Record</a>
                  <br><br>

                  <!-- Table -->
                  <table id="usman" class="table table-bordered table-hover table-striped">

                  <!-- <thead>
                      <tr>
                          <th colspan="9" class="text-center"> 
                              <h1>USERS DETAILS</h1> 
                         </th>

                     </tr>
                  </thead> -->

                  <thead>
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
                  </thead>
                  <tbody>
                  <?php
                  
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
                      <td> <a href='Update.php?id=$data[ID]' class='btn btn-success btn-lg'>Edit</a></td>
                      <td> <a href='Delete.php?id=$data[ID]' class='btn btn-danger btn-lg' onclick='Confirmation()'>Delete</a></td>
                      </tr>";
                  }       
                  ?>
                  </tbody>
                  </table>
                  </div>
              </div>
          </div>
          
          <?php
      }
      ?>

      <?php
    //   For showing Sweet Alert 2 popup box after deleting a row
      if(isset($_SESSION['del']))
      {
          echo "<script>
          swal.fire({
              title: 'Deleted Successfully',
              text: 'Your record has been deleted',
              icon: 'success',
              showConfirmButton: false,
              timer: 1000
          }); 
          </script>";
          session_destroy();
      }
      ?>

      


    <!-- Confirmation popup before deleting the record  -->
    <script>
        function Confirmation()
        {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>


    


      <!-- Executing Data Table Function -->
      <script>
          $(document).ready(function() {
              $("#usman").dataTable();
          });
      </script>

</body>
</html>


    
    