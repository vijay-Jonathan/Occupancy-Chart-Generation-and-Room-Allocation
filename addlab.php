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
        id="classroommanual" class="btn btn-success btn-lg">ADD LAB
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
        var table = document.getElementById("lab");
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
                            window.location.href = "deleteLab.php?lab_name=" + id;

                        }

                    };
                };
            currentRow.cells[5].onclick = createDeleteHandler(currentRow);
        }
    }
</script>


<table id="lab">
        <caption><strong>ADDED LABS</strong></caption>
        <tr>

            <th width="100">LAB Name</th>
            <th width="100">Capacity</th>
            <th width="100">Systems Avaliable</th>
            <th width="100">Projector Availability</th>
            <!-- <th width="100">Smart Class</th> -->
            <th width="100">Speaker</th>
            <th width="60">Action</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query($conn,
            "SELECT * FROM lab");
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['lab_name']}</td>
                    <td>{$row['lab_strength']}</td>
                    <td>{$row['systems']}</td>
                    <td>{$row['projector']}</td>
                    <td>{$row['speaker']}</td>
                    <td><button>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
        </tbody>
    </table>
</div>


<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add LAB</h2>
        </div>
        <div class="modal-body" id="EnterClassroom">
            <!--Admin Login Form-->
            <div style="display:none" id="addClassroomForm">
                <form action="addLabValidation.php" method="POST">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="classroomname">Lab Name</label>
                        <input type="text" class="form-control" id="classroomname" name="LN"
                               placeholder="lab1,itlab,pglab">
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
                        <label for="classroomname">LAB Strength</label>
                        <input type="text" class="form-control" id="classroomname" name="LS"
                               placeholder="strength">
                    </div>
                    <div class="form-group">
                        <label for="classroomname">No of Systems</label>
                        <input type="number" class="form-control" id="classroomname" name="LSS"
                               placeholder=" ">
                    </div>
                   
                    <div class="form-group">
                        <label for="calssroomname">Projector</label>
                        <select class="form-control" id="Projector" name="LP">
                            <option selected disabled>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    
                    <div class="form-group">
                        <label for="classroomname">sepkers</label>
                        <select class="form-control" id="speakers" name="LK">
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
