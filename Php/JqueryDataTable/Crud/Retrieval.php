<!doctype html>
<html lang="en">
  <head>
    <title>Jquery Data Table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Adding Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Adding jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 

    <!-- Css Files of Jquery Data Table -->
    <link rel="stylesheet" href="DataTables-1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="DataTables-1.11.4/css/dataTables.bootstrap4.min.css">

</head>
  <body>

  <?php
  include('dbConnection.php');
  $query = "select * from USERS";
  $result = mysqli_query($con,$query);
  $totalRows = mysqli_num_rows($result);

  if($totalRows>0)
  {
      ?>

      <!-- Bootstrap Grid System -->
      <div class="container" style="margin-top:30px;">
          <div class="row">
              <div class="col-md-8">


          <!-- Table Start -->
          <table id="MyTable" class="table table-bordered table-hover table-striped">

          <!-- Table Heading Start -->
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>City</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <!-- /Table Heading End -->


          <!-- Table Body Start -->
          <tbody>
              <?php
              while($data = mysqli_fetch_assoc($result))
              {
                  echo "<tr>
                  <td>".$data['ID']."</td>
                  <td>".$data['NAME']."</td>
                  <td>".$data['AGE']."</td>
                  <td>".$data['GENDER']."</td>
                  <td>".$data['CITY']."</td>
                  <td>".$data['EMAIL']."</td>
                  <td> <a href='Update.php?id=$data[ID]' class='btn btn-info'>Edit</a> </td> 
                  <td> <a href='Delete.php?id=$data[ID]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a> </td>
                  </tr>";
              }
              ?>
          </tbody>
          <!-- /Table Body End -->

      </table>
      <!-- /Table End -->
          </div>
      </div>
      </div>
      
      <?php
  }

  ?>
  
  <!-- JS Function for confirmation before deleting records -->
<script>
    function Confirmation()
    {
        return confirm('Are you sure you want to delete this record?');
    }
</script>


<!-- Js Files of Jquery Data Table -->
<script src="DataTables-1.11.4/js/jquery.dataTables.min.js"></script>
<script src="DataTables-1.11.4/js/dataTables.bootstrap4.min.js"></script>


<!-- Calling JQuery Data Table Function -->
<script>
    $(document).ready(function() {
        $("#MyTable").dataTable();
    });
</script>
  
  </body>
</html>