<!doctype html>
<html lang="en">
  <head>
    <title>Retrieval</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      

  <?php
  
  include('dbConnection.php');

  $query = "select * from USERS";

  if(isset($_POST['btnSearch']))
  {
      $SearchBar = $_POST['SearchBar'];
      $SearchBy = $_POST['SearchBy'];

      if($SearchBy=="ID")
      {
          $query = "select * from USERS where ID='$SearchBar'";
          $result = mysqli_query($con,$query);
      }
      else if($SearchBy=="Name")
      {
        $query = "select * from USERS where NAME like '$SearchBar%'";
        $result = mysqli_query($con,$query);
      }
      else if($SearchBy=="Age")
      {
        $query = "select * from USERS where AGE='$SearchBar'";
        $result = mysqli_query($con,$query);
      }
      else if($SearchBy=="Gender")
      {
        $query = "select * from USERS where GENDER='$SearchBar'";
        $result = mysqli_query($con,$query);
      }
      else if($SearchBy=="City")
      {
        $query = "select * from USERS where CITY='$SearchBar'";
        $result = mysqli_query($con,$query);
      }
      else if($SearchBy=="Email")
      {
        $query = "select * from USERS where EMAIL='$SearchBar'";
        $result = mysqli_query($con,$query);
      }

  }

  $result = mysqli_query($con,$query);
  $totalRows = mysqli_num_rows($result);
  ?>

<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-10">

        <a href="Insert.php" class="btn btn-info btn-block">Add New Record</a>

        <form action="" method="post">

        <input type="text" name="SearchBar" class="form-control" placeholder="Search Here">
        <select name="SearchBy" class="form-control">
            <option value="">Search By</option>
            <option value="ID">ID</option>
            <option value="Name">Name</option>
            <option value="Age">Age</option>
            <option value="Gender">Gender</option>
            <option value="City">City</option>
            <option value="Email">Email</option>
        </select>
        <input type="submit" value="Search" name="btnSearch" class="btn btn-primary btn-block">
        </form>

  <table class="table table-hover table-striped">
      <tr>
          <th>IDs</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>City</th>
          <th>Email</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>

<?php

if($totalRows<=0)
{
    echo "No Rows Found";
}
else
{
    while($data=mysqli_fetch_assoc($result))
    {
        echo "<tr>
       <td>".$data['ID']."</td>
       <td>".$data['NAME']."</td>
       <td>".$data['AGE']."</td>
       <td>".$data['GENDER']."</td>
       <td>".$data['CITY']."</td>
       <td>".$data['EMAIL']."</td>
       <td><a href='Update.php?id=$data[ID]' class='btn btn-success'>Edit</a></td>
       <td><a href='Delete.php?id=$data[ID]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
       </tr>";
    }
    
}

?>

  </table>
  </div>
    </div>
</div>


  <script>
      function Confirmation()
      {
          return confirm('Are you sure you want to delete this record?');
      }
  </script>

  </body>
</html>