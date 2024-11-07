<?php 
	include('../connect.php');
	include('aheader.php');

	if (isset($_REQUEST['chap'])) {
		$chaptertoinsert=$_REQUEST['chap'];
		
	}else{
		echo "<script>alert('You must type chapter number frist...')</script>";
		echo "<script>location='viewmultiplechoice.php'</script>";
		
	}

	$countofmultiplechoice="SELECT count(question) as count from multiplechoice";
	$runcountofmultiplechoice=mysqli_query($connection,$countofmultiplechoice);
	$dataofmultiplechoice=mysqli_fetch_array($runcountofmultiplechoice);
	$i=$dataofmultiplechoice['count']+1;

	if (isset($_POST['btn_save'])) {
		$mulquestion=$_POST['tamulques'];
		$mula=$_POST['tamula'];
		$mulb=$_POST['tamulb'];
		$mulc=$_POST['tamulc'];
		$muld=$_POST['tamuld'];
		$multrueanswer=$_POST['tamultrueanswer'];

		$selectmultiplechoice="SELECT count(question) as count1 from multiplechoice where question='$mulquestion'";
		$runselectmultiplechoice=mysqli_query($connection,$selectmultiplechoice);
		$dataofmultiplechoice1=mysqli_fetch_array($runselectmultiplechoice);
		$countdata=$dataofmultiplechoice1['count1'];
		if ($countdata==0) {
				$insertmultiplechoice="INSERT into multiplechoice(question,a,b,c,d,right_answer,chapter) values ('$mulquestion','$mula','$mulb','$mulc','$muld','$multrueanswer','$chaptertoinsert')";
				$runinsertmultiplechoice=mysqli_query($connection,$insertmultiplechoice);
				if ($runinsertmultiplechoice) {
					echo "<script>alert('Successfully Added...')</script>";
					echo "<script>location='addmultiplechoice.php?chap=$chaptertoinsert'</script>";
				}else{
					echo "<script>alert('Error in inserting into database!')</script>";
				}
		}else{
			echo "<script>alert('This question is already existed!')</script>";
		}
	}
 ?>
  <div class="destination_details_info" style="background-color: #e0e2e2;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="contact_join">
                        <h3>Add Multiple Choice Question</h3>
                        <form action="" method="post">
                        			<div class='row'>
                        				<div class='col-lg-1 col-md-1'>
		                                    <div class='single_input'>
		                                        <input type='text' value='<?php echo $i; ?> .' name='tfnooftruefalse' autocomplete='off' required disabled>
		                                    </div>
		                                </div>
		                                <div class='col-lg-11 col-md-11'>
		                                    <div class='single_input'>
		                                        <textarea name='tamulques' id='' autocomplete="off" required></textarea>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='A' name='tamula' autocomplete='off' required>
		                                    </div>
		                                </div>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='B' name='tamulb' autocomplete='off' required>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='C' name='tamulc' autocomplete='off' required>
		                                    </div>
		                                </div>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='D' name='tamuld' autocomplete='off' required>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class='row'>
		                                <div class='col-lg-6 col-md-6'>
		                                    <div class='single_input'>
		                                        <input type='text' placeholder='True Answer' name='tamultrueanswer' autocomplete='off' >
		                                    </div>
		                                </div>
		                            </div>
                            <div class="row">
                            	<div class="col-lg-2 col-md-2" style="margin-bottom: 20px;">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" value="Save" name="btn_save">
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