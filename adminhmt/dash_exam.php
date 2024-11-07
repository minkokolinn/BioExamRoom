<?php 
    include('../connect.php');
    include('aheader.php');

    $selectcoundofexampaper="SELECT count(question_title) as count from exampaper";
    $runselectcoundofexampaper=mysqli_query($connection,$selectcoundofexampaper);
    $dataofexampaper=mysqli_fetch_array($runselectcoundofexampaper);
    $countofexampaper=$dataofexampaper['count'];

    $selectcoundofexampaper2="SELECT count(question_title) as count from exampaper where active='on'";
    $runselectcoundofexampaper2=mysqli_query($connection,$selectcoundofexampaper2);
    $dataofexampaper2=mysqli_fetch_array($runselectcoundofexampaper2);
    $countofexampaper2=$dataofexampaper2['count'];
 ?>
  		<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h3>EXAMINATIONS</h3>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="createstandardpaper.php"><h3 class="text-center">ADD</h3></a>
                            <a href="createstandardpaper.php"><p class="text-center">Click to add exampaper</p></a>
                            <a href="createstandardpaper.php">
                            <div style="width: 100%;">
                            <div>
                                <center>
                                <img src="../myimg/addstudentdash.png">
                                </center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewlistofactiveexampaper.php"><h3>Active Exam Paper</h3></a>
                            <a href="viewlistofactiveexampaper.php"><p>These question were asked to student/Exam Room</p></a>
                            <a href="viewlistofactiveexampaper.php">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 20%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo $countofexampaper2; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewlistofexampaper.php"><h3>Exam Paper</h3></a>
                            <a href="viewlistofexampaper.php"><p>The number of exam paper</p></a>
                            <a href="viewlistofexampaper.php">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 20%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo $countofexampaper; ?></h1></center>
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