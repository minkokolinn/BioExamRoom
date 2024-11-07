<?php 
	include('connect.php');
	include('rawheader.php');
    if (isset($_REQUEST['tTUsyeeiS4spz'])) {
        $yourid=$_REQUEST['tTUsyeeiS4spz'];
    }
?>
<script type="text/javascript">
	var seconds=7;
	function displayseconds(){
		seconds-=1;
        if (seconds>0) {
            document.getElementById("displaylefttime1").innerText=seconds+" Seconds ....";
        }
		
	}
	setInterval(displayseconds,1000);

	function redirectpage(){
		location='home.php?tTUsyeeiS4spz=<?php echo $yourid; ?>';
	}

	setTimeout('redirectpage()',7000);

</script>
<div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                    	<img src="">
                        <h3>You finished the exam.</h3>
                        <h3>Good Luck.. </h3>
                        <br>
                        <p id="displaylefttime" style="color: black;">This Page will be redirect to home page in </p>
                        <p id="displaylefttime1" style="color: red; font-weight: bold;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
	include('rawfooter.php');
 ?>