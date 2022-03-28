<?php

// Maintaining Database Connection
$con = mysqli_connect('localhost','root','','USMAN');

?>


  <!-- Validation For Database Connection  -->
      <?php
      if(!$con)
      {
         echo "<script>
         $(document).ready(function(){
             swal.fire({
                 title: 'Failed!',
                 icon: 'error',
                 text: 'Database connection failed',
                 confirmButtonColor: 'blue'
             });
         });
         </script>";
      }
      ?>
      
  