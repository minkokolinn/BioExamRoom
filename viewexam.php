<?php 
	session_start();
	include('connect.php');
	include('rawheader.php');

	if (isset($_REQUEST['stuxcyozde'])) {
    	$student_id=$_REQUEST['stuxcyozde'];
    }else{
    	echo "<script>alert('You must enter with a student id! Please reenter your id!')</script>";
		echo "<script>location='index.php'</script>";
    }


    if (isset($_SESSION['unnormal'])) {
		echo "<script>location='home.php?tTUsyeeiS4spz=$student_id'</script>";
	}

	if (isset($_REQUEST['qt'])) {
		
		$selectedquestion=$_REQUEST['qt'];

		//check passcode
		if (isset($_REQUEST['pc'])) {
	    	$enteredpasscode=$_REQUEST['pc'];
	    	$selectpasscode="SELECT passcode from exampaper where question_title='$selectedquestion'";
	    	$runselectpasscode=mysqli_query($connection,$selectpasscode);
	    	$dataofpasscode=mysqli_fetch_array($runselectpasscode);
	    	if ($enteredpasscode!=$dataofpasscode['passcode'] || $enteredpasscode=="" || $enteredpasscode=="null" || $enteredpasscode==null) {
	    		echo "<script>alert('Invalid Passcode!')</script>";
				echo "<script>location='home.php?tTUsyeeiS4spz=$student_id'</script>";
	    	}else{
	    		$selectquestion="SELECT * from exampaper where question_title='$selectedquestion'";
				$runselectquestion=mysqli_query($connection,$selectquestion);
				$dataofquestion=mysqli_fetch_array($runselectquestion);
			    if ($dataofquestion['active']!="on") {
					echo "<script>alert('This question has been already deleted!')</script>";
					echo "<script>location='home.php?tTUsyeeiS4spz=$student_id'</script>";
				}else{
							//to be done
					$selectclass="SELECT class from student where code_number='$student_id'";
					$runselectclass=mysqli_query($connection,$selectclass);
					$dataofclass=mysqli_fetch_array($runselectclass);
					$yourclass=$dataofclass['class'];

					$selectfirstly="SELECT * from answerpaper where student_id='$student_id' and question_title='$selectedquestion'";
					$runselectfirstly=mysqli_query($connection,$selectfirstly);
					$countofselectfirstly=mysqli_num_rows($runselectfirstly);
				    if ($countofselectfirstly>0) {

					}else{
						if ($student_id!="" && $yourclass!="" && $selectedquestion!="") {
							$insertanswerpaper="INSERT into answerpaper(student_id,class,question_title) values('$student_id','$yourclass','$selectedquestion')";
							$runinsertanswerpaper=mysqli_query($connection,$insertanswerpaper);
						}
					}
					//
				}
	    	}
	    }else{
	    	echo "<script>alert('You must enter question passcode!')</script>";
			echo "<script>location='home.php?tTUsyeeiS4spz=$student_id'</script>";
	    }
	    //


		$selectquestion="SELECT * from exampaper where question_title='$selectedquestion'";
		$runselectquestion=mysqli_query($connection,$selectquestion);
		$dataofquestion=mysqli_fetch_array($runselectquestion);

		$truefalse_arr=array();
		$truefalse_str=$dataofquestion['truefalse'];
		$truefalse_trim=explode(',', $truefalse_str);
		foreach ($truefalse_trim as $value) {
			$selecttruefalse="SELECT question from truefalse where id='$value'";
			$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
			$dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
			array_push($truefalse_arr, $dataoftruefalse['question']);
		}

		$multiplechoice_arr=array();
		$multiplechoice_str=$dataofquestion['multiplechoice'];
		$multiplechoice_trim=explode(',', $multiplechoice_str);
		foreach ($multiplechoice_trim as $value) {
			$selectmultiplechoice="SELECT question,a,b,c,d from multiplechoice where id='$value'";
			$runselectmultiplechoice=mysqli_query($connection,$selectmultiplechoice);
			$dataofmultiplechoice=mysqli_fetch_array($runselectmultiplechoice);
			array_push($multiplechoice_arr, $dataofmultiplechoice['question']."|".$dataofmultiplechoice['a']."|".$dataofmultiplechoice['b']."|".$dataofmultiplechoice['c']."|".$dataofmultiplechoice['d']);
		}

		$completion_arr=array();
		$completion_str=$dataofquestion['completion'];
		$completion_trim=explode(',', $completion_str);
		foreach ($completion_trim as $value) {
			$selectcompletion="SELECT question from completion where id='$value'";
			$runselectcompletion=mysqli_query($connection,$selectcompletion);
			$dataofcompletion=mysqli_fetch_array($runselectcompletion);
			array_push($completion_arr, $dataofcompletion['question']);
		}

		$shortquestion_arr=array();
		$shortquestion_str=$dataofquestion['shortquestion'];
		$shortquestion_trim=explode(',', $shortquestion_str);
		foreach ($shortquestion_trim as $value) {
			$selectshortquestion="SELECT question from shortquestion where id='$value'";
			$runselectshortquestion=mysqli_query($connection,$selectshortquestion);
			$dataofshortquestion=mysqli_fetch_array($runselectshortquestion);
			array_push($shortquestion_arr, $dataofshortquestion['question']);
		}
		$a=array("|");
		$b=array("||");
		$c=array("|||");
		$d=array("||||");
		$thewholearray=array_merge($a,$truefalse_arr,$b,$multiplechoice_arr,$c,$completion_arr,$d,$shortquestion_arr);

	}else{
		echo "<script>alert('Please select the question first!')</script>";
		echo "<script>location='home.php?tTUsyeeiS4spz=$student_id'</script>";
	}


	if (isset($_POST['btn_finish'])){

		$tfanswer="";
		for ($i=0; $i <sizeof($truefalse_arr) ; $i++) { 
			$tftempanswer=$_POST['tfans'.$i];
			if ($tfanswer=="") {
				if ($tftempanswer=="noanswer") {
					$tfanswer="noanswer";
				}else{
					$tfanswer=$tftempanswer;
				}
			}else if($tftempanswer=="noanswer"){
				$tfanswer.="||noanswer";
			}else{
				$tfanswer.="||".$tftempanswer;
			}
		}

		$mulanswer="";
		for ($i=0; $i <sizeof($multiplechoice_arr) ; $i++) { 
			$multempanswer=$_POST['mulans'.$i];
			if ($mulanswer=="") {
				if ($multempanswer=="noanswer") {
					$mulanswer="noanswer";
				}else{
					$mulanswer=$multempanswer;
				}
			}else if($multempanswer=="noanswer"){
				$mulanswer.="||noanswer";
			}else{
				$mulanswer.="||".$multempanswer;
			}
		}

		$comanswer="";
		for ($i=0; $i <sizeof($completion_arr) ; $i++) { 
			$comtempanswer=$_POST['comans'.$i];
			if ($comanswer=="") {
				if ($comtempanswer=="") {
					$comanswer="noanswer";
				}else{
					$comanswer=$comtempanswer;
				}
			}else if($comtempanswer==""){
				$comanswer.="||noanswer";
			}else{
				$comanswer.="||".$comtempanswer;
			}
		}

		$shortanswer="";
		for ($i=0; $i <sizeof($shortquestion_arr) ; $i++) { 
			$shorttempanswer=$_POST['shortans'.$i];
			if ($shortanswer=="") {
				if ($shorttempanswer=="") {
					$shortanswer="noanswer";
				}else{
					$shortanswer=$shorttempanswer;
				}
			}else if($shorttempanswer==""){
				$shortanswer.="||noanswer";
			}else{
				$shortanswer.="||".$shorttempanswer;
			}
		}
		$diffWithGMT=6*60*60+30*60; //converting time difference to seconds.
		$dateFormat="d-m-Y h:i:sa";
		$timeAndDate=gmdate($dateFormat, time()+$diffWithGMT);


		$selectquestion="SELECT * from exampaper where question_title='$selectedquestion'";
		$runselectquestion=mysqli_query($connection,$selectquestion);
		$dataofquestion=mysqli_fetch_array($runselectquestion);
	    if ($dataofquestion['active']!="on") {
			echo "<script>alert('Failed in uploading answers!This question has been already deleted!')</script>";
			echo "<script>location='home.php?tTUsyeeiS4spz=$student_id'</script>";
		}else{
			$updateexampaper="UPDATE answerpaper set truefalse_answer='$tfanswer',multiplechoice_answer='$mulanswer',completion_answer='$comanswer',shortquestion_answer='$shortanswer',uploadeddatetime='$timeAndDate' where student_id='$student_id' and class='$yourclass' and question_title='$selectedquestion'";
			$runupdateexampaper=mysqli_query($connection,$updateexampaper);
			if ($runupdateexampaper) {
				echo "<script>location='successexam.php?tTUsyeeiS4spz=$student_id'</script>";
			}else{
				echo "<script>alert('Failed in executing insert query...')</script>";
				mysqli_error($connection);
			}
		}


		
	}
 ?>
