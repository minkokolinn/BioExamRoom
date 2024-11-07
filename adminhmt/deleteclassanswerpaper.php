<?php 
	include('../connect.php');
	if (isset($_REQUEST['ac']) && isset($_REQUEST['aq'])) {
		$activeclass=$_REQUEST['ac'];
		$activequestion=$_REQUEST['aq'];	

		$deleteanswerpaper="DELETE from answerpaper where class='$activeclass' and question_title='$activequestion'";
		$rundeleteanswerpaper=mysqli_query($connection,$deleteanswerpaper);
		if ($rundeleteanswerpaper) {
			echo "<script>alert('Deleted successfully...')</script>";
			echo "<script>location='viewanswerpaperclass.php'</script>";
		}else{
			mysqli_error($connection);
		}
	}
 ?>