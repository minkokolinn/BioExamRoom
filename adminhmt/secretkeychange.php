<?php 
	include('../connect.php');
	include('aheader.php');
	include('../getsecretkey.php');

	if (isset($_POST['btn_done'])) {
		$oldkey=$_POST['tfoldkey'];
		if ($oldkey==$secretkey) {
			$newkey=$_POST['tfnewkey'];
			$updateap="UPDATE ap set secretkey='$newkey' where secretkey='$oldkey'";
			$runupdateap=mysqli_query($connection,$updateap);
			if ($runupdateap) {
				echo "<script>alert('Secret key was successfully changed!')</script>";
			}else{
				mysqli_error($connection);
			}
		}else{
			echo "<script>alert('Fail to change secret key. Old key is incorrect!')</script>";
		}
	}

 ?>
    <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>Change Secret Key For Admin Panel</h3>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter old key" name="tfoldkey" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_input">
                                        <input type="text" placeholder="Create new key" name="tfnewkey" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-3 col-md-3">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" name="btn_done">
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