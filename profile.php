<?php 
	include('connect.php');
	include('header.php');
	if ($_REQUEST['tTUsyeeiS4spz']) {
		$yourid=$_REQUEST['tTUsyeeiS4spz'];
		$selectstudentinfo="SELECT * from student where code_number='$yourid'";
		$runselectstudentinfo=mysqli_query($connection,$selectstudentinfo);
		$dataofstudent=mysqli_fetch_array($runselectstudentinfo);
		$code_number=$dataofstudent['code_number'];
		$name=$dataofstudent['name'];
        $classdb=$dataofstudent['class'];
        if ($classdb=="ULO") {
           $stuclass="U Lynn Oo"; 
        }else if ($classdb=="JP") {
           $stuclass="Gyo Phyu";
        }else{
           $stuclass="9B";
        }
		$phone=$dataofstudent['phone'];
		$note=$dataofstudent['note'];
	}else{
		echo "<script>alert('Please login again')</script>";
		echo "<script>location='index.php'</script>";
	}
 ?>


<div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3 style="text-decoration: underline;">YOUR PROFILE</h3>
                        <form action="" method="post">
                            <h4>Code Number (Your ID)</h4>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter ID" maxlength="6" value="<?php echo $code_number; ?>" autocomplete="off" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter ID" maxlength="6" value="<?php echo $stuclass; ?>" autocomplete="off" required readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4>Your Name</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Name" name="tfstuname" value="<?php echo $name; ?>" required readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4>Your Phone Number</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_input">
                                        <input type="text" maxlength="12" name="tfstuphone" value="<?php echo $phone; ?>" readonly>
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
	include('footer.php');
 ?>