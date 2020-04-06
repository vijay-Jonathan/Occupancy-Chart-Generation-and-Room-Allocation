

<?php
session_start();
//  include('studentLogin.php');  
include('connection.php');

// $sid=$_SESSION['sid'];

//         $sql = "SELECT * FROM student_info WHERE sid='$sid'";
//         $run_query=mysqli_query($conn,$sql);
//         $row=mysqli_fetch_array($run_query);
//         $name=$row['sname'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Timetable companion</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="facultypage.php">Faclty Area</a>
    <a href="/"  id="logo"
                                                 title="Return to the Amrita Vishwa Vidyapeetham home page"><img
                                        src="assets/img/amrita.jpg" class="img-reponsive"
                                        alt="Amrita Vishwa Vidyapeetham"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="faculty_edit.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="timetable  ">
          <a class="nav-link" href="facultypage.php">
            <i class="fa fa-table"></i>
            <span class="nav-link-text">My Timetable</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="timetable  ">
          <a class="nav-link" href="faculty_LabAllot.php">
            <i class="fa fa-table"></i>
            <span class="nav-link-text">Lab Timetable</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="select_classroom.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Select class</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="faculty_workshop.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Allot Workshop</span>
          </a>
        </li>
        <!-- <?php include'sidenav.php'; ?> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <!-- <li><a href="#">Hello <?php echo $name; ?></a></li> -->
          <li><a href="index.php"   style="font-size:18px;"><?php echo $_SESSION['loggedin_name'];  //echo getLoggedMemberID();// name of the login ?></a></li>
             <i class="fa fa-fw fa-sign-out"   style="font-size:28px;"></i><li style="font-size:18px;">Logout</li></li> <h1>   </h1>
             <br>
             <i class="fa fa-bell" style="font-size:28px;color:black"></i>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashbord_student.php">Dashboard</a>
        </li>
         <li class="breadcrumb-item active"><?php echo $_SESSION['loggedin_name']; ?></li>
      </ol>
     
     <!-- center area -->
     







     <form action="facultypage.php" method="post">
    <div style="margin-top: 100px" align="center">
        <select name="select_teacher" class="list-group-item">
            <option selected disabled>Select Teacher</option>
            <?php
            $q = mysqli_query($conn,
                "SELECT * FROM teachers ");
            while ($row = mysqli_fetch_assoc($q)) {
                echo " \"<option value=\"{$row['faculty_number']}\">{$row['name']}</option>\"";
            }
            ?>
        </select>
        <button type="submit" id="viewteacher" class="btn btn-success btn-lg" style="margin-top: 5px">VIEW TIMETABLE
        </button>
    </div>
</form>
<!-- <form action="facultypage.php" method="post">
    <div align="center" style="margin-top: 10px">
        <select name="select_semester" class="list-group-item">
            <option selected disabled>Select Semester</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        <button type="submit" id="viewsemester" style="margin-top: 5px" class="btn btn-success btn-lg">VIEW TIMETABLE
        </button>
    </div>
</form> -->
<form  action="facultypage.php" method="post">
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

<form  action="facultypage.php" method="post">
<div  align="center" class="form-group">
    <label for="class_room_no">Section</label>
        <select name="sec_room" class="list-group-item">
            <option selected disabled>View Section TimeTable</option>
            <?php
            $q = mysqli_query($conn,
                "SELECT * FROM sections ");
            while ($row = mysqli_fetch_assoc($q)) {
                echo " \"<option value=\"{$row['sec_name']}\">{$row['sec_name']}</option>\"";
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


            </tr>
            <tr>
                <?php if(isset($_POST['sec_room'])){
                $table = $_POST['sec_room'];
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
              </tr>\n";
              }
            }
                ?>
    </div>
<div>
    <br>



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




<!--Algorithm Implementation-->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Assign Substitute</h2>
        </div>
        <div class="modal-body" id="AssignSubstitute">
            <!--Admin Login Form-->

            <div style="display:block" id="assignSubstituteForm">
                <form method="post" action="assignSubstituteFormValidation.php">
                    <div class="form-group">
                        <label for="substitute">Substitute</label>
                        <select class="form-control" id="substitute" name="SB">

                        </select>
                        <input type="hidden" id="cell_number" class="btn btn-default" name="CN">

                    </div>
                    <div align="right" class="form-group">

                        <input type="submit" id="submit" class="btn btn-default" name="ADD" value="CHECK">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var assignsubstitueForm = document.getElementById("assignSubstitueForm");
    // Get the <span> element that closes the modal
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
        assignsubstitueForm.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            assignsubstitueForm.style.display = "none";
        }
    }
