<?php 
	include('../connect.php');
	if (isset($_REQUEST['ac']) && isset($_REQUEST['aq']) && isset($_REQUEST['stuid'])) {
		$activeclass=$_REQUEST['ac'];
		$activequestion=$_REQUEST['aq'];
		$activestudentid=$_REQUEST['stuid'];		

		$deleteanswerpaper="DELETE from answerpaper where class='$activeclass' and question_title='$activequestion' and student_id='$activestudentid'";
		$rundeleteanswerpaper=mysqli_query($connection,$deleteanswerpaper);
		if ($rundeleteanswerpaper) {
			echo "<script>alert('Deleted successfully...')</script>";
			echo "<script>location='viewanswerpaperstudent.php?ac=$activeclass&&aq=$activequestion'</script>";
		}else{
			mysqli_error($connection);
		}
	}
 ?>