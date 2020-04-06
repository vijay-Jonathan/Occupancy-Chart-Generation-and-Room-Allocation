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

<div align="center" style="margin-top:80px">
    <button id="studentmanual" class="btn btn-success btn-lg">ADD STUDENTS</button>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content"  >
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add Student</h2>
        </div>
        <div class="modal-body" id="EnterStudent">
            <!--Admin Login Form-->
            <div style="display:none" id="addstudentForm">
                <form action="addstudentFromValidation.php" method="POST">
                    <div class="form-group">
                        <label for="studentname">Student Name</label>
                        <input type="text" class="form-control" id="studentname" name="sname"
                               placeholder="Student Name ...">
                    </div>
                    <div class="form-group">
                        <label for="studentroll">Student Roll</label>
                        <input type="text" class="form-control" id="studentroll" name="sroll" placeholder="Student Roll ...">
                    </div>
                    <div class="form-group">
                        <label for="studentbranch">Student Branch</label>
                        <input type="text" class="form-control" id="studentbranch" name="sbranch" placeholder="Branch">
                    </div>
                    <div class="form-group">
                        <label for="ssem">Student Sem</label>

                        <select class="form-control" id="ssem" name="ssem">
                            <option selected disabled>Select</option>
                            <option value="SEM1">SEM1</option>
                            <option value="SEM2">SEM2</option>
                            <option value="SEM3">SEM3</option>
                            <option value="SEM4">SEM4</option>
                            <option value="SEM5">SEM5</option>
                            <option value="SEM6">SEM6</option>
                            <option value="SEM7">SEM7</option>
                            <option value="SEM8">SEM8</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ssec">Section </label>

                        <select class="form-control" id="section" name="ssec">
                            <option selected disabled>Select</option>
                            <option value="CSEA">CSE-A</option>
                            <option value="CSEB">CSE-B</option>
                            <option value="CSEC">CSE-C</option>
                            <option value="CSED">CSE-D</option>
                            <option value="CSEE">CSE-E</option>
                            <option value="CSEF">CSE-F</option>


                        </select>
                    </div class="form-group">
                    <div class="form-group">
                        <label for="studentcontactnumber">Student Contact No.</label>
                        <input type="text" class="form-control" id="studentcontactnumber" name="snumber"
                               placeholder="+91 ...">
                    </div>
                     <div class="form-group">
                        <label for="studentdob">Student DOB    </label>
                        <input type="date" class="form-control" id="studentdob" name="sdob"
                               placeholder="Teacher's Name ...">
                    </div> 

                    <div class="form-group">
                        <label for="studentemailid">Student Email-ID</label>
                        <input type="text" class="form-control" id="studentemailid" name="semail"
                               placeholder="abc@xyz.com ...">
                    </div>
                     <div class="form-group">
                        <label for="studentpassword">Password</label>
                        <input type="password" class="form-control" id="studentpassword" name="spassword"
                               placeholder="password">
                    </div> 
                    <div class="form-group">
                        <label for="studentaddress">Student Address</label>
                        <input type="text" class="form-control" id="studentadress" name="saddr" placeholder="Address">
                    </div>
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
    var addteacherBtn = document.getElementById("studentmanual");
    var heading = document.getElementById("popupHead");
    var facultyForm = document.getElementById("addstudentForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addteacherBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        facultyForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        facultyForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 30px;
            width: 90%;
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
            var table = document.getElementById("studentstable");
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
                                window.location.href = "deletestudent.php?sroll=" + id;

                            }

                        };
                    };
                currentRow.cells[9].onclick = createDeleteHandler(currentRow);
            }
        }
    </script>

   
    <table id="studentstable" style="margin-left: 80px">
        <caption><strong>Student Information </strong></caption>
        <tr>
            <th width=100>Student Roll</th>
            <th width=100>StudentName</th>
            <th width=50>Student Branch</th>
            <th width="100">Date of Birth</th>
            <th width="100">Contact No.</th>
            <th width="100">Email ID</th>
            <th width="50   ">Section</th>
            <th width="40">Semester</th>
            <th width="100">Address</th>
            <th width="40">Action</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query($conn,
            "SELECT * FROM student_info ORDER BY sid ASC");

        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr>
                    <td>{$row['sroll']}</td>
                    <td>{$row['sname']}</td>
                    <td>{$row['sbranch']}</td>
                    <td>{$row['sdob']}</td>
                    <td>{$row['snumber']}</td>
                    <td>{$row['semail']}</td>
                    <td>{$row['ssec']}</td>
                    <td>{$row['ssem']}</td>
                    <td>{$row['saddr']}</td>
                   <td><button>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
        </tbody>
    </table>



</div>
<!--HOME SECTION END-->

<!--<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
-->
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
