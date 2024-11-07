<?php 
    include('../connect.php');
    include('aheader.php');
 ?>
  		<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h3>ANSWER PAPERS</h3>
                    </div>
                </div>
            </div>
            <hr>
           <div class='row'>
             <?php 
		    	$selectexampaper="SELECT distinct class,question_title from answerpaper";
		    	$runselectexampaper=mysqli_query($connection,$selectexampaper);
		    	$countofexampaper=mysqli_num_rows($runselectexampaper);
		    	if ($countofexampaper>0) {
		    		for ($i=0; $i <$countofexampaper ; $i++) { 
			    		$dataofexampaper=mysqli_fetch_array($runselectexampaper);
			    		$activeclass=$dataofexampaper['class'];
			    		$activequestion=$dataofexampaper['question_title'];

			    		$selectexampaper2="SELECT ap.*,s.* from answerpaper ap,student s where ap.class='$activeclass' and ap.question_title='$activequestion' and ap.student_id=s.code_number";
			    		$runselectexampaper2=mysqli_query($connection,$selectexampaper2);
			    		$countofexampaper2=mysqli_num_rows($runselectexampaper2);
			    		
			    		echo "
			    			
			                <div class='col-lg-4 col-md-6'>
			                    <div class='single_place'>
			                        <div class='place_info'>
			    		";
			    		echo "<a href='viewanswerpaperstudent.php?ac=$activeclass&&aq=$activequestion'><h3>$activeclass</h3></a>";
			    		echo "<a href='viewanswerpaperstudent.php?ac=$activeclass&&aq=$activequestion'><p>$activequestion</p></a>";
			    		echo "
			    			<a href='viewanswerpaperstudent.php?ac=$activeclass&&aq=$activequestion'>
                            <div style='width: 100%;'>
                            <div style='background-color: #1EC6B6; width: 20%; border-radius: 50px;'>
                                <center><h1 style='color: white;'>$countofexampaper2</h1></center>
                            </div>
                            </div>
                            </a>
                            <hr>
                             <a href='deleteclassanswerpaper.php?ac=$activeclass&&aq=$activequestion'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'>Delete</h1></center>
                            </div></a>
			    		";
			    		echo "</div></div></div>
			    		";
		    		}
		    	}
		    	
		     ?>
		     </div>
		     <hr>
		     <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h3>RESULTS</h3>
                    </div>
                </div>
            </div>
		     <div class='row'>
             <?php 
		    	$selectresult="SELECT distinct class,question_title,showresult from result";
		    	$runselectresult=mysqli_query($connection,$selectresult);
		    	$countofresult=mysqli_num_rows($runselectresult);
		    	if ($countofresult>0) {
		    		for ($i=0; $i <$countofresult ; $i++) { 
			    		$dataofresult=mysqli_fetch_array($runselectresult);
			    		$activeclass=$dataofresult['class'];
			    		$activequestion=$dataofresult['question_title'];
			    		
			    		echo "
			    			
			                <div class='col-lg-4 col-md-6'>
			                    <div class='single_place'>
			                        <div class='place_info'>
			    		";
			    		echo "<a href='viewresult.php?ac=$activeclass&&aq=$activequestion'><h3>$activeclass</h3></a>";
			    		echo "<a href='viewresult.php?ac=$activeclass&&aq=$activequestion'><p>$activequestion</p></a>";
			    		echo "
                            <hr>
                            <a href='viewresult.php?ac=$activeclass&&aq=$activequestion'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'>View Result</h1></center>
                            </div></a>
			    		";
			    		$status="Show to student";

			    				if ($dataofresult['showresult']=="") {
			    					$status="Show to student";
			    				}else{
			    					$status="Don't Show";
			    				}

			    		echo "<a href='makeshowresult.php?ac=$activeclass&&aq=$activequestion'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'>$status</h1></center>
                            </div></a>";
                            echo "<a href='deleteclassresult.php?ac=$activeclass&&aq=$activequestion'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'>Delete</h1></center>
                            </div></a>";
			    		echo "</div></div></div>
			    		";
		    		}
		    	}
		    	
		     ?>
		     </div>
            
                            
                            
                            
                        </div>
                    </div>

    <!-- </div> -->
<?php 
    include('afooter.php');
 ?>