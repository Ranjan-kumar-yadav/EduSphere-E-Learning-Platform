<?php 
$id = $_REQUEST['id'];


 include "../config.php";

 $query = "DELETE FROM `courses` WHERE `id` ='$id'";
  
  $result = mysqli_query($con,$query);

  if($result>0)
	{
	
		echo "<script>window.location.assign('manage_course.php?msg=Course deleted successfully')</script>";
	}
	else{
		//echo mysqli_error($con);
		echo "<script>window.location.assign('manage_course.php?msg=Try Again!!!!')</script>";
	}





?>