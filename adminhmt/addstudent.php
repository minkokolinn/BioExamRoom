<?php 
	include('../connect.php');
	include('aheader.php');
    include('generate.php');

	if (isset($_POST['btn_save'])) {
		$selectedclass=$_POST['rdoclass'];
		$stucodenumber=$_POST['tfstucodenumber'];
		$stucodenumberreal=$selectedclass.$stucodenumber;
		$stuname=$_POST['tfstuname'];
		$stuclass="";
		if ($selectedclass=="A") {
			$stuclass="ULO";
		}else if($selectedclass=="B"){
			$stuclass="JP";
		}else{
			$stuclass="9B";
		}
		$stuphone=$_POST['tfstuphone'];
		$stunote=$_POST['tfstunote'];

		$selectstudentcodenumber="SELECT code_number from student where code_number='$stucodenumberreal'";
		$runselectstudentcodenumber=mysqli_query($connection,$selectstudentcodenumber);
		$countofsamestudentcode=mysqli_num_rows($runselectstudentcodenumber);
		if ($countofsamestudentcode==0) {
			$createstudent="INSERT into student(name,code_number,class,phone,note) values('$stuname','$stucodenumberreal','$stuclass','$stuphone','$stunote')";
			$runcreatestudent=mysqli_query($connection,$createstudent);
			if ($runcreatestudent) {
				echo "<script>alert('Successfully created new student...')</script>";
				echo "<script>location='addstudent.php'</script>";
			}else{
				echo "<script>alert('Fail to add student!')</script>";
			}
		}else{
			echo "<script>alert('This ID is already existed')</script>";
		}
	}

 ?>
  <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>Add new student</h3>
                        <form action="" method="post">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6">
                                    <input type="radio" name="rdoclass" value="A" width="10px" height="10px" required>&nbsp;&nbsp;ULO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="rdoclass" value="B" required>&nbsp;&nbsp;JP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="rdoclass" value="C" required>&nbsp;&nbsp;9B
                                </div>
                            </div>
                            <?php 
                                $generatedid=password_generate(9);
                             ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter ID" maxlength="20" name="tfstucodenumber" autocomplete="off" value="<?php echo $generatedid; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Name" name="tfstuname" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Phone" name="tfstuphone" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
	                            <div class="col-lg-12">
	                                <div class="single_input">
	                                    <textarea name="tfstunote" id="" cols="30" rows="10" placeholder="Note"></textarea>
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