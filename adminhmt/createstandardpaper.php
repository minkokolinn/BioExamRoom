<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_POST['btn_save'])) {
		$questiontitle=$_POST['tfquestiontitle'];

		$insertexampaper="INSERT into exampaper(question_title) values('$questiontitle')";
		$runinsertexampaper=mysqli_query($connection,$insertexampaper);
		if ($runinsertexampaper) {
			echo "<script>alert('Successfully created...')</script>";
		}else{
			mysqli_error($connection);
		}
	}
 ?>

<div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>Create a new question paper</h3>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-10 col-md-10">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Question Title (Note : must be unique)" name="tfquestiontitle" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-3 col-md-3">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" value="Save" name="btn_save">
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