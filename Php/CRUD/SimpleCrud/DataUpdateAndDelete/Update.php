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

  /*
  Important Point To Be Noted:
  Since we know that GET method is used to show data in URL. And we used query string
  to get USER ID in URL after redirect to Update page. Now we use GET method to catch 
  that USER ID and store it in variable, named 'UpdateID'. Like this $UpdateId = $_GET['id'];

  =============================
  NULL COALESCING OPERATOR (??)
  =============================
  We will also use Null coalescing operator (??)
  Null coalescing operator is a logical operator that returns its right-hand side operand
  when its left-hand side operand is null or undefined, and otherwise returns its left-hand side operand.

  Purpose: The USER ID which shows in URL will be left empty after the record updated and it can cause of error
  in our php application therefore we use this operator to avoid error and id will get at least string "" value
  from right-hand side operand with the help of this operator (??) 
  */
  $UpdateId = $_GET['id']??"";

  $query = "select * from STUDENT where ID = '$UpdateId' ";
  $result = mysqli_query($con,$query);

  $data = mysqli_fetch_assoc($result);
  
  ?>


            <!--Update Form-->
<div class="container">
    <div class="row">
         <div class="col-md-5 col-md-offset-5">

<form action="Update.php" method="post">

<!--For Hidden ID-->
<input type="hidden" name="id" value="<?php echo $data['ID'];?>">
<!-- For Name -->
<label>Name</label>
<input type="text" name="name" class="form-control" value=" <?php echo $data['NAME'];?> ">
<br>

<!-- For Age -->
<label>Age</label>
<input type="text" name="age" class="form-control" value=" <?php echo $data['AGE'];?>">
<br>

<!-- For Gender -->
<label>Gender:</label>
<input type="text" name="gender" class="form-control" value="<?php echo $data['GENDER'] ?>">

<!-- For Fees -->
<label>Fees</label>
<input type="text" name="fees" class="form-control" value=" <?php echo $data['FEES'];?>">
<br>

<!-- For Button -->
<input type="submit" value="Update" name="btnUpdate" class="btn btn-success">
</form>
</div>
</div>
</div>

<?php

if(isset($_POST['btnUpdate']))
{
   //Recieving Update field's values in php variables to update it.
   $id = $_POST['id'];
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $fees = $_POST['fees'];

   $query = "update STUDENT set NAME = '$name', AGE='$age', GENDER='$gender', FEES='$fees' where ID='$id' ";
   $exec = mysqli_query($con,$query);
   if($exec==true)
   {
       echo "<script>alert('Data updated');
       window.location.href='Retrieval.php';
       </script>";
   }
   else
   {
    echo "<script>alert('Data not updated')</script>";

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