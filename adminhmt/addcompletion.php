<?php 
	include('../connect.php');
	include('aheader.php');

	if (isset($_REQUEST['chap'])) {
		$chaptertoinsert=$_REQUEST['chap'];
		
	}else{
		echo "<script>alert('You must type chapter number frist...')</script>";
		echo "<script>location='viewcompletion.php'</script>";
		
	}

	$countofcompletion="SELECT count(question) as count from completion";
	$runcountofcompletion=mysqli_query($connection,$countofcompletion);
	$dataofcompletion=mysqli_fetch_array($runcountofcompletion);
	$i=$dataofcompletion['count']+1;

	if (isset($_POST['btn_save'])) {
		$comquestion=$_POST['tacomques'];
		$comanswer=$_POST['tacomans'];

		$selectcompletion="SELECT count(question) as count1 from completion where question='$comquestion'";
		$runselectcompletion=mysqli_query($connection,$selectcompletion);
		$dataofcompletion1=mysqli_fetch_array($runselectcompletion);
		$countdata=$dataofcompletion1['count1'];
		if ($countdata==0) {
				$insertcompletion="INSERT into completion(question,answer,chapter) values ('$comquestion','$comanswer','$chaptertoinsert')";
				$runinsertcompletion=mysqli_query($connection,$insertcompletion);
				if ($runinsertcompletion) {
					echo "<script>alert('Successfully Added...')</script>";
					echo "<script>location='addcompletion.php?chap=$chaptertoinsert'</script>";
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
                        <h3>Add Completion Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
                        				<div class='col-lg-1 col-md-1'>
		                                    <div class='single_input'>
		                                        <input type='text' value='<?php echo $i; ?> .' name='tfnooftruefalse' autocomplete='off' required disabled>
		                                    </div>
		                                </div>
		                                <div class='col-lg-11 col-md-11'>
		                                    <div class='single_input'>
		                                        <textarea name='tacomques' id='' autocomplete="off" required></textarea>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                            	<div class='col-lg-1 col-md-1'>
		                                    <div class='single_input'>
		                                        
		                                    </div>
		                                </div>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='Blank Answer' name='tacomans' autocomplete='off'>
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
                                        <a href="viewcompletion.php" class="boxed-btn4">View All</a>
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