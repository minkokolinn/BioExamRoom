<?php 
	include('../connect.php');
	include('aheader.php');
    include('generate.php');

	if (isset($_REQUEST['stuidtoedit'])) {
		$stuidpktoedit=$_REQUEST['stuidtoedit'];
		$selectstudentinfo="SELECT * from student where id=$stuidpktoedit";
		$runselectstudentinfo=mysqli_query($connection,$selectstudentinfo);
		$dataofstudent=mysqli_fetch_array($runselectstudentinfo);
		$code_number=$dataofstudent['code_number'];
		$pretext=$code_number[0];
		$posttext="";
		for ($i=1; $i <strlen($code_number) ; $i++) { 
			$posttext.=$code_number[$i];
		}
		$name=$dataofstudent['name'];
		$phone=$dataofstudent['phone'];
		$note=$dataofstudent['note'];
	}else{
		echo "<script>alert('Please select a student to edit')</script>";
		echo "<script>location='viewstudent.php'</script>";
	}

	if (isset($_POST['btn_edit'])) {

		$stucodenumber=$_POST['tfstucodenumber'].$_POST['tfstucodenumber2'];
		$stuname=$_POST['tfstuname'];
		$stuphone=$_POST['tfstuphone'];
		$stunote=$_POST['tfstunote'];

		$updatestudentinfo="UPDATE student set code_number='$stucodenumber',name='$stuname',phone='$stuphone',note='$stunote' where id=$stuidpktoedit";
		$runupdatestudentinfo=mysqli_query($connection,$updatestudentinfo);
		if ($runupdatestudentinfo) {
			echo "<script>alert('Successfully updated')</script>";
			if ($_POST['tfstucodenumber']=="A") {
				echo "<script>location='viewstudent.php?stuclass=ULO'</script>";
			}else if ($_POST['tfstucodenumber']=="B") {
				echo "<script>location='viewstudent.php?stuclass=JP'</script>";
			}else{
				echo "<script>location='viewstudent.php?stuclass=9B'</script>";
			}
		}else{
			echo "<script>alert('Error in updating student!')</script>";
		}
	}
 ?>

<div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>Edit Student</h3>
                        <form action="" method="post">
                            <div class="row">
                            	<div class="col-lg-1 col-md-1">
                                    <div class="single_input">
                                        <input type="text" value="<?php echo $pretext; ?>" name="tfstucodenumber" autocomplete="off" readonly required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter ID" maxlength="20" value="<?php echo $posttext; ?>" name="tfstucodenumber2" id="idtextbox"
                                        autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3" style="margin-right: -4%;">
                                    <p class="mb-3" style="color: blue; text-decoration: underline; cursor: pointer;" onclick="btn_generate()">Generate ID</p>
                                    
                                  <script>
                                      function btn_generate(){
                                        <?php $generatedid=password_generate(9); ?>
                                        document.getElementById("idtextbox").value = "";
                                        document.getElementById("idtextbox").value = "<?php echo $generatedid; ?>";
                                        }
                                  </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Name" name="tfstuname" value="<?php echo $name; ?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Phone" maxlength="12" name="tfstuphone" value="<?php echo $phone; ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
	                            <div class="col-lg-12">
	                                <div class="single_input">
	                                    <textarea name="tfstunote" id="" cols="30" rows="10" placeholder="Note"><?php echo "$note"; ?></textarea>
	                                </div>
	                             </div>
                             </div>
                            <div class="row">
                            	<div class="col-lg-3 col-md-3">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" value="Edit" name="btn_edit">
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