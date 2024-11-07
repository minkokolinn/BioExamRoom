<?php
    include('connect.php');
    include('header.php');

    if (isset($_REQUEST['tTUsyeeiS4spz'])) {
    	$yourid=$_REQUEST['tTUsyeeiS4spz'];
    }else{
    	echo "<script>alert('You must enter with a student id! Please reenter your id!')</script>";
		echo "<script>location='index.php'</script>";
    }


    $selectstudent="SELECT * from student where code_number='$yourid'";
    $runselectstudent=mysqli_query($connection,$selectstudent);
    $countofstudent=mysqli_num_rows($runselectstudent);
    if ($countofstudent==1) {
    	$dataofstudent=mysqli_fetch_array($runselectstudent);
		$yourclass=$dataofstudent['class'];
		$yourname=$dataofstudent['name'];
    }

    if (isset($_REQUEST['phone'])) {
    	$stuphone=$_REQUEST['phone'];
    	if ($stuphone=="null") {
    		$stuphone="";
    	}
    	$updatestu="UPDATE student set phone='$stuphone' where code_number='$yourid'";
    	$runupdatestu=mysqli_query($connection,$updatestu);
    }


    if (isset($_REQUEST['qt'])) {
    	$sq=$_REQUEST['qt'];

		$selectquestion="SELECT * from exampaper where question_title='$sq'";
		$runselectquestion=mysqli_query($connection,$selectquestion);
		$dataofquestion=mysqli_fetch_array($runselectquestion);
		

	    if ($dataofquestion['active']!="on") {
			echo "<script>alert('This question has been already deleted!')</script>";
			echo "<script>location='home.php?tTUsyeeiS4spz=$yourid'</script>";
		}else{
			echo "<script>
			var passcode = prompt('Question Passcode?');
			location='viewexam.php?stuxcyozde=$yourid&&qt=$sq&&pc='+passcode
			</script>";
		}

		
    }



 ?>
<script type="text/javascript">

</script>
<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_60">
                        <h3><?php echo $yourname; ?> - <?php echo $yourid; ?> - <?php echo $yourclass; ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
            	<?php 
            		$selectexampaper="SELECT * from exampaper";
            		$runselectexampaper=mysqli_query($connection,$selectexampaper);
            		$countofexampaper=mysqli_num_rows($runselectexampaper);
            		for ($i=0; $i <$countofexampaper ; $i++) { 
            			$dataofexampaper=mysqli_fetch_array($runselectexampaper);
            			$groups=$dataofexampaper['groups'];
            			$status="off";
            			$str_ar = explode(',', $groups);
						foreach ($str_ar as $value) {
							if ($value==$yourclass) {
						  	$question_title=$dataofexampaper['question_title'];
						  	echo "<div class='col-lg-4 col-md-6'>";
		            		echo "<div class='single_place'>";
		            		echo "<div class='place_info'>";
		            		echo "<a href='home.php?tTUsyeeiS4spz=$yourid&&qt=$question_title'><h3> $question_title </h3></a>";
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
							echo "<a href='home.php?tTUsyeeiS4spz=$yourid&&qt=$question_title'><p>TRUE/FALSE - $i1</p></a>";
		            		echo "<a href='home.php?tTUsyeeiS4spz=$yourid&&qt=$question_title'><p>Multiple Choice - $i2</p></a>";
		            		echo "<a href='home.php?tTUsyeeiS4spz=$yourid&&qt=$question_title'><p>Completion - $i3</p></a>";
		            		echo "<a href='home.php?tTUsyeeiS4spz=$yourid&&qt=$question_title'><p>Short Question - $i4</p></a>";
		            		echo "
		            		<hr>
		            		<a href='home.php?tTUsyeeiS4spz=$yourid&&qt=$question_title'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
	                            	<center><h1 style='color: white; font-size:18px;'>START</h1></center>
	                            </div></a>
		                        </div>
		                    </div>
		                </div>";

						  }
						}
						

            		}
            	 ?>          
            </div>
            <hr>
            </div>
        </div>
<?php 
    include('footer.php');
 ?>