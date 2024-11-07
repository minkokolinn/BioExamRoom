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
		
    }
 ?>

 <div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_60">
                        <h3>Result</h3>
                    </div>
                </div>
            </div>
		     <hr>
		     <div class='row'>
             <?php 
		    	$selectexampaper="SELECT distinct class,question_title from answerpaper where class='$yourclass'";
		    	$runselectexampaper=mysqli_query($connection,$selectexampaper);
		    	$countofexampaper=mysqli_num_rows($runselectexampaper);
		    	if ($countofexampaper>0) {
		    		for ($i=0; $i <$countofexampaper ; $i++) { 
			    		$dataofexampaper=mysqli_fetch_array($runselectexampaper);
			    		$activeclass=$dataofexampaper['class'];
			    		$activequestion=$dataofexampaper['question_title'];
			    		
			    		echo "
			    			
			                <div class='col-lg-4 col-md-6'>
			                    <div class='single_place'>
			                        <div class='place_info'>
			    		";
			    		echo "<a href='examresult.php?tTUsyeeiS4spz=$yourid&&ac=$activeclass&&aq=$activequestion'><h3>$activeclass</h3></a>";
			    		echo "<a href='examresult.php?tTUsyeeiS4spz=$yourid&&ac=$activeclass&&aq=$activequestion'><p>$activequestion</p></a>";
			    		echo "
                            <hr>
                            <a href='examresult.php?tTUsyeeiS4spz=$yourid&&ac=$activeclass&&aq=$activequestion'><div style='background-color: #1EC6B6; width: 100%; border-radius: 50px; padding-top:8px; padding-bottom:5px;' class='mb-2'>
                            	<center><h1 style='color: white; font-size:18px;'>View Result</h1></center>
                            </div></a>
			    		";
			    		echo "</div></div></div>
			    		";
		    		}
		    	}
		    	
		     ?>
		     </div>
            
                            
                            
                            
                        </div>
                    </div>
<?php 
	include('footer.php');
 ?>