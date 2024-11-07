<?php 
	include('../connect.php');
	include('aheader.php');

	if (isset($_REQUEST['ac']) && isset($_REQUEST['aq'])) {
		$clickedclass=$_REQUEST['ac'];
		$clickedquestion=$_REQUEST['aq'];
	}
 ?>
   		<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
        	<a href="viewanswerpaperclass.php" class="boxed-btn4 mb-2">Back</a>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="text-center">
                        <h3>LIST OF ANSWER PAPER</h3>
                    </div>
                </div>
            </div>
            <hr>
           <div class='row'>
<?php 
	$selectexampaper2="SELECT ap.*,s.* from answerpaper ap,student s where ap.class='$clickedclass' and ap.question_title='$clickedquestion' and ap.student_id=s.code_number order by s.name asc";
	$runselectexampaper2=mysqli_query($connection,$selectexampaper2);
	$countofexampaper2=mysqli_num_rows($runselectexampaper2);
	if ($countofexampaper2>0) {
		for ($i=0; $i <$countofexampaper2 ; $i++) { 
			$dataofexampaper2=mysqli_fetch_array($runselectexampaper2);
			$student_id=$dataofexampaper2['student_id'];
			$name=$dataofexampaper2['name'];
			$class=$dataofexampaper2['class'];
			$uploadeddatetime=$dataofexampaper2['uploadeddatetime'];

						    		echo "
			    			
			                <div class='col-lg-4 col-md-6'>
			                    <div class='single_place'>
			                        <div class='place_info'>
			    		";

			    		$selectresultforicon="SELECT truefalse_mark,multiplechoice_mark,completion_mark,shortquestion_mark from result where student_id='$student_id' and class='$class' and question_title='$clickedquestion'";
			    		$runselectresultforicon=mysqli_query($connection,$selectresultforicon);
			    		$dataofresultforicon=mysqli_fetch_array($runselectresultforicon);
			    		$tfmark=$dataofresultforicon['truefalse_mark'];
			    		$mulmark=$dataofresultforicon['multiplechoice_mark'];
			    		$commark=$dataofresultforicon['completion_mark'];
			    		$shortmark=$dataofresultforicon['shortquestion_mark'];
			    		if ($tfmark!="" || $mulmark!="" || $commark!="" || $shortmark!="") {
			    			echo "<a href='viewanswerpapereach.php?ac=$clickedclass&&aq=$clickedquestion&&stuid=$student_id'><h3>$name ($class)<img src='../myimg/done.png' width='20px' height='auto' style='float:right;'></h3></a>";
			    		}else{
			    			echo "<a href='viewanswerpapereach.php?ac=$clickedclass&&aq=$clickedquestion&&stuid=$student_id'><h3>$name ($class)</h3></a>";
			    		}

			    		
			    		echo "<a href='viewanswerpapereach.php?ac=$clickedclass&&aq=$clickedquestion&&stuid=$student_id'><p>$student_id</p></a>";
			    		echo "<a href='viewanswerpapereach.php?ac=$clickedclass&&aq=$clickedquestion&&stuid=$student_id'><p>$uploadeddatetime</p></a>";
			    		if ($uploadeddatetime=="") {
			    			echo "<a href='deleteanswerpaper.php?ac=$clickedclass&&aq=$clickedquestion&&stuid=$student_id'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'><i class='fa fa-trash-o'></i></h1></center>
                            </div></a>";
			    		}else{
			    			echo "<a href='deleteanswerpaper.php?ac=$clickedclass&&aq=$clickedquestion&&stuid=$student_id'><div style='background-color: #ff4a52; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'><i class='fa fa-trash-o'></i></h1></center>
                            </div></a>";
			    		}
			    		
			    		echo "</div></div></div>
			    		";
		}
	}
 ?>
 		     </div>
            
                            
                            
                            
                        </div>
                    </div>
<?php 
	include('afooter.php');
 ?>