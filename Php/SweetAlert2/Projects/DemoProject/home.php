<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- Sweet Alert2 css file -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
  </head>
  <body>

      
                   <!-- Button -->
    <input type="submit" value="Click Me" class="btn btn-info" id="btn">


    
              <!-- Sweet Alert2 JS file -->
     <script src="dist/sweetalert2.all.min.js"></script>


     <!-- Jquery Code -->
     <script>
         $(document).ready(function () {
             $("#btn").click(function(){

                //  Using Swal function provided by Sweet alert2
                 swal.fire({

                    //  Configuration Keys/properties of Swal function
                     title:"Welcome",
                     text: "Welcome to sweet alert2",
                     icon: "success",
                     backdrop: "grey"
                 });
             });
         });
     </script>

  </body>
</html>