<?php 
	include('../connect.php');
	include('aheader.php');

	if (isset($_REQUEST['questiontounuse'])) {
		$questiontounuse=$_REQUEST['questiontounuse'];
		$updateexampaper="UPDATE exampaper set active='',groups='',passcode='' where question_title='$questiontounuse'";
		$runupdateexampaper=mysqli_query($connection,$updateexampaper);
		if ($runupdateexampaper) {
			echo "<script>alert('You cleared $questiontounuse from list of active exam paper')</script>";
			echo "<script>location='viewlistofactiveexampaper.php'</script>";
		}else{
			echo "<script>alert('Error in running statement!')</script>";
			mysqli_error($connection);
		}
	}
 ?>

<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h3>ACTIVE EXAM PAPER</h3>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
            	<?php 
            		$selectexampaper="SELECT * from exampaper where active='on'";
            		$runselectexampaper=mysqli_query($connection,$selectexampaper);
            		$countofexampaper=mysqli_num_rows($runselectexampaper);
            		for ($i=0; $i <$countofexampaper ; $i++) { 
            			$dataofexampaper=mysqli_fetch_array($runselectexampaper);
            			$question_title=$dataofexampaper['question_title'];
            			$active_group=$dataofexampaper['groups'];
            			$passcode=$dataofexampaper['passcode'];
            			echo "<div class='col-lg-4 col-md-6'>";
	            		echo "<div class='single_place'>";
	            		echo "<div class='place_info'>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofactiveexampaper.php'><h3> $question_title </h3></a>";
	            		
	            		
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
						
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofactiveexampaper.php'><p>TRUE/FALSE - $i1</p></a>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofactiveexampaper.php'><p>Multiple Choice - $i2</p></a>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofactiveexampaper.php'><p>Completion - $i3</p></a>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofactiveexampaper.php'><p>Short Question - $i4</p></a>";
	            		echo "<hr>
	            			<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofactiveexampaper.php'><p style='color:green; font-weight:bold; margin-bottom:-10px;'>Active in $active_group</p></a>
	            			<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofactiveexampaper.php'><p style='color:green; font-weight:bold;'>Passcode :  $passcode</p></a>
	            			<a href='viewlistofactiveexampaper.php?questiontounuse=$question_title'><div style='background-color: #1EC6B6; width: 25%; border-radius: 50px; padding-top:8px; padding-bottom:5px;'>
                            	<center><h1 style='color: white; font-size:18px;'>Unuse</h1></center>
                            </div></a>
	                        </div>
	                    </div>
	                </div>";
            		}
            		
            	 ?>          
            </div>
            <hr>
            </div>
        </div>
<?php 
	include('afooter.php');
 ?>