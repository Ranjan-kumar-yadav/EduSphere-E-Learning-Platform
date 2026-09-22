<?php 
$id = $_REQUEST['id'];

$status = "Rejected";
 include "../config.php";

  $query = "update `booking` set `status`='$status' where id='$id'";     
  
  $result = mysqli_query($con,$query);

  if($result>0)
	{
	
		echo "<script>window.location.assign('pending_booking.php?msg=status updated successfully')</script>";
	}
	else{
		//echo mysqli_error($con);
		echo "<script>window.location.assign('pending_booking.php?msg=Try Again!!!!')</script>";
	}





?>