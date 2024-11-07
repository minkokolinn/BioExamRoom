<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['selectedtftoedit'])) {
		$selectedtftoedit=$_REQUEST['selectedtftoedit'];

		$selecttruefalse="SELECT * from truefalse where id=$selectedtftoedit";
		$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
		$dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
		$question_tf=$dataoftruefalse['question'];
		$answer_tf=$dataoftruefalse['answer'];
		$chapter_tf=$dataoftruefalse['chapter'];
	}else{
		echo "<script>alert('Please select true false to edit')</script>";
		echo "<script>location='viewtruefalse.php'</script>";
	}

	if (isset($_POST['btn_edit'])) {
		$edited_question_tf=$_POST['tatfques'];
		$edited_answer_tf=$_POST['rdotfans'];
		$edited_chapter_tf=$_POST['tftfchapter'];
		$update="UPDATE truefalse set question='$edited_question_tf',answer='$edited_answer_tf',chapter='$edited_chapter_tf' where id=$selectedtftoedit";
		$runupdate=mysqli_query($connection,$update);
		if ($runupdate) {
			echo "<script>alert('Successfully updated')</script>";
			echo "<script>location='viewtruefalse.php'</script>";
		}else{
			echo "<script>alert('Error in updating truefalse information')</script>";
			echo "<script>location='viewtruefalse.php'</script>";
		}
	}
 ?>


  <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="contact_join">
                        <h3>Edit TRUE/FALSE Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
		                                <div class='col-lg-10 col-md-10'>
		                                    <div class='single_input'>
		                                        <textarea name='tatfques' id='' required><?php echo "$question_tf"; ?></textarea>
		                                    </div>
		                                </div>
		                                <div class='col-lg-2 col-md-2 mb-4'>
		                                	<?php 
		                                		if ($answer_tf=="TRUE") {
		                                			echo "<input type='radio' name='rdotfans' autocomplete='off' value='TRUE' checked required>&nbsp;TRUE&nbsp;&nbsp;
		                                        <input type='radio' name='rdotfans' autocomplete='off' value='FALSE' required>&nbsp;FALSE";
		                                		}else{
		                                			echo "<input type='radio' name='rdotfans' autocomplete='off' value='TRUE' required>&nbsp;TRUE&nbsp;&nbsp;
		                                        <input type='radio' name='rdotfans' autocomplete='off' value='FALSE' checked required>&nbsp;FALSE";
		                                		}
		                                	 ?>
		                                </div>
		                            </div>
		                            <div class="row">
		                            	<div class='col-lg-2 col-md-2'>
		                                    <div class='single_input'>
		                                        <input type="number" name='tftfchapter' value="<?php echo $chapter_tf; ?>" required title="Chapter">
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