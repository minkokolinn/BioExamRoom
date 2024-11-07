<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['selectedshorttoedit'])) {
		$selectedid=$_REQUEST['selectedshorttoedit'];
		$selectshort="SELECT * from shortquestion where id=$selectedid";
		$runselectshort=mysqli_query($connection,$selectshort);
		$dataofshortquestion=mysqli_fetch_array($runselectshort);
		$question_short=$dataofshortquestion['question'];
		$chapter_short=$dataofshortquestion['chapter'];

	}else{
		echo "<script>alert('Please select short question to edit')</script>";
		echo "<script>location='viewshortquestion.php'</script>";
	}

	if (isset($_POST['btn_edit'])) {
		$edited_question_short=$_POST['tashortques'];
		$edited_chapter_short=$_POST['tfshortchapter'];

		$updateshort="UPDATE shortquestion set question='$edited_question_short',chapter='$edited_chapter_short' where id=$selectedid";
		$runupdateshort=mysqli_query($connection,$updateshort);
		if ($runupdateshort) {
			echo "<script>alert('Successfully updated')</script>";
			echo "<script>location='viewshortquestion.php'</script>";
		}else{
			echo "<script>alert('Error in updating shortquestion!')</script>";
			echo "<script>location='viewshortquestion.php'</script>";
		}
	}
 ?>

 <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="contact_join">
                        <h3>Edit Short Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
		                                <div class='col-lg-12 col-md-12'>
		                                    <div class='single_input'>
		                                        <textarea name='tashortques' id='' autocomplete="off" required><?php echo "$question_short"; ?></textarea>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="row">
		                            	<div class='col-lg-2 col-md-2'>
		                                    <div class='single_input'>
		                                        <input type="number" name='tfshortchapter' value="<?php echo $chapter_short; ?>" required title="Chapter">
		                                    </div>
		                                </div>
		                            </div>
                            <div class="row">
                            	<div class="col-lg-2 col-md-2" style="margin-bottom: 20px;">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" value="Edit" name="btn_edit">
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