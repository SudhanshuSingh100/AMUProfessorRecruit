<?php
session_start();
include 'include/connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php include 'include/navbar.php'; ?>
  <br>
  <center><div class="badge " style="padding:5px 400px 5px 400px;box-shadow: 0px 0px 15px grey;border-bottom:none;z-index: 1"><h4><b>Received Request</b></h4></div></center>
  <div style="border-radius:15px;box-shadow: 0px 0px 10px black">
  	<table class="table table-bordered table-hover " style="border-radius:10px;background-color: transparent;" >
  	<tr>
  		<th>S.No.</th>
  		<th>Candidate Name</th>
  		<th>Father's Name</th>
  		<th>E-mail ID</th>
  		<th>Nationality</th>
  		<th>View</th>
  		<th>Action</th>
  	</tr>
  	<?php
  	$sql="SELECT tbluser.userEmail,tblparta.cName,tblparta.cFatherName,tblparta.cNationality FROM tblparta,tbluser WHERE tbluser.userID=tblparta.userID";
  		$dat=$con->query($sql);
  		$sNo=1;
  		while ($row=$dat->fetch_assoc()) {
  			echo "<tr>
  				<td>".($sNo++)."</td>
  				<td>".$row['cName']."</td>
  				<td>".$row['cFatherName']."</td>
  				<td>".$row['userEmail']."</td>
  				<td>".$row['cNationality']."</td>
  				<td><button class='btn btn-sm btn-primary'>Full Details</button></td>
  				<td><button class='btn btn-sm btn-success'>Approve</button></td>
  			</tr>";
  		}
  	?>
  </table>	
  </div>
  
</body>
</html>