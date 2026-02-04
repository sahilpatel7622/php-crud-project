<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Select data</title>
</head>
<body>


<div class="container">
<table class="table">
  <thead>
    <tr>
      <th>No</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Number</th>
      <th>Password</th>
      <th>DOB</th>
      <th>DOJ</th>
      <th>Subject</th>
      <th>Address</th>
      <th>City</th>
      <th>Description</th>
      <th>Hobby</th>
      <th>Gender</th>
      <th>Image</th>
    </tr>
  </thead>
  <tbody>

<?php 
$con= mysqli_connect("localhost","root","", "school");
$no=0;
$select=mysqli_query($con,"SELECT * FROM `student`");
while($row = mysqli_fetch_array($select)) {
$no=$no+1;
?>

    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $row['First Name'];?></td>
      <td><?php echo $row['Last Name'];?></td>
      <td><?php echo $row['Email'];?></td>
      <td><?php echo $row['Number'];?></td>
      <td><?php echo $row['Password'];?></td>
      <td><?php echo $row['DOB'];?></td>
      <td><?php echo $row['DOJ'];?></td>
      <td><?php echo $row['Subject'];?></td>
      <td><?php echo $row['Address'];?></td>
      <td><?php echo $row['City'];?></td>
      <td><?php echo $row['Description'];?></td>
      <td><?php echo $row['Hobby'];?></td>
      <td><?php echo $row['Gender'];?></td>
      <td><img src="image/<?php echo $row['Image']; ?>" class="img-fluid" width="50px" ></td>
      <td>
        <a class="btn btn-success" href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
      </td>
    </tr>

<?php } ?>   
  </tbody>
</table>
</div>


<div class="container">
  <a class="btn btn-success" href="index.php">Add Data</a>
</div>



 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>
</html>