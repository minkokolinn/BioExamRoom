<?php 
include('../connect.php');
	if (isset($_REQUEST['ac']) && isset($_REQUEST['aq'])) {
		$activeclass=$_REQUEST['ac'];
		$activequestion=$_REQUEST['aq'];
		$selectshowresult="SELECT showresult from result where class='$activeclass' and question_title='$activequestion'";
			    		$runselectshowresult=mysqli_query($connection,$selectshowresult);
			    		$countofshowresult=mysqli_num_rows($runselectshowresult);
			    		$status="";
			    		if ($countofshowresult>0) {
			    			for ($i=0; $i <$countofshowresult ; $i++) { 
			    				$dataofshowresult=mysqli_fetch_array($runselectshowresult);
			    				if ($dataofshowresult['showresult']=="") {
			    					$updatetoshow="UPDATE result set showresult='on' where class='$activeclass' and question_title='$activequestion'";
			    					$runupdatetoshow=mysqli_query($connection,$updatetoshow);
			    				}else{
			    					$updatetoshow="UPDATE result set showresult='' where class='$activeclass' and question_title='$activequestion'";
			    					$runupdatetoshow=mysqli_query($connection,$updatetoshow);
			    				}
			    			}
			    		}
			    		echo "<script>location='viewanswerpaperclass.php'</script>";
	}
 ?>