<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    

<!-- Short cuts 

Write Form and press double tab           (For Form)
Write Label and press double tab          (For Label)
Write input:text and press double tab     (For Text field)
Write input:number and press double tab   (For Number field)
Write input:password and press double tab (For Password field)
Write input:submit and press double tab   (For Button)
Write input:radio and press double tab    (For Radio Button)
Write input:search and press double tab   (For Search bar)

-->


<!-- HTML FORM -->

<!-- For Adjusting Html form we use 3 divs -->

<div class="container">

    <div class="row">

        <div class="col-md-5 col-md-offset-12" align:center>

<form action="Insert.php" method="post" style="margin-top:20px; ">
<!-- For Name -->
<label>Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter Name">
<br>


<!-- For Age -->
<label>Age</label>
<input type="text" name="age" class="form-control" placeholder="Enter Age">
<br>


<!-- For Gender -->
<label>Gender:</label>
<!-- Radio Button For Male -->
<label>Male</label>
<input type="radio" name="gender" value="Male">

<!-- Radio Button For Female -->
<label>Female</label>
<input type="radio" name="gender" value="Female">
<br>


<!-- For Fees -->
<label>Fees</label>
<input type="text" name="fees" class="form-control" placeholder="Enter Fees">
<br>


<!-- For Button -->
<input type="submit" value="Insert Record" name="btnSubmit" class="btn btn-success btn-block">
</form>

</div>
</div>
</div>

<!-- Note: Radio button can send values in database only if you give value in 'value attribute' existing in Radio button field
just like this <input type="radio" value="AnyValue">  -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>