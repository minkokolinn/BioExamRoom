<?php 
	include('../connect.php');
	include('tableheader.php');
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
	            location='viewcompletion.php?datatodelete='+ids;
	        });
	        $('#button_makequestion').click( function () {
	            var ids = $.map(table.rows('.selected').data(), function (item) {
	            return item[2]
	            });
	            location='askwhichgrouptoadd.php?selectedquestions='+ids+'&&from=viewcompletion.php';
	        });

	         $('#button_add').click( function () {
	            var answer = prompt('Which Chapter for completion?');
			 	if (answer=="" || answer==null) {
			 		alert('You must type chapter number frist...');
			 		location="viewcompletion.php";
			 	}else{
			 		location="addcompletion.php?chap="+answer;
			 	}
	        });
	    });

 	</script>
    <?php 
    	if (isset($_GET['datatodelete'])) {
	      $datatodelete=$_GET['datatodelete'];
	      $str_ar = explode(',', $datatodelete);
	      $i=0;
	      foreach ($str_ar as $value) {
	      	$deleteitem="DELETE from completion where id='$value'";
	      	$rundeleteitem=mysqli_query($connection,$deleteitem);
	      	$i++;
	      }
	      echo "<script>alert('$i items deleted')</script>";
	      echo "<script>location='viewcompletion.php'</script>";
	   }
     ?>
 </head>
 <body>

 	<div id="tablelayout">
 	<div id="buttonlayout">
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
						$selectcompletion="SELECT * from completion order by chapter asc";
						$runselectcompletion=mysqli_query($connection,$selectcompletion);
						$countofcompletion=mysqli_num_rows($runselectcompletion);

						for ($i=1;$i<=$countofcompletion;$i++) {
							$dataofcompletion=mysqli_fetch_array($runselectcompletion);
							$selectedcomtoedit=$dataofcompletion['id'];
							echo "<tr>";
							echo "<td style='text-align:center;'>".$dataofcompletion['chapter']."</td>";
							echo "<td>".$i."</td>";
							echo "<td style='display: none;'>".$dataofcompletion['id']."</td>";
							echo "<td>".$dataofcompletion['question']."</td>";
							echo "<td>".$dataofcompletion['answer']."</td>";
							echo "<td><a href='viewcompletion_edit.php?selectedcomtoedit=$selectedcomtoedit'>Modify</a></td>";
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