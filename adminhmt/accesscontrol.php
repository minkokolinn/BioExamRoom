<?php 
	include('../connect.php');
	include('aheader.php');
 ?>
 <style type="text/css">
 	td{
 		padding: 10px;
 	}
 </style>
<div class="row" style="background-color: #e0e2e2;">
<div class="col-lg-4"></div>
<div class="col-lg-4">
<table>
	<tr>
		<th colspan="3" style="text-align: center;">Groups</th>
	</tr>
	<tr style="height: 30px;"></tr>
	<?php
		$selectstudent="SELECT distinct class from student";
		$runselectstudentgp=mysqli_query($connection,$selectstudent);
		$countofgp=mysqli_num_rows($runselectstudentgp);
		if ($countofgp>0) {
			for ($i=0; $i <$countofgp ; $i++) { 
				$dataofgp=mysqli_fetch_array($runselectstudentgp);
				$gpname=$dataofgp['class'];

				$toggle="";
				$selectaccess="SELECT access from student where class='$gpname'";
				$runselectaccess=mysqli_query($connection,$selectaccess);
				$countofaccess=mysqli_num_rows($runselectaccess);
				$dataofaccess=mysqli_fetch_array($runselectaccess);
					if ($dataofaccess['access']=="a") {
						$toggle="on";
					}
				

				if ($toggle=="on") {
					echo "
					<tr>
						<td style='text-align:center;'><i class='fa fa-circle' aria-hidden='true' style='color:#04ed3a;'></i></td>
						<td>$gpname</td>
						<td style='text-align:center;'><input type='checkbox' checked></td>
					</tr>
					";
				}else{
					echo "
					<tr>
						<td style='text-align:center;'></i></td>
						<td>$gpname</td>
						<td style='text-align:center;'><input type='checkbox'></td>
					</tr>
					";
				}
				
			}
		}
	 ?>
	<tr>
		<td></td>
		
		<td><a href="" style="text-decoration: underline;">Save Changes</a></td>
		<td></td>
	</tr>
</table>
</div>
<br>
</div>
<?php 
	include('afooter.php');
 ?>

 <script type="text/javascript">
 	
 </script>