</script>






    <script>
    var index = -1;
    function Substitute() {
        var table = document.getElementById("timetable");
        var cells = table.getElementsByTagName("td");
        // window.alert(cells[3].innerHTML.toString());
        for (i = 0; i < cells.length; i++) {
            if (i % 8 == 6 || i % 8 == 7 || parseInt(i / 8) == 0 || i % 8 == 0) {
                continue;
            }
            var currentCell = cells[i];
            //var b = currentRow.getElementsByTagName("td")[0];
            var createSubstituteHandler =
                function (cell, i) {
                    return function () {

                        document.getElementById('cell_number').value = i;
                        index = i;
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                var modal = document.getElementById('myModal');
                                modal.style.display = "block";
                                document.getElementById("substitute").innerHTML = this.responseText;

                            }
                        };
                        xmlhttp.open("GET", "getcellindex.php?i=" + i, false);
                        xmlhttp.send();
                    };
                };
            currentCell.onclick = createSubstituteHandler(currentCell, i);
        }
    }
</script>






    <style>
        table {
            margin-top: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 2px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
    <div id="TT" style="background-color: #FFFFFF">
        <table border="2" cellspacing="3" align="center" id="timetable">
            <caption><strong><br><br>
                    <?php
                    if (isset($_POST['select_semester'])) {
                        echo "COMPUTER ENGINEERING DEPARTMENT SEMESTER " . $_POST['select_semester'] . " ";
                        $year = (int)($_POST['select_semester'] / 2) + $_POST['select_semester'] % 2;
                        $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from classrooms
                        WHERE status = '$year'"));
                        echo " ( " . $r['name'], " ) ";
                    } else if (isset($_POST['select_teacher'])) {
                        $id = $_POST['select_teacher'];
                        $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from teachers
                        WHERE faculty_number = '$id'"));
                        echo $r['name'];
                    } else if (isset($_SESSION['loggedin_name'])) {
                        echo $_SESSION['loggedin_name'];

                    }
                    ?>
                </strong></caption>
            <tr>
                <td style="text-align:center">WEEKDAYS</td>
                <td style="text-align:center">8:00-8:50</td>
                <td style="text-align:center">8:55-9:45</td>
                <td style="text-align:center">9:50-10:40</td>
                <td style="text-align:center">10:45-11:35</td>
                <td style="text-align:center">11:40-12:30</td>
                <td style="text-align:center">12:30-1:30</td>
                <td style="text-align:center">1:30-4:00</td>
            </tr>
            <tr>
                <?php
                $table = null;
                if (isset($_POST['select_semester'])) {
                    $table = " semester" . $_POST['select_semester'] . " ";
                } else if (isset($_POST['select_teacher'])) {
                    $table = " " . $_POST['select_teacher'] . " ";
                } else if (isset($_SESSION['loggedin_id'])) {
                    $table = " " . $_SESSION['loggedin_id'] . " ";
                } else
                    echo '</table>';
                if (isset($_POST['select_semester']) || isset($_POST['select_teacher']) || isset($_SESSION['loggedin_id'])) {
                    $q = mysqli_query($conn,
                        "SELECT * FROM" . $table);
                    $qq = mysqli_query($conn,
                        "SELECT * FROM subjects");
                    $days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY');
                    $i = -1;
                    $str = "<br>";
                    if (isset($_POST['select_semester'])) {
                        while ($r = mysqli_fetch_assoc($qq)) {
                            if ($r['isAlloted'] == 1 && $r['semester'] == $_POST['select_semester']) {
                                $str .= $r['subject_code'] . ": " . $r['subject_name'] . " ";
                                if (isset($r['allotedto'])) {
                                    $id = $r['allotedto'];
                                    $qqq = mysqli_query($conn,
                                        "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                    $rr = mysqli_fetch_assoc($qqq);
                                    $str .= " " . $rr['alias'] . ": " . $rr['name'] . " ";
                                }
                                if ($r['course_type'] !== "LAB") {
                                    $str .= "<br>";
                                    continue;
                                } else {
                                    $str .= ", ";
                                }
                                if (isset($r['allotedto2'])) {
                                    $id = $r['allotedto2'];
                                    $qqq = mysqli_query($conn,
                                        "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                    $rr = mysqli_fetch_assoc($qqq);
                                    $str .= " " . $rr['alias'] . ": " . $rr['name'] . ", ";
                                }
                                if (isset($r['allotedto3'])) {
                                    $id = $r['allotedto3'];
                                    $qqq = mysqli_query($conn,
                                        "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                    $rr = mysqli_fetch_assoc($qqq);
                                    
                                    $str .= " " . $rr['alias'] . ": " . $rr['name'] . "<br>";
                                }
                            }
                        }
                    } else if (isset($_POST['select_teacher']) || isset($_SESSION['loggedin_id'])) {
                        if (isset($_POST['select_teacher'])) {
                            $tid = $_POST['select_teacher'];
                        } else {
                            $tid = $_SESSION['loggedin_id'];
                        }
                        while ($r = mysqli_fetch_assoc($qq)) {
                            if ($r['isAlloted'] == 1 && $r['allotedto'] == $tid) {
                                $str .= $r['subject_code'] . ": " . $r['subject_name'] . " <br>";
                            } else if ($r['isAlloted'] == 1 && isset($r['allotedto2']) && $r['allotedto2'] == $tid) {
                                $str .= $r['subject_code'] . ": " . $r['subject_name'] . " <br>";
                            } else if ($r['isAlloted'] == 1 && isset($r['allotedto3']) && $r['allotedto3'] == $tid) {
                                $str .= $r['subject_code'] . ": " . $r['subject_name'] . " <br>";
                            }
                        }
                    }
                    while ($row = mysqli_fetch_assoc($q)) {
                        $i++;

                        echo "
                 <tr><td style=\"text-align:center\">$days[$i]</td>
                 <td style=\"text-align:center\">{$row['period1']}</td>
                <td style=\"text-align:center\">{$row['period2']}</td>
                <td style=\"text-align:center\">{$row['period3']}</td>
                 <td style=\"text-align:center\">{$row['period4']}</td>
                  <td style=\"text-align:center\">{$row['period5']}</td>
                  <td style=\"text-align:center\">LUNCH</td>
                  <td style=\"text-align:center\">{$row['period6']}</td>
                </tr>\n";
                    }

                    echo '</table>';
                    $sign = "GENERATED VIA TIMETABLE MANAGEMENT SYSTEM, COMPUTER ENGINEERING DEPARTMENT, AMU.";
                    echo "<div align=\"center\">" . "<br>" . $str . "<br>
                            <strong>" . $sign . "<br></strong></div>";
                }
                ?>
    </div>
</div>

<!-- ./Alloatment area -->


<form action="allot.php" method="post">
    <div align="center" style="margin-top: 30px">
        <select name="select_classroom" class="list-group-item">
            <option selected disabled>Select Teacher</option>
            <?php
            include 'connection.php';

            $q = mysqli_query($conn,
                "SELECT * FROM classrooms ");
            $row_count = mysqli_num_rows($q);
            if ($row_count) {
                $mystring = '
     <option selected disabled>Select Classroom </option>';
                while ($row = mysqli_fetch_assoc($q)) {
                    $mystring .= '<option value="' . $row['croom_no'] . '">' . $row['croom_no'] . '</option>';
                }

                echo $mystring;
            }
            ?>

        </select>

        <select name="select_day" class="list-group-item">
            <option selected disabled>Select Week Day</option>
            <option value="monday">monday</option>
            <option value="tuesday">tuesday</option>
            <option value="wednesday">wednesday</option>
            <option value="thursday">thursday</option>
            <option value="friday">friday</option>
           
        </select>

        <select name="select_period" class="list-group-item">
            <option selected disabled>Select Period</option>
            <option value="period1">period1</option>
            <option value="period2">period2</option>
            <option value="period3">period3</option>
            <option value="period4">period4</option>
            <option value="period5">period5</option>
            <option value="period6">period6</option>
            <option value="runtime">runtime</option>
           
        </select>
      
        <button type="submit" id="viewteacher" class="btn btn-success btn-lg" style="margin-top: 5px">Allot Period
        </button>
    </div>
</form>
















<!-- ./Cancel area -->


<form action="cancel.php" method="post">
    <div align="center" style="margin-top: 30px">
        <select name="select_classroomc" class="list-group-item">
            <option selected disabled>Select Teacher</option>
            <?php
            include 'connection.php';

            $q = mysqli_query($conn,
                "SELECT * FROM classrooms ");
            $row_count = mysqli_num_rows($q);
            if ($row_count) {
                $mystring = '
     <option selected disabled>Select Classroom </option>';
                while ($row = mysqli_fetch_assoc($q)) {
                    $mystring .= '<option value="' . $row['croom_no'] . '">' . $row['croom_no'] . '</option>';
                }

                echo $mystring;
            }
            ?>

        </select>

        <select name="select_dayc" class="list-group-item">
            <option selected disabled>Select Week Day</option>
            <option value="monday">monday</option>
            <option value="tuesday">tuesday</option>
            <option value="wednesday">wednesday</option>
            <option value="thursday">thursday</option>
            <option value="friday">friday</option>
           
        </select>

        <select name="select_periodc" class="list-group-item">
            <option selected disabled>Select Period</option>
            <option value="period1">period1</option>
            <option value="period2">period2</option>
            <option value="period3">period3</option>
            <option value="period4">period4</option>
            <option value="period5">period5</option>
            <option value="period6">period6</option>
            <option value="runtime">runtime</option>
           
        </select>
      
        <button type="submit" id="viewteacher" class="btn btn-success btn-lg" style="margin-top: 5px">Cancel Period
        </button>
    </div>
</form>





























<!-- ./alloatment area  -->

<script type="text/javascript">
    function gendf() {
        var doc = new jsPDF();

        doc.addHTML(document.getElementById('TT'), function () {
            doc.save('<?php
                    if (isset($_POST["select_semester"])) {
                        echo "ttms semester " . $_POST["select_semester"];
                    } else if (isset($_POST["select_teacher"])) {
                        echo "ttms " . $_POST["select_teacher"];
                    } else if (isset($_SESSION["loggedin_id"])) {
                        echo "ttms " . $_SESSION["loggedin_id"];
                    }
                    ?>' + '.pdf');
            alert("Downloaded!");

        });
    }

</script>
<div align="center" style="margin-top: 10px">
    <button id="saveaspdf" class="btn btn-info btn-lg" onclick="gendf()">SAVE AS PDF</button>
</div>












     <!-- center area ends -->
      <!-- <?php checkdetailsStudent(); ?>  -->

      <!-- <div class="row">

        <div class="col-12">
          <?php //include '.php'; ?>


           <?php //include 'main.php'; ?> 
        </div>
      </div> -->
    </div>

    <!-- /.container-fluid-->
    

    <!-- /.content-wrapper-->
    
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Jisort 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel">Hello <?php echo getLoggedMemberID(); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Here are some quick options:
            <a href="<?php echo PREPEND_PATH; ?>membership_profile.php" class="btn btn-primary btn-block"><i class="fa fa-user"></i> <strong>My profile</strong></a>
               <?php if(getLoggedAdmin()){ ?>
               <a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger btn-block navbar-btn btn-sm visible-xs btn-sm"><i class="fa fa-cog"></i> <strong><?php echo $Translation['admin area']; ?></strong></a>
               <?php } ?>
               <?php if(!$_GET['signIn'] && !$_GET['loginFailed']){ ?>
               <?php if(getLoggedMemberID() == $adminConfig['anonymousMember']){ ?>
               <p class="navbar-text navbar-right">&nbsp;</p>
               <a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success navbar-btn btn-sm navbar-right"><strong><?php echo $Translation['sign in']; ?></strong></a>
               <p class="navbar-text navbar-right">
                <?php echo $Translation['not signed in']; ?>
              </p>
              <?php }else{ ?>
              <ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
              </ul>
              <ul class="nav navbar-nav visible-xs">
              </ul>
              <?php } ?>
              <?php } ?>
            <!--login/logout area ends-->
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
            <a class="btn btn-primary" href="index.php?signOut=1">Logout</a>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Bell icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  </div>
</body>

</html>
