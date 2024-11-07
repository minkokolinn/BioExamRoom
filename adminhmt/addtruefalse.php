<?php 
	include('../connect.php');
	include('aheader.php');

	if (isset($_REQUEST['chap'])) {
		$chaptertoinsert=$_REQUEST['chap'];
		
	}else{
		echo "<script>alert('You must type chapter number frist...')</script>";
		echo "<script>location='viewtruefalse.php'</script>";
		
	}

	$countoftruefalse="SELECT count(question) as count from truefalse";
	$runcountoftruefalse=mysqli_query($connection,$countoftruefalse);
	$dataoftruefalse=mysqli_fetch_array($runcountoftruefalse);
	$i=$dataoftruefalse['count']+1;

	if (isset($_POST['btn_save'])) {
		$tfquestion=$_POST['tatfques'];
		$tfanswer=$_POST['rdotfans'];

		$selecttruefalse="SELECT count(question) as count1 from truefalse where question='$tfquestion'";
		$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
		$dataoftruefalse1=mysqli_fetch_array($runselecttruefalse);
		$countdata=$dataoftruefalse1['count1'];
		if ($countdata==0) {
			$inserttruefalse="INSERT into truefalse(question,answer,chapter) values ('$tfquestion','$tfanswer','$chaptertoinsert')";
			$runinserttruefalse=mysqli_query($connection,$inserttruefalse);
			if ($runinserttruefalse) {
				echo "<script>alert('Successfully Added...')</script>";
				echo "<script>location='addtruefalse.php?chap=$chaptertoinsert'</script>";
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
                        <h3>Add TRUE/FALSE Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
                        				<div class='col-lg-1 col-md-1'>
		                                    <div class='single_input'>
		                                        <input type='text' value='<?php echo $i; ?> .' name='' autocomplete='off' disabled required>
		                                    </div>
		                                </div>
		                                <div class='col-lg-9 col-md-9'>
		                                    <div class='single_input'>
		                                        <textarea name='tatfques' id='' required></textarea>
		                                    </div>
		                                </div>
		                                <div class='col-lg-2 col-md-2 mb-4'>
		                                        <input type='radio' name='rdotfans' autocomplete='off' value='TRUE' required>&nbsp;TRUE&nbsp;&nbsp;
		                                        <input type='radio' name='rdotfans' autocomplete='off' value='FALSE' required>&nbsp;FALSE
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
                                        <a href="viewtruefalse.php" class="boxed-btn4">View All</a>
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