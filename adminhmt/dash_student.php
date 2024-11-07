<?php 
    include('../connect.php');
    include('aheader.php');

    $selectcoundofstudent="SELECT count(code_number) as count from student";
    $runselectcoundofstudent=mysqli_query($connection,$selectcoundofstudent);
    $dataofcountstudent=mysqli_fetch_array($runselectcoundofstudent);
    $countofstudent=$dataofcountstudent['count'];

    $selectcoundofstudentulo="SELECT count(code_number) as count from student where class='ULO'";
    $runselectcoundofstudentulo=mysqli_query($connection,$selectcoundofstudentulo);
    $dataofcountstudentulo=mysqli_fetch_array($runselectcoundofstudentulo);
    $countofstudentulo=$dataofcountstudentulo['count'];

    $selectcoundofstudentjp="SELECT count(code_number) as count from student where class='JP'";
    $runselectcoundofstudentjp=mysqli_query($connection,$selectcoundofstudentjp);
    $dataofcountstudentjp=mysqli_fetch_array($runselectcoundofstudentjp);
    $countofstudentjp=$dataofcountstudentjp['count'];

    $selectcoundofstudent9b="SELECT count(code_number) as count from student where class='9B'";
    $runselectcoundofstudent9b=mysqli_query($connection,$selectcoundofstudent9b);
    $dataofcountstudent9b=mysqli_fetch_array($runselectcoundofstudent9b);
    $countofstudent9b=$dataofcountstudent9b['count'];

 ?>
  	<div class="popular_places_area">
        <div class="container" id="my_popular_places_area">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h3>STUDENTS</h3>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="addstudent.php"><h3 class="text-center">ADD</h3></a>
                            <a href="addstudent.php"><p class="text-center">Click to add student</p></a>
                            <a href="addstudent.php">
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
                            <a href="viewstudent.php"><h3>All</h3></a>
                            <a href="viewstudent.php"><p>The number of all student</p></a>
                            <a href="viewstudent.php">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                            	<center><h1 style="color: white;"><?php echo "$countofstudent"; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewstudent.php?stuclass=ULO"><h3>ULO</h3></a>
                            <a href="viewstudent.php?stuclass=ULO"><p>The number of ULO student</p></a>
                            <a href="viewstudent.php?stuclass=ULO">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo "$countofstudentulo"; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewstudent.php?stuclass=JP"><h3>GP</h3></a>
                            <a href="viewstudent.php?stuclass=JP"><p>The number of GP student</p></a>
                            <a href="viewstudent.php?stuclass=JP">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo "$countofstudentjp"; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="viewstudent.php?stuclass=9B"><h3>9B</h3></a>
                            <a href="viewstudent.php?stuclass=9B"><p>The number of 9B student</p></a>
                            <a href="viewstudent.php?stuclass=9B">
                            <div style="width: 100%;">
                            <div style="background-color: #1EC6B6; width: 35%; border-radius: 50px;">
                                <center><h1 style="color: white;"><?php echo "$countofstudent9b"; ?></h1></center>
                            </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="place_info">
                            <a href="accesscontrol.php"><h3>Student</h3></a>
                            <a href="accesscontrol.php"><p>Access Control</p></a>
                            <a href="accesscontrol.php"></a>
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