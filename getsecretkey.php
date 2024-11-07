<?php 
	include('connect.php');
	$selectsecretkey="select * from ap where secretid=1";
    $runselectsecretkey=mysqli_query($connection,$selectsecretkey);
    $countofdata=mysqli_num_rows($runselectsecretkey);
    if ($countofdata==1) {
       $data=mysqli_fetch_array($runselectsecretkey);
       $secretkey=$data['secretkey'];
    }

 ?>