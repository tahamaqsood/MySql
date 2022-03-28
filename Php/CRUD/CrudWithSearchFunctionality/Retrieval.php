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
 //Including Database Connection
 include('dbConnection.php');

 //MySql query
 $query = "select * from STUDENT";


 //For Search Functionality
if(isset($_GET['btnSearch']))
{
   $SearchBar = $_GET['SearchBar'];
   $SearchBy = $_GET['SearchBy'];
   if($SearchBy=="id")
   {
       $query = "select * from STUDENT where ID = '$SearchBar'";
       $exec = mysqli_query($con,$query);
   }
   else if($SearchBy=="name")
   {
       $query = "select * from STUDENT where NAME like '$SearchBar%'";
       $exec = mysqli_query($con,$query);
   }
   else if($SearchBy=="age")
   {
       $query = "select * from STUDENT where AGE = '$SearchBar'";
       $exec = mysqli_query($con,$query);
   }
   else if($SearchBy=="gender")
   {
       $query = "select * from STUDENT where GENDER = '$SearchBar'";
       $exec = mysqli_query($con,$query);
   }
   else if($SearchBy=="fees")
   {
       $query = "select * from STUDENT where FEES = '$SearchBar'";
       $exec = mysqli_query($con,$query);
   }

}

//Method For executing mysql query and storing fetched data in result variable
 $result = mysqli_query($con,$query);

 //Counting number of rows exist in table
 $totalRows = mysqli_num_rows($result);
 if($totalRows==null)
 {
    echo "No Rows Found.!!
    <div class='container' style='margin-top:30px;'>
       <div class='row'>
           <div class='col-md-8'>

           <a href='Create.php' class='btn btn-success btn-block'>Add New Records</a>
           </div>
       </div>
   </div>";
 }
 else
 {
     //closing php tag here so we can create html table easily with the help of intellisense
   ?>

   <!-- Bootstrap grid system -->
   <div class="container" style="margin-top:30px;">
       <div class="row">
           <div class="col-md-8">

 
                 <!-- Form For Search Functionality With Dropdown List -->
           <form method="get">


               <!-- Search Bar -->
            <input type="text" name="SearchBar" placeholder="Search Here" class="form-control">


            <!-- Dropdwon List -->   
            <select name="SearchBy" class="form-control">


                <!-- Options -->
                <option value="select">Select</option>
                <option value="id"> Search By ID</option>
                <option value="name"> Search By Name</option>
                <option value="age"> Search By Age</option>
                <option value="gender"> Search By Gender</option>
                <option value="fees"> Search By Fees</option>
            </select>

            
              <!-- Search Button -->
              <input type="submit" value="Search" class="btn btn-info btn-block" name="btnSearch">

              <!-- Reset Button -->
              <a href="Retrieval.php" class="btn btn-danger btn-block">Reset</a>

              <!-- Button For Adding new Records -->
           <a href="Create.php" class="btn btn-success btn-block">Add New Records</a>

           
              <!-- 

                  Note: Short cut for creating drop down list = select>option*integer value
                  if you want 5 options in drop down list then write select>option.5

               -->

           </form> 

            
           <!-- Table -->
           <table class="table table-hover table-striped">
           <tr>
               <th>IDs</th>
               <th>Name</th>
               <th>Age</th>
               <th>Gender</th>
               <th>Fees</th>
               <th>Edit</th>
               <th>Delete</th>
           </tr>

           <!-- Opening php tag here to use while loop for fetching table records here. -->
           <?php

           //Converting result variable into associative array because result variable stores all the data in it.
           while($data = mysqli_fetch_assoc($result))
           {
               echo
               "<tr>
               <td>".$data['ID']."</td>
               <td>".$data['NAME']."</td>
               <td>".$data['AGE']."</td>
               <td>".$data['GENDER']."</td>
               <td>".$data['FEES']."</td>
               <td><a class='btn btn-info' href='Update.php?id=$data[ID]'>Edit</a></td>
               <td><a class='btn btn-danger' href='Delete.php?id=$data[ID]' onclick='return Confirmation()'>Delete</a></td>
               </td>";
           }
        }
        //We used query string in Edit and Delete button to get User ID through URL.
           ?>

           </table>
           </div>
       </div>
   </div>
 
   <!-- Using Confirm method of Javascript for prompt function -->
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
