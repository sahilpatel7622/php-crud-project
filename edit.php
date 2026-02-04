<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Edit data</title>
</head>
<body>

<?php 
    $con= mysqli_connect("localhost","root","","school");
    $id=$_GET['id'];
    $select= mysqli_query($con, "SELECT * FROM `student` WHERE id='$id'");
    $row = mysqli_fetch_array($select);
?>
<?php 
    if (isset($_POST['submit'])) {


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

$ins= mysqli_query($con,"UPDATE `student` SET `First Name`='$First_Name',`Last Name`='$Last_Name',`Email`='$Email',`Number`='$Number',`Password`='$Password',`DOB`='$DOB',`DOJ`='$DOJ',`Subject`='$Subject',`Address`='$Address',`City`='$City',`Description`='$Description',`Gender`='$Gender',`Hobby`='$Hobby',`Image`='$Img' WHERE id = '$id'");

  if($ins){
    header("location:select.php");
  }
  else{
    echo "fail";
  }
  }
?>

<div class="container">
  <a type="submit" href="select.php" class="btn btn-success btn-lg " name="submit">View</a>
  <form method="POST" enctype="multipart/form-data"><br>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b>First Name</b></label>
    <input type="text" name="FirstName" class="form-control" id="exampleInputEmail1" value="<?php echo $row['First Name'];?>" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Last Name</b></label>
    <input type="text" name="LastName" class="form-control" value="<?php echo $row['Last Name'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Email</b></label>
    <input type="email" name="Email" class="form-control" value="<?php echo $row['Email'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Number</b></label>
    <input type="text" name="Number" class="form-control" value="<?php echo $row['Number'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
    <input type="password" name="Password" class="form-control" value="<?php echo $row['Password'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>DOB</b></label>
    <input type="date" name="DOB" class="form-control" value="<?php echo $row['DOB'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>DOJ</b></label>
    <input type="date" name="DOJ" class="form-control" value="<?php echo $row['DOJ'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Subject</b></label>
    <input type="text" name="Subject" class="form-control" value="<?php echo $row['Subject'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Address</b></label>
    <input type="text" name="Address" class="form-control" value="<?php echo $row['Address'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>City</b></label>
    <input type="text" name="City" class="form-control" value="<?php echo $row['City'];?>" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Description</b></label>
    <textarea type="text" name="Description" value="<?php echo $row['Description'];?>" class="form-control" id="exampleInputPassword1"></textarea>
  </div>

   <label for="exampleFormControlTextarea1" class="form-label"><b>Gender</b></label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="Gender" value="Male" <?php if($row['Gender'] == "male") { echo "checked='checked'"; } ?> id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">
      Male
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="Gender"  value="Female" <?php if($row['Gender'] == "female") { echo "checked='checked'"; } ?> id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    Female
    </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="Gender" value="other" <?php if($row['Gender'] == "other") { echo "checked='checked'"; } ?> id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
   other
  </label>
</div>

<?php
  $chk=explode(",",$row['Hobby']);
?>
    <label for="exampleInputEmail1" class="form-label"><b>Hobby</b></label>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="Hobby[]" value="cricket" <?php if(in_array("cricket",$chk)) { echo "checked='checked'"; } ?> id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
      cricket  </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="Hobby[]" value="football" <?php if(in_array("football",$chk))  {echo "checked='checked'"; } ?>  id="flexCheckChecked">
      <label class="form-check-label" for="flexCheckChecked">
      football  </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="Hobby[]" value="khokho"  <?php if(in_array("khokho",$chk)) { echo "checked='checked'"; } ?>  id="flexCheckChecked">
      <label class="form-check-label" for="flexCheckChecked">
      khokho  </label>
    </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"><b>Image</b></label>
        <input type="file" name="Image" value="<?php echo $row['Image'];?>" class="form-control" id="exampleInputPassword1">
      </div><br>
 
  <button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
</form>
</div>

</body>
</html>