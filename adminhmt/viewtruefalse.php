<?php 
	include('../connect.php');
	include('tableheader.php');

	  if (isset($_GET['datatodelete'])) {
	      $datatodelete=$_GET['datatodelete'];
	      $str_ar = explode(',', $datatodelete);
	      $i=0;
	      foreach ($str_ar as $value) {
	      	$deleteitem="DELETE from truefalse where id='$value'";
	      	$rundeleteitem=mysqli_query($connection,$deleteitem);
	      	$i++;
	      }
	      echo "<script>alert('$i items deleted')</script>";
	      echo "<script>location='viewtruefalse.php'</script>";
	   }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<style type="text/css">
 		#tablelayout{
 			background-color: #e0e2e2;
 			padding-left: 2%;
 			padding-right: 2%;
 			padding-top: 30px;
 			padding-bottom: 30px;
 		}
 		#tablelayout2{
 			padding-top: 20px;
 		}
 		#demo{
 			color: black;
 		}
 		@media (max-width: 767px) {
 			#tablelayout{
 				padding-left: 0%;
 				padding-right: 0%;
 			}
 			#buttonlayout{
 				padding-left: 2%;
 			}
		}
 	</style>
 	<script type="text/javascript">
 		$(document).ready(function() {
	        var table = $('#example').DataTable();

	        $('#button_delete').click( function () {
	            var ids = $.map(table.rows('.selected').data(), function (item) {
	            return item[2]
	            });
	            location='viewtruefalse.php?datatodelete='+ids;
	        });
	         $('#button_makequestion').click( function () {
	            var ids = $.map(table.rows('.selected').data(), function (item) {
	            return item[2]
	            });
	            location='askwhichgrouptoadd.php?selectedquestions='+ids+'&&from=viewtruefalse.php';
	        });

	         $('#button_add').click( function () {
	            var answer = prompt('Which Chapter for true false?');
			 	if (answer=="" || answer==null) {
			 		alert('You must type chapter number frist...');
			 		location="viewtruefalse.php";
			 	}else{
			 		location="addtruefalse.php?chap="+answer;
			 	}
	        });
	    });

 	</script>

 </head>
 <body>

 	<div id="tablelayout">
 	<div id="buttonlayout" style="">
 		<button id="button_makequestion" class="boxed-btn4">Make Question</button>
 		<button id="button_delete" class="boxed-btn4"><i class="fa fa-trash-o"></i></button>
 		<button id="button_add" class="boxed-btn4"><i class="fa fa-plus"></i></button>
 		<a href="" id="button_count" class="boxed-btn4"><i class="fa fa-calculator"></i></a>
 	</div>
 	<div id="tablelayout2">
 		<div class="table-responsive">
 		<table id="example" class="display table" cellspacing="0">
				<thead>
					<tr>
						<th>C</th>
						<th>No</th>
						<th style="display: none;">ID</th>
						<th>Question</th>
						<th>Answer</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$selecttruefalse="SELECT * from truefalse order by chapter asc";
						$runselecttruefalse=mysqli_query($connection,$selecttruefalse);
						$countoftruefalse=mysqli_num_rows($runselecttruefalse);

						for ($i=1;$i<=$countoftruefalse;$i++) {
							$dataoftruefalse=mysqli_fetch_array($runselecttruefalse);
							$selectedtftoedit=$dataoftruefalse['id'];
							echo "<tr>";
							echo "<td style='text-align:center;'>".$dataoftruefalse['chapter']."</td>";
							echo "<td>".$i."</td>";
							echo "<td style='display: none;'>".$dataoftruefalse['id']."</td>";
							echo "<td>".$dataoftruefalse['question']."</td>";
							echo "<td>".$dataoftruefalse['answer']."</td>";
							echo "<td><a href='viewtruefalse_edit.php?selectedtftoedit=$selectedtftoedit'>Modify</a></td>";
							echo "</tr>";
						}
					 ?>
				</tbody>
			</table>
			</div>
			</div>
		</div>
 
 </body>
 </html>

<?php 
	include('tablefooter.php');
 ?>