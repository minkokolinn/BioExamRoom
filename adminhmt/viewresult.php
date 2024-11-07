<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['ac']) && isset($_REQUEST['aq'])) {

		$selectedclass=$_REQUEST['ac'];
		$selectedquestion=$_REQUEST['aq'];
	}

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
	
</head>
<body>
	<div style="background-color: #e0e2e2;">


		<form method="post" autocomplete="off">
	<div style="overflow-x:auto; width: 95%; margin-left: 2.5%;">
		<br>
		<a href="viewanswerpaperclass.php"><i class="fa fa-chevron-left"></i></a>
		<center>
			<h2><?php echo $selectedclass; ?></h2>
			<h2><?php echo "(".$selectedquestion.")"; ?></h2>
		</center>
		<br>
  <table>

  	<tr>
  		<th>No </th>
  		<th>Name </th>
  		<th>T/F </th>
  		<th>MCQ</th>
  		<th>Completion</th>
  		<th>Short Question</th>
  		<th>Total</th>
  		<th>Mark Given</th>
  	</tr>

  	<?php 
  		$selectresult="SELECT * from result where class='$selectedclass' and question_title='$selectedquestion' order by total desc";
  		$runselectresult=mysqli_query($connection,$selectresult);
  		$countofresult=mysqli_num_rows($runselectresult);
  		if ($countofresult>0) {
  			for ($i=0; $i <$countofresult ; $i++) { 
  				$dataofresult=mysqli_fetch_array($runselectresult);
  				$studentid=$dataofresult['student_id'];

  				$selectstuname="SELECT name from student where code_number='$studentid'";
				$runselectstuname=mysqli_query($connection,$selectstuname);
				$dataofstuname=mysqli_fetch_array($runselectstuname);

  				$studentname=$dataofstuname['name'];
  				$tf=$dataofresult['truefalse_total'];
  				$mul=$dataofresult['multiplechoice_total'];
  				$com=$dataofresult['completion_total'];
  				$short=$dataofresult['shortquestion_total'];
  				$total=$dataofresult['total'];
  				echo "<tr>";
  				echo "<td>".($i+1)."</td>";
  				echo "<td>$studentname ($studentid)</td>";
  				echo "<td>$tf</td>";
  				echo "<td>$mul</td>";
  				echo "<td>$com</td>";
  				echo "<td>$short</td>";
  				echo "<td>$total</td>";



            		$selectexampaper="SELECT * from exampaper where question_title='$selectedquestion'";
            		$runselectexampaper=mysqli_query($connection,$selectexampaper);
            		$countofexampaper=mysqli_num_rows($runselectexampaper);
            		$dataofexampaper=mysqli_fetch_array($runselectexampaper);
	            		$i1=0;
	            		if ($dataofexampaper['truefalse']!="") {
	            			$str_ar1 = explode(',', $dataofexampaper['truefalse']);
							foreach ($str_ar1 as $value1) {
							  $i1++;
							}
	            		}
	            		
	            		$i2=0;
	            		if ($dataofexampaper['multiplechoice']!="") {
	            			$str_ar2 = explode(',', $dataofexampaper['multiplechoice']);
							foreach ($str_ar2 as $value2) {
							  $i2++;
							}
	            		}
						
						$i3=0;
						if ($dataofexampaper['completion']!="") {
							$str_ar3 = explode(',', $dataofexampaper['completion']);
							foreach ($str_ar3 as $value3) {
							  $i3++;
							}
						}
						
						$i4=0;
						if ($dataofexampaper['shortquestion']!="") {
							$str_ar4 = explode(',', $dataofexampaper['shortquestion']);
							foreach ($str_ar4 as $value4) {
							  $i4++;
							}
						}
						$fullmark=$i1+$i2+$i3+$i4;
				echo "<td>$fullmark</td>";

  				echo "</tr>";
  			}
  		}
  	 ?>
  </table>
</div>
  <br><br>
</body>
</html>
<?php 

	include('afooter.php');
 ?>