<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['ac']) && isset($_REQUEST['aq']) && isset($_REQUEST['stuid'])) {
		$selectedclass=$_REQUEST['ac'];
		$selectedquestion=$_REQUEST['aq'];
		$selectedstudentid=$_REQUEST['stuid'];

		$selectstudent="SELECT * from student where code_number='$selectedstudentid'";
		$runselectstudent=mysqli_query($connection,$selectstudent);
		$dataofstudent=mysqli_fetch_array($runselectstudent);
		$studentname=$dataofstudent['name'];


		//preinsert to answer paper
		$selectresult="SELECT count(student_id) as countofline from result where student_id='$selectedstudentid' and class='$selectedclass' and question_title='$selectedquestion'";
		$runselectresult=mysqli_query($connection,$selectresult);
		$dataofselectresult=mysqli_fetch_array($runselectresult);
		if ($dataofselectresult['countofline']==0) {
			$insertresult="INSERT into result(student_id,class,question_title) values('$selectedstudentid','$selectedclass','$selectedquestion')";
 			$runinsertresult=mysqli_query($connection,$insertresult);
		}
		
	}

	$truefalse_count=0;
	$multiplechoice_count=0;
	$completion_count=0;
	$shortquestion_count=0;

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	table {
		background-color: white;
	  border-collapse: collapse;
	  border-spacing: 0;
	  width: 100%;
	  border: 1px solid #ddd;
	}

	th, td {
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}


	</style>
	<link rel="stylesheet" type="text/css" href="popup.css">
	<script type="text/javascript">
		function togglePopup(){
			document.getElementById("popup-1").classList.toggle("active");
		}
	</script>
</head>
<body>
	<div style="background-color: #e0e2e2;">

		<div class="popup" id="popup-1">
			<div class="overlay"></div>
			<div class="content">
				<div class="close-btn" onclick="togglePopup()">&times;</div>
				<h1>Last Correction</h1>
				<p>
					<?php 
						$selectlastresult="SELECT * from result where student_id='$selectedstudentid' and class='$selectedclass' and question_title='$selectedquestion'";
						$runselectlastresult=mysqli_query($connection,$selectlastresult);
						$dataoflastresult=mysqli_fetch_array($runselectlastresult);
						$truefalse_list=$dataoflastresult['truefalse_mark'];
						$multiplechoice_list=$dataoflastresult['multiplechoice_mark'];
						$completion_list=$dataoflastresult['completion_mark'];
						$shortquestion_list=$dataoflastresult['shortquestion_mark'];

						echo "<b>T/F</b><br>";
						$tfno=0;
						$str_ar = explode(',', $truefalse_list);
						foreach ($str_ar as $value) {
						  $tfno++;
						  echo $tfno.") ".$value." mark<br>";
						}
						echo "<b>Multiple Choice</b><br>";
						$mulno=0;
						$str_ar = explode(',', $multiplechoice_list);
						foreach ($str_ar as $value) {
						  $mulno++;
						  echo $mulno.") ".$value." mark<br>";
						}
						echo "<b>Completion</b><br>";
						$comno=0;
						$str_ar = explode(',', $completion_list);
						foreach ($str_ar as $value) {
						  $comno++;
						  echo $comno.") ".$value." mark<br>";
						}
						echo "<b>Short Question</b><br>";
						$shortno=0;
						$str_ar = explode(',', $shortquestion_list);
						foreach ($str_ar as $value) {
						  $shortno++;
						  echo $shortno.") ".$value." mark<br>";
						}
						
					 ?>
				</p>
			</div>
		</div>

		<button onclick="togglePopup()" style="background-color: #ff4a52; border:1px solid #ff4a52; margin-right: 2.5%; margin-top: 20px; float: right; cursor: pointer; color: white;">Show last correction</button>

		<form method="post" autocomplete="off">
	<div style="overflow-x:auto; width: 95%; margin-left: 2.5%;">
		<br>
		<a href="viewanswerpaperclass.php"><i class="fa fa-chevron-left"></i></a>
		<center>
			<h2><?php echo $selectedquestion; ?></h2>
			<h2><?php echo $studentname." (".$selectedstudentid."-".$selectedclass.")"; ?></h2>
		</center>
		<br>
		
  <table>

