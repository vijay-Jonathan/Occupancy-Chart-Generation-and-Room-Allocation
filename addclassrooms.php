<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="addteachers.php">ADD TEACHERS</a></li>
                <li><a href="addstudents.php">ADD STUDENTS</a></li>
                <li><a href="addsection.php">ADD SECTION</a></li>
                <li><a href="addsubjects.php">ADD SUBJECTS</a></li>
                <li><a href="addclassrooms.php">ADD CLASSROOMS</a></li>
                <li><a href="addlab.php">ADD LAB</a></li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ALLOTMENT
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=allotsubjects.php>THEORY COURSES</a>
                        </li>
                        <li>
                            <a href=allotpracticals.php>PRACTICAL COURSES</a>
                        </li>
                        <!-- <li>
                            <a href=allotclasses.php>CLASSROOMS</a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li><a href="generatetimetable.php">GENERATE TIMETABLE</a></li> -->

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>
<!--NAVBAR SECTION END-->
<br>

<div align="center"
     style="margin-top:10%">
    <button
        id="classroommanual" class="btn btn-success btn-lg">ADD CLASSROOM
    </button>
   
</div>

<div align="center">
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 70%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>


<script>
    function deleteHandlers() {
        var table = document.getElementById("classroomstable");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            //var b = currentRow.getElementsByTagName("td")[0];
            var createDeleteHandler =
                function (row) {
                    return function () {
                        var cell = row.getElementsByTagName("td")[0];
                        var id = cell.innerHTML;
                        var x;
                        if (confirm("Are You Sure?") == true) {
                            window.location.href = "deleteclassroom.php?croom_no=" + id;

                        }

                    };
                };
            currentRow.cells[7].onclick = createDeleteHandler(currentRow);
        }
    }
</script>


<table id="classroomstable">
        <caption><strong>ADDED CLASSROOMS</strong></caption>
        <tr>

            <th width="100">Room No</th>
            <th width="100">Capacity</th>
            <th width="100">Power Points</th>
            <th width="100">Projector Availability</th>
            <th width="100">Smart Class</th>
            <th width="100">Speaker</th>
            <th width="100">Section Alloted</th>
            <th width="60">Action</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query($conn,
            "SELECT * FROM classrooms");
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['croom_no']}</td>
                    <td>{$row['c_strength']}</td>
                    <td>{$row['pp_no']}</td>
                    <td>{$row['projector']}</td>
                    <td>{$row['smart_class']}</td>
                    <td>{$row['speaker']}</td>
                    <td>{$row['sec_name']}</td>
                    <td><button>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
        </tbody>
    </table>
</div>
<form  action="addclassrooms.php" method="post">
<div  align="center" class="form-group">
    <label for="class_room_no">Class Room No</label>
        <select name="class_room" class="list-group-item">
            <option selected disabled>Select or View ClassRoom</option>
            <?php
            $q = mysqli_query($conn,
                "SELECT * FROM classrooms ");
            while ($row = mysqli_fetch_assoc($q)) {
                echo " \"<option value=\"{$row['croom_no']}\">{$row['croom_no']}</option>\"";
            }
            ?>

        </select>
        <button type="submit" id="viewsemester" style="margin-top: 5px" class="btn btn-success btn-lg">View Classroom
        </button>
        
    </div  class="form-group" >