<script type="text/javascript">
        function stopRKey(evt) {
          var evt = (evt) ? evt : ((event) ? event : null);
          var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
          if ((evt.keyCode == 13) && ((node.type=="text") || (node.type=="radio") || (node.type=="checkbox")) )  {return false;}
        }

        document.onkeypress = stopRKey;


		document.addEventListener('visibilitychange',function(){
			location='unnormalevent.php';
		});
</script> 
<!--  -->
 <!-- Start Align Area -->
	<div class="whole-wrap">
		<center>
		<p style="color: red; font-size: 24px; margin-top: 30px; text-decoration: underline;">Caution : You are not allowed to quit the exam before you click on 'Finish' button. </p></center>
		<div class="container box_1170">
			<div class="section-top-border">
				<h3 class="mb-30"><?php echo $selectedquestion; ?></h3>
				<div class="row">
					<div class="col-lg-12">
						<form method="post">
						<?php 
							$cotf=sizeof($truefalse_arr);
							$comul=sizeof($multiplechoice_arr);
							$cocom=sizeof($completion_arr);
							$coshort=sizeof($shortquestion_arr);
							

							for ($i=0; $i <sizeof($thewholearray); $i++) { 

								if ($thewholearray[$i]=="|") {
									for ($j=0; $j <$cotf ; $j++) { 
										echo "<blockquote class='generic-blockquote'>";
										echo "<h3 class='mb-30'>TRUE/FALSE</h3>";
										echo "<br>";
										echo "(".($j+1).")&nbsp;&nbsp;".$truefalse_arr[$j];
										echo "<br><br><br>";
										echo "<input type='radio' value='TRUE' name='tfans$j'>&nbsp;";
										echo "TRUE&nbsp;&nbsp;&nbsp;&nbsp;";
										echo "<input type='radio' value='FALSE' name='tfans$j'>&nbsp;";
										echo "FALSE&nbsp;&nbsp;&nbsp;&nbsp;";
										echo "<input type='radio' value='noanswer' name='tfans$j' style='display: none;' checked>&nbsp;";
										echo "<div class='mb-30'></div>";
										echo "</blockquote>";
									}
								}else if($thewholearray[$i]=="||"){
									for ($k=0; $k <$comul ; $k++) { 
										echo "<blockquote class='generic-blockquote'>";
										echo "<h3 class='mb-30'>The Multiple Choice</h3>";
										echo "<br>";
										$runmul_trim=explode('|', $multiplechoice_arr[$k]);
										$value_arr=array();
										foreach ($runmul_trim as $value) {
											array_push($value_arr, $value);
										}
										echo "(".($k+1).")&nbsp;&nbsp;".$value_arr[0];
										echo "<br><br><br>";
										echo "<input type='radio' value='A' name='mulans$k'>&nbsp;(A)&nbsp;";
										echo $value_arr[1]."<br><br>";
										echo "<input type='radio' value='B' name='mulans$k'>&nbsp;(B)&nbsp;";
										echo $value_arr[2]."<br><br>";
										echo "<input type='radio' value='C' name='mulans$k'>&nbsp;(C)&nbsp;";
										echo $value_arr[3]."<br><br>";
										echo "<input type='radio' value='D' name='mulans$k'>&nbsp;(D)&nbsp;";
										echo $value_arr[4];
										echo "<input type='radio' value='noanswer' name='mulans$k' style='display: none;' checked>&nbsp;";
										echo "<div class='mb-30'></div>";
										echo "</blockquote>";
									}
								}
								else if($thewholearray[$i]=="|||"){
									for ($l=0; $l <$cocom ; $l++) { 
										echo "<blockquote class='generic-blockquote'>";
										echo "<h3 class='mb-30'>Completion</h3>";
										echo "<br>";
										echo "(".($l+1).")&nbsp;&nbsp;".$completion_arr[$l];
										echo "<br><br><br>";
										echo "<input type='text' name='comans$l' placeholder='Answer' autocomplete='off' style='width:40%;'>";
										echo "<div class='mb-30'></div>";
										echo "</blockquote>";
									}
								}else if($thewholearray[$i]=="||||"){
									for ($m=0; $m <$coshort ; $m++) { 
										echo "<blockquote class='generic-blockquote'>";
										echo "<h3 class='mb-30'>Short Question</h3>";
										echo "<br>";
										echo "(".($m+1).")&nbsp;&nbsp;".$shortquestion_arr[$m];
										echo "<br><br><br>";
										echo "<textarea name='shortans$m' style='width:100%;'></textarea>";
										echo "<div class='mb-30'></div>";
										echo "</blockquote>";
									}
								}
								else{
									
								}
							}
						 ?>	
						<div class="row">
                                <div class="col-md-9 col-lg-8"></div>
                                <div class="col-2">
                                    <div class="submit_btn">
                                        <input type="submit" class="boxed-btn4" id="btnclicktofinishid" value="Finish" name="btn_finish"  onclick="confirmationmessage()" style="height: 150px; width: 180px; background-color: #1ec6b6; font-size: 26px;">
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