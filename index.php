<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	  <title>insert data</title>
</head>
<body>

<?php 
$con = mysqli_connect("localhost", "root", "", "school");
  if (isset(
      $_POST['submit'])) {
      
      $First_Name =$_POST['FirstName']; 
      $Last_Name =$_POST['LastName'];
      $Email =$_POST['Email'];
      $Number =$_POST['Number'];
      $Password =$_POST['Password'];
      $DOB =$_POST['DOB'];
      $DOJ =$_POST['DOJ'];
      $Subject =$_POST['Subject'];
      $Address =$_POST['Address'];
      $City =$_POST['City'];
      $Description =$_POST['Description'];

      $Hobby=implode(",",$_POST['Hobby']);
      $Gender =$_POST['Gender'];

      $Img = $_FILES['Image']['name'];
      $tmp_name = $_FILES['Image']['tmp_name'];
      move_uploaded_file($tmp_name, "image/".$Img);

      $ins= mysqli_query($con, "INSERT INTO `student`(`First Name`,`Last Name`,`Email`,`Number`,`Password`,`DOB`,`DOJ`,`Subject`,`Address`,`City`,`Description`,`Hobby`,`Gender`,`Image`)
      VALUES ('$First_Name','$Last_Name','$Email','$Number','$Password','$DOB','$DOJ','$Subject','$Address','$City','$Description','$Hobby','$Gender','$Img')");

    if ($ins) { 
      echo "Success";
    }
    else{
      echo("fail");
    }

    }
?>

<div class="container">
	<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>First Name</b></label>
      <input type="text" name="FirstName" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>Last Name</b></label>
      <input type="text" name="LastName" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
      <input type="email" name="Email" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>Number</b></label>
      <input type="text" name="Number" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>Password</b></label>
      <input type="password" name="Password" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>DOB</b></label>
      <input type="date" name="DOB" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>DOJ</b></label>
      <input type="date" name="DOJ" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>Subject</b></label>
      <input type="text" name="Subject" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>Address</b></label>
      <input type="text" name="Address" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"><b>City</b></label>
      <input type="text" name="City" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label"><b>Description</b></label>
      <textarea type="text" name="Description" class="form-control" id="exampleInputPassword1"></textarea>
    </div>

 <label for="exampleInputEmail1" class="form-label"><b>Hobby</b></label>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Hobby[]" value="cricket" id="flexCheckDefault" checked>
    <label class="form-check-label" for="flexCheckDefault">
    cricket
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Hobby[]" value="khokho" id="flexCheckChecked">
    <label class="form-check-label" for="flexCheckChecked">
    khokho
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Hobby[]" value="football" id="flexCheckChecked">
    <label class="form-check-label" for="flexCheckChecked">
    football
    </label>
  </div><br>

    <label for="exampleInputEmail1" class="form-label"><b>Gender</b></label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="Gender" value="male" id="flexRadioDefault1" checked>
    <label class="form-check-label" for="flexRadioDefault1">
    male  </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="Gender" value="female" id="flexRadioDefault2">
    <label class="form-check-label" for="flexRadioDefault2">
    female  </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="Gender" value="other" id="flexRadioDefault2">
    <label class="form-check-label" for="flexRadioDefault2">
    other  </label>
  </div><br>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b>Image</b></label>
    <input type="file" name="Image" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
  </div><br>

  <button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
  <a class="btn btn-info" href="select.php">view data</a>

  </form>
</div>

</body>
</html>