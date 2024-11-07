<?php 
	include('../connect.php');
	include('aheader.php');
	
	if (isset($_REQUEST['questiontitle'])) {
		$questiontitletodelete=$_REQUEST['questiontitle'];
		$selectexampaperforcheck="SELECT * from exampaper where question_title='$questiontitletodelete'";
		$runselectexampaperforcheck=mysqli_query($connection,$selectexampaperforcheck);
		$dataofexampaperforcheck=mysqli_fetch_array($runselectexampaperforcheck);
		if ($dataofexampaperforcheck['active']=="") {
			$delete="DELETE from exampaper where question_title='$questiontitletodelete'";
			$rundelete=mysqli_query($connection,$delete);
			if ($rundelete) {
				echo "<script>alert('Deleted')</script>";
			}else{
				echo "<script>alert('Error in running statement')</script>";
			}
		}else{
			echo "<script>alert('This exampaper is used in ".$dataofexampaperforcheck['groups'] .". Please unuse first in active exam paper list')</script>";
		}
	}
 ?>

<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h3>EXAM PAPER</h3>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
            	<?php 
            		$selectexampaper="SELECT * from exampaper";
            		$runselectexampaper=mysqli_query($connection,$selectexampaper);
            		$countofexampaper=mysqli_num_rows($runselectexampaper);
            		for ($i=0; $i <$countofexampaper ; $i++) { 
            			$dataofexampaper=mysqli_fetch_array($runselectexampaper);
            			$question_title=$dataofexampaper['question_title'];
            			echo "<div class='col-lg-4 col-md-6'>";
	            		echo "<div class='single_place'>";
	            		echo "<div class='place_info'>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofexampaper.php'><h3> $question_title </h3></a>";
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
						
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofexampaper.php'><p>TRUE/FALSE - $i1</p></a>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofexampaper.php'><p>Multiple Choice - $i2</p></a>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofexampaper.php'><p>Completion - $i3</p></a>";
	            		echo "<a href='viewdetailexampaper.php?qt=$question_title&&from=viewlistofexampaper.php'><p>Short Question - $i4</p></a>";
	            		echo "
	            		<hr>
	            		<a href='chooseforactive.php?questiontitle=$question_title'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'>Use</h1></center>
                            </div></a>
                            <a href='viewlistofexampaper.php?questiontitle=$question_title'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;'>
                            	<center><h1 style='color: white; font-size:18px;'><i class='fa fa-trash'></i></h1></center>
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