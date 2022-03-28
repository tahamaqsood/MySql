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


//Query for fetching rows data.
$query = "select * from STUDENT";


/*mysqli_query(); method will send select query into our specified database which is stored in $con variable.
$rows variable will recieve all rows of table.*/
$rows = mysqli_query($con,$query);

//For counting number of rows. 
$totalRows = mysqli_num_rows($rows);


/*
Note: mysqli_num_rows(); method returns integer value,
therefore we are using this method to count total number of rows of table.
*/


if($totalRows!=null)
{
   //Closing php tag here so we can Create HTML Table
    ?>
    
    

    <!-- HTML Table -->
    <table class="table table-hover table-striped">
     
    <tr>
      
    <th> IDs </th>
    <th> Name </th>
    <th> Age </th>
    <th> Gender </th>
    <th> Fees </th>
    <th> Edit </th>
    <th> Delete </th>

    </tr>

    <?php
    //Now we will convert rows data into Associative Array through mysqli_fetch_assoc(); method
    while($data=mysqli_fetch_assoc($rows))
    {

  /*

   IMPORTANT POINTS TO BE NOTED ABOUT ASSOCIATIVE ARRAY:

   => Associative arrays are used to store key value pairs.

   => Always call associative array with 'Key'. 

   => Associative arrays use named keys that you assign to them.

   => For Example: echo $data['ID']." ".$data['Name']." ".$data['Age']." ".$data['Gender'];

 */
       echo  "<tr>

        <td>".$data['ID']."</td>
        <td>".$data['NAME']."</td>
        <td>".$data['AGE']."</td>
        <td>".$data['GENDER']."</td>
        <td>".$data['FEES']."</td>";

        //For Update
        echo "<td><a class='btn btn-info' href='Update.php?id=$data[ID]'>Edit</a> </td>";

        //For Delete
        echo "<td><a class='btn btn-danger' href='Delete.php?id=$data[ID]' onclick='return Confirmation()'>Delete</a></td>
        
             </tr>";

      /*

      ===========
      FOR UPDATE:
      ===========

      => We used bootstrap button class in anchor tag to make it button.

      => We used query string in anchor tag to get User ID and sent it to Update page.

      Purpose: We used query string to display USER ID in URL so we can store it in variable
      with the help of GET method. And later we will fetch all data of that USER ID and update
      any field easily.




      ===========
      FOR DELETE:
      ===========

      => We used bootstrap button class in anchor tag to make it button.

      => We used query string in anchor tag to get User ID and sent it to Delete page.

      Purpose: We used query string to display USER ID in URL so we can store it in variable
      with the help of GET method. And later we will delete record of that USER ID by executing
      delete query in (Delete.php) page.

      */
    }
    
}
else
{
    echo "No Rows Found!!";
}

?>
</table>

   <!--Using Java Script For Delete Button-->
   <script>
     function Confirmation()
     {
       return confirm('Are you sure you want to delete this record?');
     }
/*

===============
Confirm Method:
===============
We use confirm method which contain boolean values. It will return either true or false
Also by using this method it will automatically create 2 buttons for itself to return true or false values.
Button(1): Cancel which returns False
Button(2): OK which returns True

Note: If you click on Ok button, it will return true value and pass it to 'onclick' event & then it will send 
query string in Delete.php page. And the code we wrote in Delete.php page would execute.

But if you click on Cancel button, it will pass false value to 'onclick' event and thus it would not send
query string to Delete.php page.

*/

   </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>