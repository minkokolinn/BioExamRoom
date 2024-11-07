<?php 
	include('../connect.php');
	if (isset($_REQUEST['ac']) && isset($_REQUEST['aq'])) {
		$activeclass=$_REQUEST['ac'];
		$activequestion=$_REQUEST['aq'];
		$deleteresultofwholeclass="DELETE from result where class='$activeclass' and question_title='$activequestion'";
		$rundelte=mysqli_query($connection,$deleteresultofwholeclass);
		if ($rundelte) {
			echo "<script>location='viewanswerpaperclass.php'</script>";
		}
	}
 ?>