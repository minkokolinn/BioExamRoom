<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_GET['selectedquestions']) && isset($_GET['from'])) {
		$selectedquestions=$_GET['selectedquestions'];
		$from=$_GET['from'];
	}else{
		echo "<script>alert('Please select questions first...')</script>";
		echo "<script>location='".$_GET['from']."'</script>";
	}

	if (isset($_POST['btn_confirm'])) {
		$exampaper=$_POST['cboexampaper'];
		$insertquestion="";
		if ($from=='viewtruefalse.php') {
			$insertquestion="UPDATE exampaper set truefalse='$selectedquestions' where question_title='$exampaper'";
		}
		else if($_GET['from']=="viewmultiplechoice.php"){
			$insertquestion="UPDATE exampaper set multiplechoice='$selectedquestions' where question_title='$exampaper'";
		}else if($_GET['from']=="viewcompletion.php"){
			$insertquestion="UPDATE exampaper set completion='$selectedquestions' where question_title='$exampaper'";
		}else if($_GET['from']=="viewshortquestion.php"){
			$insertquestion="UPDATE exampaper set shortquestion='$selectedquestions' where question_title='$exampaper'";
		}else{

		}
		$runinsertquestion=mysqli_query($connection,$insertquestion);
		if ($runinsertquestion) {
			echo "<script>alert('Added to $exampaper')</script>";
			echo "<script>location='".$_GET['from']."'</script>";
		}else{
			echo "<script>location='".$_GET['from']."'</script>";
			mysqli_error($connection);
		}
		
	}
 ?>
  <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>In which exam paper, do you want to add these questions.</h3>
                        <form action="" method="post">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 default-select" id="default-select">
										<select name="cboexampaper">
											<?php 
												$selectexampaper="SELECT * from exampaper";
												$runselectexampaper=mysqli_query($connection,$selectexampaper);
												$countofexampaper=mysqli_num_rows($runselectexampaper);
												for ($i=0; $i <$countofexampaper ; $i++) { 
													$dataofexampaper=mysqli_fetch_array($runselectexampaper);
													$value=$dataofexampaper['question_title'];
													echo "<option>$value</option>";
												}
											 ?>
										</select>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-3 col-md-3">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" value="Confirm" name="btn_confirm">
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