<?php 
	include('../connect.php');
	include('aheader.php');

	$selectedclass="";
	if (isset($_REQUEST['stuclass'])) {
		$selectedclass=$_REQUEST['stuclass'];
	}

 ?>
	<!-- <div style="height: 600px;"> -->
			<div class="whole-wrap" style="background-color: #e0e2e2;">
		<div class="container box_1170">
			<div class="section-top-border">
				<div class="progress-table-wrap">
					<center><h3><?php 
						if ($selectedclass=="") {
							echo "All Student";
						}else{
							echo $selectedclass." Student";
						}
					 ?></h3></center>
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">No</div>
							<div class="country">Name</div>
							<div class="country">Code Number</div>
							<div class="visit">Class</div>
							<div class="visit">Phone</div>
							<div class="country">Action</div>
						</div>
						<?php 
							if ($selectedclass=="") {
								$selectstudent="SELECT * from student";
								$runselectstudent=mysqli_query($connection,$selectstudent);							
								$countofstudent=mysqli_num_rows($runselectstudent);
								if ($countofstudent>0) {

									for ($i=1; $i <=$countofstudent ; $i++) { 
										$dataofstudent=mysqli_fetch_array($runselectstudent);
										$stuidpk=$dataofstudent['id'];
										echo "<div class='table-row'>";
										echo "<div class='serial'>$i</div>";
										echo "<div class='country'>".$dataofstudent['name']."</div>";
										echo "<div class='country'>".$dataofstudent['code_number']."</div>";
										echo "<div class='visit'>".$dataofstudent['class']."</div>";
										echo "<div class='visit'>".$dataofstudent['phone']."&nbsp;&nbsp;</div>";
										echo "<div class='country'><a href='viewstudent_edit.php?stuidtoedit=$stuidpk'>Edit |</a><a href='deletestudent.php?stucode=".$dataofstudent['code_number']."'> &nbsp;Delete</a></div>";
										echo "</div>";
									}
								}
							}else if($selectedclass=="ULO"){
								$selectstudent="SELECT * from student where class='ULO'";
								$runselectstudent=mysqli_query($connection,$selectstudent);							
								$countofstudent=mysqli_num_rows($runselectstudent);
								if ($countofstudent>0) {
									for ($i=1; $i <=$countofstudent ; $i++) { 
										$dataofstudent=mysqli_fetch_array($runselectstudent);
										$stuidpk=$dataofstudent['id'];
										echo "<div class='table-row'>";
										echo "<div class='serial'>$i</div>";
										echo "<div class='country'>".$dataofstudent['name']."</div>";
										echo "<div class='country'>".$dataofstudent['code_number']."</div>";
										echo "<div class='visit'>".$dataofstudent['class']."</div>";
										echo "<div class='visit'>".$dataofstudent['phone']."&nbsp;&nbsp;</div>";
										echo "<div class='country'><a href='viewstudent_edit.php?stuidtoedit=$stuidpk'>Edit |</a><a href='deletestudent.php?stucode=".$dataofstudent['code_number']."'> &nbsp;Delete</a></div>";
										echo "</div>";
									}
								}
							}else if($selectedclass=="JP"){
								$selectstudent="SELECT * from student where class='JP'";
								$runselectstudent=mysqli_query($connection,$selectstudent);							
								$countofstudent=mysqli_num_rows($runselectstudent);
								if ($countofstudent>0) {
									for ($i=1; $i <=$countofstudent ; $i++) { 
										$dataofstudent=mysqli_fetch_array($runselectstudent);
										$stuidpk=$dataofstudent['id'];
										echo "<div class='table-row'>";
										echo "<div class='serial'>$i</div>";
										echo "<div class='country'>".$dataofstudent['name']."</div>";
										echo "<div class='country'>".$dataofstudent['code_number']."</div>";
										echo "<div class='visit'>".$dataofstudent['class']."</div>";
										echo "<div class='visit'>".$dataofstudent['phone']."&nbsp;&nbsp;</div>";
										echo "<div class='country'><a href='viewstudent_edit.php?stuidtoedit=$stuidpk'>Edit |</a><a href='deletestudent.php?stucode=".$dataofstudent['code_number']."'> &nbsp;Delete</a></div>";
										echo "</div>";
									}
								}
							}else{
								$selectstudent="SELECT * from student where class='9B'";
								$runselectstudent=mysqli_query($connection,$selectstudent);							
								$countofstudent=mysqli_num_rows($runselectstudent);
								if ($countofstudent>0) {
									for ($i=1; $i <=$countofstudent ; $i++) { 
										$dataofstudent=mysqli_fetch_array($runselectstudent);
										$stuidpk=$dataofstudent['id'];
										echo "<div class='table-row'>";
										echo "<div class='serial'>$i</div>";
										echo "<div class='country'>".$dataofstudent['name']."</div>";
										echo "<div class='country'>".$dataofstudent['code_number']."</div>";
										echo "<div class='visit'>".$dataofstudent['class']."</div>";
										echo "<div class='visit'>".$dataofstudent['phone']."&nbsp;&nbsp;</div>";
										echo "<div class='country'><a href='viewstudent_edit.php?stuidtoedit=$stuidpk'>Edit |</a><a href='deletestudent.php?stucode=".$dataofstudent['code_number']."'> &nbsp;Delete</a></div>";
										echo "</div>";
									}
								}
							}
							
						 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- </div> -->
<?php 
	include('afooter.php');
 ?>