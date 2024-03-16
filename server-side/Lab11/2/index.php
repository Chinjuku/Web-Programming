<?php
    include './database.php';
    error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<form class="container my-4" action="managedata.php" method="POST">
    <h1>Customer Information</h1>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">CustomerID</label>
      <input type="text" class="form-control" name='CustomerId' id="validationDefault01" value="<?php echo $_COOKIE['CustomerId'] ?>" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Firstname</label>
      <input type="text" class="form-control" name="FirstName" id="validationDefault01" value="<?php echo $_COOKIE['FirstName']  ?>" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Lastname</label>
      <input type="text" class="form-control" name="LastName" id="validationDefault02" value="<?php echo $_COOKIE['LastName'] ?>" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Address</label>
      <textarea type="text" class="form-control" name="Address" id="validationDefault03" value="<?php echo $_COOKIE['Address'] ?>" ><?php echo $_COOKIE['Address'] ?></textarea>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Email</label>
      <input type="email" class="form-control" name="Email" id="validationDefault04" value="<?php echo $_COOKIE['Email'] ?>" >
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Phone</label>
      <input type="text" class="form-control" name="Phone" id="validationDefault05" value="<?php echo $_COOKIE['Phone'] ?>" >
    </div>
  </div>
  <button class="btn btn-primary" name="action" value="save" type="submit">Save form</button>
  <button class="btn btn-success" name="action" value="load" type="submit">Show form</button>
  <button class="btn btn-warning" name="action" value="clear" type="submit">Clear form</button>
</form>
</body>
</html>