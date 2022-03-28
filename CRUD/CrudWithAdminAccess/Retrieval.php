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
      

<?php
include('dbConnection.php');
session_start();
if($_SESSION['username']==null)
{
   header('location:Login.php');
}


$query = "select * from USERS";
if(isset($_POST['btnSearch']))
{
    $searchBar = $_POST['searchBar'];
    $select = $_POST['select'];
    if($select=="ID")
    {
      $query = "select * from USERS where ID='$searchBar'";
    }
    else if($select=="NAME")
    {
      $query = "select * from USERS where NAME like '$searchBar%'";
    }
    else if($select=="AGE")
    {
      $query = "select * from USERS where AGE='$searchBar'";
    }
    else if($select=="GENDER")
    {
      $query = "select * from USERS where GENDER='$searchBar'";
    }
    else if($select=="CITY")
    {
      $query = "select * from USERS where CITY='$searchBar'";
    }
}




$result = mysqli_query($con,$query);
$totalRows = mysqli_num_rows($result);


if($totalRows==null)
{
  echo "No Rows Found";
}
else
{
?>

<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-8">

            <form action="" method="post">

                <input type="text" name="searchBar" placeholder="Search here" class="form-control">

                <select name="select" class="form-control">

                    <option value="">Search By</option>
                    <option value="ID">ID</option>
                    <option value="NAME">NAME</option>
                    <option value="AGE">AGE</option>
                    <option value="GENDER">GENDER</option>
                    <option value="CITY">CITY</option>
                </select>
                <input type="submit" value="Search" class="btn btn-primary btn-block" name="btnSearch">
                <a href="Insert.php" class="btn btn-success btn-block">Add New Record</a>
            <a href="Logout.php" class="btn btn-danger btn-block">Logout</a>

            </form>
            <table class="table table-hover table-striped">
                <tr>
                    <th>IDs</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                while($data=mysqli_fetch_assoc($result))
                {
                    echo 
                    "<tr>
                    <td>".$data['ID']."</td>
                    <td>".$data['NAME']."</td>
                    <td>".$data['AGE']."</td>
                    <td>".$data['GENDER']."</td>
                    <td>".$data['CITY']."</td>    
                    <td><a class='btn btn-info' href='Update.php?id=$data[ID]'>Edit</a></td>
                    <td><a class='btn btn-danger' href='Delete.php?id=$data[ID]' onclick='return Confirmation()'>Delete</a></td>
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
    return confirm('Are you sure you want to delete this?');
}
</script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
