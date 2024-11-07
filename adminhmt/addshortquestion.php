<?php 
	include('../connect.php');
	include('aheader.php');

	if (isset($_REQUEST['chap'])) {
		$chaptertoinsert=$_REQUEST['chap'];
		
	}else{
		echo "<script>alert('You must type chapter number frist...')</script>";
		echo "<script>location='viewshortquestion.php'</script>";
		
	}

	$countofshortquestion="SELECT count(question) as count from shortquestion";
	$runcountofshortquestion=mysqli_query($connection,$countofshortquestion);
	$dataofshortquestion=mysqli_fetch_array($runcountofshortquestion);
	$i=$dataofshortquestion['count']+1;

	if (isset($_POST['btn_save'])) {
		$shortquestion=$_POST['tashortques'];

		$selectshortquestion="SELECT count(question) as count1 from shortquestion where question='$shortquestion'";
		$runselectshortquestion=mysqli_query($connection,$selectshortquestion);
		$dataofshortquestion1=mysqli_fetch_array($runselectshortquestion);
		$countdata=$dataofshortquestion1['count1'];
		if ($countdata==0) {
				$insertshortquestion="INSERT into shortquestion(question,chapter) values ('$shortquestion','$chaptertoinsert')";
				$runinsertshortquestion=mysqli_query($connection,$insertshortquestion);
				if ($runinsertshortquestion) {
					echo "<script>alert('Successfully Added...')</script>";
					echo "<script>location='addshortquestion.php?chap=$chaptertoinsert'</script>";
				}else{
					echo "<script>alert('Error in inserting into database!')</script>";
				}
		}else{
			echo "<script>alert('This question is already existed!')</script>";
		}
	}
 ?>
  <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="contact_join">
                        <h3>Add Short Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
                        				<div class='col-lg-1 col-md-1'>
		                                    <div class='single_input'>
		                                        <input type='text' value='<?php echo $i; ?> .' name='tfnooftruefalse' autocomplete='off' required disabled>
		                                    </div>
		                                </div>
		                                <div class='col-lg-11 col-md-11'>
		                                    <div class='single_input'>
		                                        <textarea name='tashortques' id='' autocomplete="off" required></textarea>
		                                    </div>
		                                </div>
		                            </div>
                            <div class="row">
                            	<div class="col-lg-2 col-md-2" style="margin-bottom: 20px;">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" value="Save" name="btn_save">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="submit_btn">
                                        <a href="viewshortquestion.php" class="boxed-btn4">View All</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
	include('afooter.php');
 ?>