</form>
<div id="TT" style="background-color: #FFFFFF">
        <table border="2" cellspacing="3" align="center" id="timetable">
            <caption><strong><br><br>
                   
                </strong></caption>
            <tr>
                <td style="text-align:center">WEEKDAYS</td>
                <td style="text-align:center">8:45-9:45</td>
                <td style="text-align:center">9:45-10:45</td>
                <td style="text-align:center">10:45-11:00</td>
                <td style="text-align:center">11:00-12:00</td>
                <td style="text-align:center">12:00-1:00</td>
                <td style="text-align:center">1:00-2:30</td>
                <td style="text-align:center">2:00-3:00</td>
                <td style="text-align:center">3:00-4:00</td>
                <td style="text-align:center">Runtime</td>


            </tr>
            <tr>
                <?php if(isset($_POST['class_room'])){
                $table = $_POST['class_room'];
                $q = mysqli_query($conn,
                "SELECT * FROM " .$table. "");

                $qq = mysqli_query($conn,
                "SELECT * FROM subjects");
            $days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY');
            $i = -1;
            $str = "<br>";
                
                while ($row = mysqli_fetch_assoc($q)) {
                  $i++;

                  echo "
           <tr><td style=\"text-align:center\">$days[$i]</td>
           <td style=\"text-align:center\">{$row['period1']}</td>
          <td style=\"text-align:center\">{$row['period2']}</td>
          <td style=\"text-align:center\">BREAK</td>
          <td style=\"text-align:center\">{$row['period3']}</td>
           <td style=\"text-align:center\">{$row['period4']}</td>
           <td style=\"text-align:center\">LUNCH</td>

            <td style=\"text-align:center\">{$row['period5']}</td>
            <td style=\"text-align:center\">{$row['period6']}</td>
            <td style=\"text-align:center\">{$row['runtime']}</td>
          </tr>\n";
              }
            }
                ?>
    </div>
<div>
    <br>





<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add Classroom</h2>
        </div>
        <div class="modal-body" id="EnterClassroom">
            <!--Admin Login Form-->
            <div style="display:none" id="addClassroomForm">
                <form action="addclassroomFormValidation.php" method="POST">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="classroomname">Room No</label>
                        <input type="text" class="form-control" id="classroomname" name="CN"
                               placeholder="A203,B101">
                    </div>

                    <!-- <div class="form-group">
                        <label for="calssroomname">Section</label>

                        <select class="form-control" id="section" name="SEC">
                            <option selected disabled>Select</option>
                            <option value="CSEA">CSE-A</option>
                            <option value="CSEB">CSE-B</option>
                            <option value="CSEC">CSE-C</option>
                            <option value="CSED">CSE-D</option>
                            <option value="CSEE">CSE-E</option>
                            <option value="CSEF">CSE-F</option>


                        </select>
                    </div class="form-group"> -->
                    
                    <div class="form-group">
                        <label for="classroomname">Class Strength</label>
                        <input type="text" class="form-control" id="classroomname" name="CS"
                               placeholder="strength">
                    </div>
                    <div class="form-group">
                        <label for="classroomname">No of Power Points in the Class</label>
                        <input type="number" class="form-control" id="classroomname" name="CPP"
                               placeholder=" ">
                    </div>
                   
                    <div class="form-group">
                        <label for="calssroomname">Projector</label>

                        <select class="form-control" id="Projector" name="CP">
                            <option selected disabled>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    <div class="form-group">
                        <label for="classroomname">Smart Class</label>
                        <select class="form-control" id="smartclass" name="SC">
                            <option selected disabled>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classroomname">sepkers</label>
                        <select class="form-control" id="speakers" name="SK">
                            <option selected disabled>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="classroomname">Name</label>
                        <input type="text" class="form-control" id="classroomname" name="CN"
                               placeholder="ML 32, NL 33 ...">
                    </div> -->





                    <div align="right">
                        <input type="submit" class="btn btn-default" name="ADD" value="ADD">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
        
    </div>
    
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addclassroomBtn = document.getElementById("classroommanual");
    var heading = document.getElementById("popupHead");
    var classroomForm = document.getElementById("addClassroomForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addclassroomBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        classroomForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        classroomForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>




<!--HOME SECTION END-->

<!--<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
--></div>
<!-- FOOTER SECTION END-->

<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
<!--  Flexslider Scripts -->
<script src="assets/js/jquery.flexslider.js"></script>
<!--  Scrolling Reveal Script -->
<script src="assets/js/scrollReveal.js"></script>
<!--  Scroll Scripts -->
<script src="assets/js/jquery.easing.min.js"></script>
<!--  Custom Scripts -->
<script src="assets/js/custom.js"></script>
</body>
</html>
