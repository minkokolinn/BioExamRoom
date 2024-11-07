<?php 
	include('../connect.php');
	include('aheader.php');
	if (isset($_REQUEST['qt']) && isset($_REQUEST['from'])) {
		$question_title=$_REQUEST['qt'];
		$from=$_REQUEST['from'];
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	table {
		background-color: white;
	  border-collapse: collapse;
	  border-spacing: 0;
	  width: 100%;
	  border: 1px solid #ddd;
	}

	th, td {
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}
	</style>
</head>
<body>
	<div style="background-color: #e0e2e2;">
	<div style="overflow-x:auto; width: 90%; margin-left: 5%;">
		<br><br>	
		<a href="<?php echo $from; ?>" class="boxed-btn4"><i class="fa fa-chevron-left"></i></a>
		<center>
			<h2><?php echo $question_title; ?></h2><br>
		</center>
  <table>
    <tr>
      <th>TRUE/FALSE</th>
    </tr>
    
      <?php 
      	$selecttruefalse="SELECT truefalse from exampaper where question_title='$question_title'";
      	$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
      	$dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
      	$truefalseno=$dataoftruefalse['truefalse'];
      	if ($truefalseno!="") {
      		$str_ar = explode(',', $truefalseno);
	      	$count=0;
			foreach ($str_ar as $value) {
			  $count++;
			  $selecttruefalsedetail="SELECT question from truefalse where id=$value";
			  $runselecttruefalsedetail=mysqli_query($connection,$selecttruefalsedetail);
			  $countoftruefalsedetail=mysqli_num_rows($runselecttruefalsedetail);
			  for ($i=0; $i <$countoftruefalsedetail ; $i++) { 
			  	$dataoftruefalsedetail=mysqli_fetch_array($runselecttruefalsedetail);
			  	echo "<tr><td>".$count." . ".$dataoftruefalsedetail['question']."</td></tr>";
			  }
			}
      	}
      	
       ?>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
      <th>Multiple Choice</th>
    </tr>
    <?php 
      	$selecttruefalse="SELECT multiplechoice from exampaper where question_title='$question_title'";
      	$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
      	$dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
      	$truefalseno=$dataoftruefalse['multiplechoice'];
      	if ($truefalseno!="") {
      		$str_ar = explode(',', $truefalseno);
	      	$count=0;
			foreach ($str_ar as $value) {
			  $count++;
			  $selecttruefalsedetail="SELECT question,a,b,c,d from multiplechoice where id=$value";
			  $runselecttruefalsedetail=mysqli_query($connection,$selecttruefalsedetail);
			  $countoftruefalsedetail=mysqli_num_rows($runselecttruefalsedetail);
			  for ($i=0; $i <$countoftruefalsedetail ; $i++) { 
			  	$dataoftruefalsedetail=mysqli_fetch_array($runselecttruefalsedetail);
			  	echo "<tr><td>".$count." . ".$dataoftruefalsedetail['question']."<br>(A)&nbsp;".$dataoftruefalsedetail['a']."&nbsp;&nbsp;&nbsp;(B)&nbsp;".$dataoftruefalsedetail['b']."&nbsp;&nbsp;&nbsp;(C)&nbsp;".$dataoftruefalsedetail['c']."&nbsp;&nbsp;&nbsp;(D)&nbsp;".$dataoftruefalsedetail['d']."</td></tr>";
			  }
			}
      	}
      	
       ?>
       <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
      <th>Completion (Fill in the blank)</th>
    </tr>
    <?php 
      	$selecttruefalse="SELECT completion from exampaper where question_title='$question_title'";
      	$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
      	$dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
      	$truefalseno=$dataoftruefalse['completion'];
      	if ($truefalseno!="") {
      		$str_ar = explode(',', $truefalseno);
	      	$count=0;
			foreach ($str_ar as $value) {
			  $count++;
			  $selecttruefalsedetail="SELECT question from completion where id=$value";
			  $runselecttruefalsedetail=mysqli_query($connection,$selecttruefalsedetail);
			  $countoftruefalsedetail=mysqli_num_rows($runselecttruefalsedetail);
			  for ($i=0; $i <$countoftruefalsedetail ; $i++) { 
			  	$dataoftruefalsedetail=mysqli_fetch_array($runselecttruefalsedetail);
			  	echo "<tr><td>".$count." . ".$dataoftruefalsedetail['question']."</td></tr>";
			  }
			}
      	}
      	
       ?>
       <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
      <th>Short Question</th>
    </tr>
        <?php 
      	$selecttruefalse="SELECT shortquestion from exampaper where question_title='$question_title'";
      	$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
      	$dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
      	$truefalseno=$dataoftruefalse['shortquestion'];
      	if ($truefalseno!="") {
      		$str_ar = explode(',', $truefalseno);
	      	$count=0;
			foreach ($str_ar as $value) {
			  $count++;
			  $selecttruefalsedetail="SELECT question from shortquestion where id=$value";
			  $runselecttruefalsedetail=mysqli_query($connection,$selecttruefalsedetail);
			  $countoftruefalsedetail=mysqli_num_rows($runselecttruefalsedetail);
			  for ($i=0; $i <$countoftruefalsedetail ; $i++) { 
			  	$dataoftruefalsedetail=mysqli_fetch_array($runselecttruefalsedetail);
			  	echo "<tr><td>".$count." . ".$dataoftruefalsedetail['question']."</td></tr>";
			  }
			}
      	}
      	
       ?>
  </table>
</div>

<br>	<br>	
</div>
</body>
</html>
<?php 
	include('afooter.php');
 ?>