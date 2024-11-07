<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function clicknext(){
		   // document.getElementById("abox1").style.display = "none";
		   // document.getElementById("abox2").style.display = "block";
		}
	</script>
</head>
<body style="height: 1000px;">
	<?php 
		for ($i=0; $i <5 ; $i++) { 
			echo "
			<div id='abox$i' style='width:30px; height:30px; margin-bottom:30px; background-color: red;'>Box $i</div>
		";
		}
		
	 ?>
	
	<input type="submit" name="" value="Next" onclick="clicknext()">
</body>
</html>
<script type="text/javascript">
document.getElementById("abox2").style.display = "none";

</script>