<?php 
	

	echo "<tr>
      <th>TRUE/FALSE</th>
      <th>Answered</th>
      <th>Mark</th>
    </tr>";
	$selectexampaper="SELECT truefalse from exampaper where question_title='$selectedquestion'";
	$runselectexampaper=mysqli_query($connection,$selectexampaper);
	$dataofexampaper=mysqli_fetch_array($runselectexampaper);
	$truefalse_question_no=$dataofexampaper['truefalse'];
	$str_ar = explode(',', $truefalse_question_no);
	$count=0;
	foreach ($str_ar as $value) {
	  $count++;
	  $selecttruefalse="SELECT * from truefalse where id='$value'";
	  $runselecttruefalse=mysqli_query($connection,$selecttruefalse);
	  $dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
	  $question=$dataoftruefalse['question'];
	  $answer=$dataoftruefalse['answer'];
	  echo "<tr><td>($count)&nbsp; $question <br> Answer : <b> $answer </b></td>";

	  $selectexampaper2="SELECT truefalse_answer from answerpaper where class='$selectedclass' and question_title='$selectedquestion' and student_id='$selectedstudentid'";
	$runselectexampaper2=mysqli_query($connection,$selectexampaper2);
	$countofexampaper2=mysqli_num_rows($runselectexampaper2);
	if ($countofexampaper2>0) {
		for ($i=0; $i <$countofexampaper2 ; $i++) { 
			$dataofexampaper2=mysqli_fetch_array($runselectexampaper2);
			$truefalse_answer=$dataofexampaper2['truefalse_answer'];
			$str_ar = explode('||', $truefalse_answer);
			$count1=0;
			foreach ($str_ar as $value1) {
			  $count1++;

			  $mark=0;
			  if ($value1==$answer) {
			  	$mark=1;
			  }
			  
			  if ($count==$count1) {
			  	if ($value1=="noanswer") {
			  		echo "<td></td>

			  		<td><input type='text' value='$mark' name='aptf$count1' style='width:40px; text-align:center;' required></td>

			  		</tr>";
			  	}else{
			  		echo "<td><b style='color:blue;'>$value1</b></td>

			  		<td><input type='text' value='$mark' name='aptf$count1'  style='width:40px; text-align:center;' required></td>

			  		</tr>";
			  	}

			  }
			}
			}
	}

	}

	$truefalse_count=$count1;

 ?>

 <?php 
 	

	echo "<tr>
      <th>MULTIPLE CHOICE</th>
      <th>Answered</th>
      <th>Mark</th>
    </tr>";
	$selectexampaper="SELECT multiplechoice from exampaper where question_title='$selectedquestion'";
	$runselectexampaper=mysqli_query($connection,$selectexampaper);
	$dataofexampaper=mysqli_fetch_array($runselectexampaper);
	$truefalse_question_no=$dataofexampaper['multiplechoice'];
	$str_ar = explode(',', $truefalse_question_no);
	$count=0;
	foreach ($str_ar as $value) {
	  $count++;
	  $selecttruefalse="SELECT * from multiplechoice where id='$value'";
	  $runselecttruefalse=mysqli_query($connection,$selecttruefalse);
	  $dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
	  $question=$dataoftruefalse['question'];
	  $a=$dataoftruefalse['a'];
	  $b=$dataoftruefalse['b'];
	  $c=$dataoftruefalse['c'];
	  $d=$dataoftruefalse['d'];
	  $rightanswer=$dataoftruefalse['right_answer'];
	  echo "<tr><td>($count)&nbsp; $question <br> (A) $a &nbsp;&nbsp;&nbsp; (B) $b &nbsp;&nbsp; (C) $c &nbsp;&nbsp; (D) $d <br>Answer :<b> $rightanswer </b></td>";



	  	  $selectexampaper2="SELECT multiplechoice_answer from answerpaper where class='$selectedclass' and question_title='$selectedquestion' and student_id='$selectedstudentid'";
	$runselectexampaper2=mysqli_query($connection,$selectexampaper2);
	$countofexampaper2=mysqli_num_rows($runselectexampaper2);
	if ($countofexampaper2>0) {
		for ($i=0; $i <$countofexampaper2 ; $i++) { 
			$dataofexampaper2=mysqli_fetch_array($runselectexampaper2);
			$truefalse_answer=$dataofexampaper2['multiplechoice_answer'];
			$str_ar = explode('||', $truefalse_answer);
			$count1=0;
			foreach ($str_ar as $value1) {
			  $count1++;

			  $mark=0;
			  if ($value1==$rightanswer) {
			  	$mark=1;
			  	
			  }
			  if ($count==$count1) {
			  	if ($value1=="noanswer") {
			  		echo "<td></td>

			  		<td><input type='text' value='$mark' name='apmul$count1' style='width:40px; text-align:center;' required></td>

			  		</tr>";
			  	}else{
			  		echo "<td><b style='color:blue;'>$value1</b></td>

			  		<td><input type='text' value='$mark' name='apmul$count1' style='width:40px; text-align:center;' required></td>

			  		</tr>";
			  	}
			  	
			  }
			  
			}
			}
	}

	}

	$multiplechoice_count=$count1;
 ?>

 <?php 

	echo "<tr>
      <th>COMPLETION</th>
      <th>Answered</th>
      <th>Mark</th>
    </tr>";
	$selectexampaper="SELECT completion from exampaper where question_title='$selectedquestion'";
	$runselectexampaper=mysqli_query($connection,$selectexampaper);
	$dataofexampaper=mysqli_fetch_array($runselectexampaper);
	$truefalse_question_no=$dataofexampaper['completion'];
	$str_ar = explode(',', $truefalse_question_no);
	$count=0;
	foreach ($str_ar as $value) {
	  $count++;
	  $selecttruefalse="SELECT * from completion where id='$value'";
	  $runselecttruefalse=mysqli_query($connection,$selecttruefalse);
	  $dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
	  $question=$dataoftruefalse['question'];
	  $answer=$dataoftruefalse['answer'];
	  echo "<tr><td>($count)&nbsp; $question <br> Answer : <b> $answer </b></td>";

	    	  $selectexampaper2="SELECT completion_answer from answerpaper where class='$selectedclass' and question_title='$selectedquestion' and student_id='$selectedstudentid'";
	$runselectexampaper2=mysqli_query($connection,$selectexampaper2);
	$countofexampaper2=mysqli_num_rows($runselectexampaper2);
	if ($countofexampaper2>0) {
		for ($i=0; $i <$countofexampaper2 ; $i++) { 
			$dataofexampaper2=mysqli_fetch_array($runselectexampaper2);
			$truefalse_answer=$dataofexampaper2['completion_answer'];
			$str_ar = explode('||', $truefalse_answer);
			$count1=0;
			foreach ($str_ar as $value1) {
			  $count1++;
			  if ($count==$count1) {
			  	$selectcompletionresult="SELECT completion_mark from result where class='$selectedclass' and question_title='$selectedquestion' and student_id='$selectedstudentid'";
			  	$runselectcompletionresult=mysqli_query($connection,$selectcompletionresult);
			  	$countofcompletionresult=mysqli_num_rows($runselectcompletionresult);
			  	$dataofcompletionresult=mysqli_fetch_array($runselectcompletionresult);
			  	$completionresult=$dataofcompletionresult['completion_mark'];
			  	if ($completionresult=="") {
				  			if ($value1=="noanswer") {
					  			echo "<td></td>

						  		<td><input type='text' name='apcom$count1' style='width:50px; text-align:center;' required></td>

						  		</tr>";
						  					  		
						  	}else{
						  		echo "<td><b style='color:blue;'>$value1</b></td>

						  		<td><input type='text' name='apcom$count1' style='width:50px; text-align:center;' required></td>

						  		</tr>";
						  	}
			  	}else{
			  		$str_ar2 = explode(',', $completionresult);
				  	$count2=0;
				  	foreach ($str_ar2  as $value2) {
				  		$count2++;
				  		if ($count1==$count2) {
				  			if ($value1=="noanswer") {
					  			echo "<td></td>

						  		<td><input type='text' name='apcom$count1' value='$value2' style='width:50px; text-align:center;' required></td>

						  		</tr>";
						  					  		
						  	}else{
						  		echo "<td><b style='color:blue;'>$value1</b></td>

						  		<td><input type='text' name='apcom$count1' value='$value2' style='width:50px; text-align:center;' required></td>

						  		</tr>";
						  	}
				  		}
				  	}
			  	}



				  }


			  
			}
			}
	}
	}

	$completion_count=$count1;

 ?>


 <?php 

	echo "<tr>
      <th>SHORT QUESTION</th>
      <th></th>
      <th>Mark</th>
    </tr>";
	$selectexampaper="SELECT shortquestion from exampaper where question_title='$selectedquestion'";
	$runselectexampaper=mysqli_query($connection,$selectexampaper);
	$dataofexampaper=mysqli_fetch_array($runselectexampaper);
	$truefalse_question_no=$dataofexampaper['shortquestion'];
	$str_ar = explode(',', $truefalse_question_no);
	$count=0;
	foreach ($str_ar as $value) {
	  $count++;
	  $selecttruefalse="SELECT * from shortquestion where id='$value'";
	  $runselecttruefalse=mysqli_query($connection,$selecttruefalse);
	  $dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
	  $question=$dataoftruefalse['question'];
	  echo "<tr><td>($count)&nbsp; $question <br>Answered : <br><br>";

	  $selectexampaper2="SELECT shortquestion_answer from answerpaper where class='$selectedclass' and question_title='$selectedquestion' and student_id='$selectedstudentid'";
	$runselectexampaper2=mysqli_query($connection,$selectexampaper2);
	$countofexampaper2=mysqli_num_rows($runselectexampaper2);
	if ($countofexampaper2>0) {
		for ($i=0; $i <$countofexampaper2 ; $i++) { 
			$dataofexampaper2=mysqli_fetch_array($runselectexampaper2);
			$truefalse_answer=$dataofexampaper2['shortquestion_answer'];
			$str_ar = explode('||', $truefalse_answer);
			$count1=0;
			foreach ($str_ar as $value1) {
			  $count1++;
			  if ($count==$count1) {
			  	$selectshortresult="SELECT shortquestion_mark from result where class='$selectedclass' and question_title='$selectedquestion' and student_id='$selectedstudentid'";
			  	$runselectshortresult=mysqli_query($connection,$selectshortresult);
			  	$countofshortresult=mysqli_num_rows($runselectshortresult);
			  	$dataofshortresult=mysqli_fetch_array($runselectshortresult);
			  	$shortresult=$dataofshortresult['shortquestion_mark'];
			  	if ($shortresult=="") {
			  		if ($value1=="noanswer") {
				  		echo "</td><td></td>
				  			<td><input type='text' name='apshort$count1' style='width:50px; text-align:center;' required></td>
									  		</tr>
				  		";
				  	}else{
				  		echo "<b style='color:blue;'>$value1</b></td><td></td>
				  			<td><input type='text' name='apshort$count1' style='width:50px; text-align:center;' required></td>
				  		";
				  	}
			  	}else{
			  		$str_ar2 = explode(',', $shortresult);
				  	$count2=0;
				  	foreach ($str_ar2  as $value2) {
				  		$count2++;
				  		if ($count1==$count2) {
				  			if ($value1=="noanswer") {
					  			echo "</td><td></td>
				  			<td><input type='text' name='apshort$count1' value='$value2' style='width:50px; text-align:center;' required></td>
									  		</tr>
				  			";
						  					  		
						  	}else{
						  		echo "<b style='color:blue;'>$value1</b></td><td></td>
				  			<td><input type='text' name='apshort$count1' value='$value2' style='width:50px; text-align:center;' required></td>
				  			";
						  	}
				  		}
				  	}
			  	}
			  	
			  }


			  
			  
			}
			}
	}
	}

	$shortquestion_count=$count1;
 ?>

  </table>
