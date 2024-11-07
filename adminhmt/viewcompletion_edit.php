<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['selectedcomtoedit'])) {
		$selectedid=$_REQUEST['selectedcomtoedit'];
		$selectcom="SELECT * from completion where id=$selectedid";
		$runselectcom=mysqli_query($connection,$selectcom);
		$dataofcompletion=mysqli_fetch_array($runselectcom);
		$question_com=$dataofcompletion['question'];
		$answer_com=$dataofcompletion['answer'];
		$chapter_com=$dataofcompletion['chapter'];
	}else{
		echo "<script>alert('Please select completion to edit')</script>";
		echo "<script>location='viewcompletion.php'</script>";
	}

	if (isset($_POST['btn_edit'])) {
		$edited_question_com=$_POST['tacomques'];
		$edited_answer_com=$_POST['tacomans'];
		$edited_chapter_com=$_POST['tfcomchapter'];

		$updatecom="UPDATE completion set question='$edited_question_com',answer='$edited_answer_com',chapter='$edited_chapter_com' where id=$selectedid";
		$runupdatecom=mysqli_query($connection,$updatecom);
		if ($runupdatecom) {
			echo "<script>alert('Successfully updated')</script>";
			echo "<script>location='viewcompletion.php'</script>";
		}else{
			echo "<script>alert('Error in updating completion information')</script>";
			echo "<script>location='viewcompletion.php'</script>";
		}
	}
 ?>

 <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="contact_join">
                        <h3>Edit Completion Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
		                                <div class='col-lg-12 col-md-12'>
		                                    <div class='single_input'>
		                                        <textarea name='tacomques' id='' autocomplete="off" required><?php echo "$question_com"; ?></textarea>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='Blank Answer' value="<?php echo $answer_com; ?>" name='tacomans' autocomplete='off'>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="row">
		                            	<div class='col-lg-2 col-md-2'>
		                                    <div class='single_input'>
		                                        <input type="number" name='tfcomchapter' value="<?php echo $chapter_com; ?>" required title="Chapter">
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