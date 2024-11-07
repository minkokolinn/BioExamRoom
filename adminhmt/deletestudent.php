<?php 
	include('../connect.php');
	if (isset($_REQUEST['stucode'])) {
		$stucode=$_REQUEST['stucode'];
		$deletestudent="DELETE from student where code_number='$stucode'";
		$rundeletestudent=mysqli_query($connection,$deletestudent);
		if ($rundeletestudent) {
			echo "<script>alert('This student was deleted successfully')</script>";
			echo "<script>window.location='viewstudent.php'</script>";
		}else{
			mysqli_error($connection);
			echo "<script>window.alert('Run delete feedback query failed!')</script>";
			echo "<script>window.location='viewstudent.php'</script>";
		}
	}
 ?>