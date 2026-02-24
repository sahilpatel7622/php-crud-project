<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php 
  $con= mysqli_connect("localhost","root","", "login2");
  if (isset(
      $_POST['submit'])) {
      
      $Name =$_POST['Name']; 
      $Email =$_POST['Email']; 
      $Number =$_POST['Number']; 
      $Password =$_POST['Password'];

      $ins= mysqli_query($con, "INSERT INTO `user`(`Name`,`Email`,`Number`,`Password`)
      VALUES ('$Name','$Email','$Number','$Password')");

    if ($ins) { 
      echo "Register Successful...";
    }
    else{
      echo "Register fail...";
    }

    }
?>

<div class="form-wrapper">
  <form action="#" method="post">
    <h1><center>Register</center></h1>
    
    <div class="form-item">
        <input type="text" name="Name"placeholder="Name" autofocus required></input>
    </div>
    <div class="form-item">
        <input type="email" name="Email"placeholder="Email" autofocus required></input>
    </div>
    <div class="form-item">
        <input type="password" name="Number" placeholder="Number" required></input>
    </div>
    <div class="form-item">
        <input type="password" name="Password" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
        <input type="submit" class="button" title="Log In" name="submit" value="Register"></input>
    </div>
    <div>
        <center><p>Are You Already Register ? <a href="index.php">Login</a></p></center>
    </div>
  </form>
</div>

</body>
</html>