</div><br>

		<div style=" float: right; margin-right: 2.5%;">
			<input type="submit" class="boxed-btn4" value="Done" name="btn_done">
		</div>

<br>	<br>	<br><br>
</form>
</div>
</body>
</html>
<?php 
	if (isset($_POST['btn_done'])) {
		$truefalse_mark_list="";
		for ($i=1; $i <=$truefalse_count ; $i++) { 
			if ($truefalse_mark_list=="") {
				$truefalse_mark_list=$_POST['aptf'.$i];
			}else{
				$truefalse_mark_list.=",".$_POST['aptf'.$i];
			}
		}
		
		$multiplechoice_mark_list="";
		for ($i=1; $i <=$multiplechoice_count ; $i++) { 
			if ($multiplechoice_mark_list=="") {
				$multiplechoice_mark_list=$_POST['apmul'.$i];
			}else{
				$multiplechoice_mark_list.=",".$_POST['apmul'.$i];
			}
		}

		$completion_mark_list="";
		for ($i=1; $i <=$completion_count ; $i++) { 
			if ($completion_mark_list=="") {
				$completion_mark_list=$_POST['apcom'.$i];
			}else{
				$completion_mark_list.=",".$_POST['apcom'.$i];
			}
		}

		$shortquestion_mark_list="";
		for ($i=1; $i <=$shortquestion_count ; $i++) { 
			if ($shortquestion_mark_list=="") {
				$shortquestion_mark_list=$_POST['apshort'.$i];
			}else{
				$shortquestion_mark_list.=",".$_POST['apshort'.$i];
			}
		}

		$truefalse_total=0;
		$str_ar = explode(',', $truefalse_mark_list);
		foreach ($str_ar as $value) {
		  $truefalse_total+=$value;
		}

		$multiplechoice_total=0;
		$str_ar = explode(',', $multiplechoice_mark_list);
		foreach ($str_ar as $value) {
		  $multiplechoice_total+=$value;
		}

		$completion_total=0;
		$str_ar = explode(',', $completion_mark_list);
		foreach ($str_ar as $value) {
		  $completion_total+=$value;
		}

		$shortquestion_total=0;
		$str_ar = explode(',', $shortquestion_mark_list);
		foreach ($str_ar as $value) {
		  $shortquestion_total+=$value;
		}

		$total=$truefalse_total+$multiplechoice_total+$completion_total+$shortquestion_total;
		
		$updateresult="UPDATE result set truefalse_mark='$truefalse_mark_list',multiplechoice_mark='$multiplechoice_mark_list',completion_mark='$completion_mark_list',shortquestion_mark='$shortquestion_mark_list',truefalse_total='$truefalse_total',multiplechoice_total='$multiplechoice_total',completion_total='$completion_total',shortquestion_total='$shortquestion_total',total='$total' where student_id='$selectedstudentid' and class='$selectedclass' and question_title='$selectedquestion'";
		$runupdateresult=mysqli_query($connection,$updateresult);
		if ($runupdateresult) {
			echo "<script>alert('The result is successfully saved')</script>";
			echo "<script>location='viewanswerpapereach.php?ac=$selectedclass&&aq=$selectedquestion&&stuid=$selectedstudentid'</script>";
		}else{
			mysqli_error($connection);
		}
	}

	include('afooter.php');
 ?>