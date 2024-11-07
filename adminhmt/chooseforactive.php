<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['questiontitle'])) {
		$selectedexampaper=$_REQUEST['questiontitle'];
	}else{
		echo "<script>alert('Please select questions first...')</script>";
		echo "<script>location='viewlistofexampaper.php'</script>";
	}


	if (isset($_POST['btn_confirm'])) {
        $selectedclass=$_POST['cboselectedclass'];

        // $selectexampaper="SELECT groups from exampaper where question_title='$selectedexampaper'";

        // $runselectexampaper=mysqli_query($connection,$selectexampaper);
        // $dataofselectexampaper=mysqli_fetch_array($runselectexampaper);
        // $lastgroups=$dataofselectexampaper['groups'];
        // $resultselectedclass="";
        // if ($lastgroups=="") {
            $resultselectedclass=$selectedclass;
            $resultpasscode=$_POST['tfquestionpasscode'];
            if ($resultpasscode==null || $resultpasscode=="" || $resultpasscode=="null") {
                echo "<script>alert('Failed to use this question! You must type passcode!')</script>";
                echo "<script>location='chooseforactive.php?questiontitle=$selectedexampaper'</script>";
            }else{
                $updateexampaper="UPDATE exampaper set active='on',groups='$resultselectedclass',passcode='$resultpasscode' where question_title='$selectedexampaper'";

                $runupdateexampaper=mysqli_query($connection,$updateexampaper);
                if ($runupdateexampaper) {
                    echo "<script>alert('You added this question into $selectedclass group.')</script>";
                }else{
                    mysqli_error($connection);
                }
            }
        // }else{
        //     $str_ar = explode(',', $lastgroups);
        //     $status="off";
        //     foreach ($str_ar as $value) {
        //       if ($value==$selectedclass) {
        //           $status="on";
        //       }
        //     }
        //     if ($status=="off") {
        //         $resultselectedclass=$lastgroups.",".$selectedclass;
        //         $updateexampaper="UPDATE exampaper set active='on',groups='$resultselectedclass' where question_title='$selectedexampaper'";
        //         $runupdateexampaper=mysqli_query($connection,$updateexampaper);
        //         if ($runupdateexampaper) {
        //             echo "<script>alert('You added this question into $selectedclass gourp.')</script>";
        //         }else{
        //             mysqli_error($connection);
        //         }
        //     }else{
        //         echo "<script>alert('You have already uploaded to $selectedclass group!!!.')</script>";
        //     }
            
        // }
        
	}
 ?>
  <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>In which class, do you want to ask. (Choose to active)</h3>
                        <h4>You selected <?php echo $selectedexampaper; ?>.</h4><br><br>
                        <form action="" method="post">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 default-select" id="default-select">
										<select name="cboselectedclass">
                                            <option>ULO</option>
                                            <option>JP</option>
                                            <option>9B</option>
										</select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Question Passcode" name="tfquestionpasscode" required autocomplete="off">
                                    </div>
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