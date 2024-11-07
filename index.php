<?php 
    include('connect.php');
    include('rawheader.php');
    if (isset($_POST['btn_next'])) {
    	$codenumber=$_POST['tfcodenumber'];
    	$selectsecretkey="SELECT * from ap where secretid=1";
    	$runselectsecretkey=mysqli_query($connection,$selectsecretkey);
    	$dataofkey=mysqli_fetch_array($runselectsecretkey);
    	if ($codenumber==$dataofkey['secretkey']) {
    		echo "<script>alert('Logined as admin....')</script>";
			echo "<script>location='adminhmt/'</script>";
    	}else{
    		$selectstucode="SELECT * from student where code_number='$codenumber'";
    		$runselectstucode=mysqli_query($connection,$selectstucode);
    		$countofstucode=mysqli_num_rows($runselectstucode);
    		for ($i=0; $i <$countofstucode ; $i++) { 
    			$stucode=mysqli_fetch_array($runselectstucode);
    			if ($codenumber==$stucode['code_number']) {

                    //gain phone number
                    $selectstu="SELECT phone from student where code_number='$codenumber'";
                    $runselectstu=mysqli_query($connection,$selectstu);
                    $dataofstu=mysqli_fetch_array($runselectstu);
                    if ($dataofstu['phone']=="") {
                        echo "<script>

                        var answer = prompt('Enter Your Phone Number?(Only one)');
                        location='home.php?tTUsyeeiS4spz=$codenumber&&phone='+answer;

                        </script>";
                    }
                    //


    				echo "<script>alert('Logined as valid student....')</script>";
					echo "<script>location='home.php?tTUsyeeiS4spz=$codenumber'</script>";
    			}
    		}
            echo "<script>alert('Invalid user!')</script>";
    	}
    }
 ?>
<div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>Dr.Thiha Biology Exam Room</h3>
                        <h4>Phone : 095105064</h4><br>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-8 col-md-8">
                                    <div class="single_input">
                                        <input type="text" placeholder="Enter Your ID" name="tfcodenumber" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-3 col-md-3">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" value="Next" name="btn_next">
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
include('rawfooter.php');
 ?>