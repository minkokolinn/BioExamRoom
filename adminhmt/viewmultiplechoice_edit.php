<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['selectedmultoedit'])) {
		$selectedid=$_REQUEST['selectedmultoedit'];
		$selectmultiplechoice="SELECT * from multiplechoice where id=$selectedid";
		$runselectmultiplechoice=mysqli_query($connection,$selectmultiplechoice);
		$dataofmultiplechoice=mysqli_fetch_array($runselectmultiplechoice);
		$question_mul=$dataofmultiplechoice['question'];
		$a_mul=$dataofmultiplechoice['a'];
		$b_mul=$dataofmultiplechoice['b'];
		$c_mul=$dataofmultiplechoice['c'];
		$d_mul=$dataofmultiplechoice['d'];
		$rightanswer_mul=$dataofmultiplechoice['right_answer'];
		$chapter_mul=$dataofmultiplechoice['chapter'];
	}else{
		echo "<script>alert('Please select multiple choice to edit')</script>";
		echo "<script>location='viewmultiplechoice.php'</script>";
	}

	if (isset($_POST['btn_edit'])) {
		$edited_question_mul=$_POST['tamulques'];
		$edited_a_mul=$_POST['tamula'];
		$edited_b_mul=$_POST['tamulb'];
		$edited_c_mul=$_POST['tamulc'];
		$edited_d_mul=$_POST['tamuld'];
		$edited_rightanswer_mul=$_POST['tamultrueanswer'];
		$edited_chapter_mul=$_POST['tfmulchapter'];

		$updatemultiplechoice="UPDATE multiplechoice set question='$edited_question_mul',a='$edited_a_mul',b='$edited_b_mul',c='$edited_c_mul',d='$edited_d_mul',right_answer='$edited_rightanswer_mul',chapter='$edited_chapter_mul' where id='$selectedid'";
		$runupdatemultiplechoice=mysqli_query($connection,$updatemultiplechoice);
		if ($runupdatemultiplechoice) {
			echo "<script>alert('Successfully updated')</script>";
			echo "<script>location='viewmultiplechoice.php'</script>";
		}else{
			echo "<script>alert('Error in updating multiplechoice information')</script>";
			echo "<script>location='viewmultiplechoice.php'</script>";
		}
	}
 ?>

  <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="contact_join">
                        <h3>Edit Multiple Choice Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
		                                <div class='col-lg-12 col-md-12'>
		                                    <div class='single_input'>
		                                        <textarea name='tamulques' id='' autocomplete="off" required><?php echo "$question_mul"; ?></textarea>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='A' name='tamula' value="<?php echo $a_mul; ?>" autocomplete='off' required title="A">
		                                    </div>
		                                </div>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='B' name='tamulb' value="<?php echo $b_mul; ?>" autocomplete='off' required title="B">
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='C' name='tamulc' value="<?php echo $c_mul; ?>" autocomplete='off' required title="C">
		                                    </div>
		                                </div>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='D' name='tamuld' value="<?php echo $d_mul; ?>" autocomplete='off' required title="D">
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='True Answer' value="<?php echo $rightanswer_mul; ?>" name='tamultrueanswer' autocomplete='off' >
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="row">
		                            	<div class='col-lg-2 col-md-2'>
		                                    <div class='single_input'>
		                                        <input type="number" name='tfmulchapter' value="<?php echo $chapter_mul; ?>" required title="Chapter">
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
                                        <a href="viewmultiplechoice.php" class="boxed-btn4">View All</a>
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