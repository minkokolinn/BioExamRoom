<?php 
    include('../connect.php');
    include('aheader.php');

    $selectcoundoftruefalse="SELECT count(question) as count from truefalse";
    $runselectcoundoftruefalse=mysqli_query($connection,$selectcoundoftruefalse);
    $dataoftruefalse=mysqli_fetch_array($runselectcoundoftruefalse);
    $countoftruefalse=$dataoftruefalse['count'];

    $selectcoundofmultiplechoice="SELECT count(question) as count from multiplechoice";
    $runselectcoundofmultiplechoice=mysqli_query($connection,$selectcoundofmultiplechoice);
    $dataofmultiplechoice=mysqli_fetch_array($runselectcoundofmultiplechoice);
    $countofmultiplechoice=$dataofmultiplechoice['count'];

    $selectcoundofcompletion="SELECT count(question) as count from completion";
    $runselectcoundofcompletion=mysqli_query($connection,$selectcoundofcompletion);
    $dataofcompletion=mysqli_fetch_array($runselectcoundofcompletion);
    $countofcompletion=$dataofcompletion['count'];

    $selectcoundofshortquestion="SELECT count(question) as count from shortquestion";
    $runselectcoundofshortquestion=mysqli_query($connection,$selectcoundofshortquestion);
    $dataofshortquestion=mysqli_fetch_array($runselectcoundofshortquestion);
    $countofshortquestion=$dataofshortquestion['count'];
 ?>
  		<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h3>QUESTIONS</h3>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewtruefalse.php"><h3>TRUE/FALSE Question</h3></a>
                            <a href="viewtruefalse.php"><p>The number of true false question</p></a>
                            <a href="viewtruefalse.php">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo $countoftruefalse; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewmultiplechoice.php"><h3>Multiple Choice Question</h3></a>
                            <a href="viewmultiplechoice.php"><p>The number of multiple choice question</p></a>
                            <a href="viewmultiplechoice.php">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo $countofmultiplechoice; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewcompletion.php"><h3>Completion Question</h3></a>
                            <a href="viewcompletion.php"><p>The number of completion question</p></a>
                            <a href="viewcompletion.php">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo $countofcompletion; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewshortquestion.php"><h3>Short Question</h3></a>
                            <a href="viewshortquestion.php"><p>The number of short question</p></a>
                            <a href="viewshortquestion.php">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo $countofshortquestion; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>

    <!-- </div> -->
<?php 
    include('afooter.php');
 ?>