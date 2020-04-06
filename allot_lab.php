<?php

include 'connection.php';
if (isset($_POST['select_classroom']) && isset($_POST['select_day']) && isset($_POST['select_period'])) {
    $select_classroom = $_POST['select_classroom'];
    $select_day = $_POST['select_day'];
    $select_period = $_POST['select_period'];
   
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$tid=$_SESSION['tid'];

        $sql = "SELECT * FROM teachers WHERE faculty_number='$tid'";
        $run_query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($run_query);
        $fn=$row['faculty_number'];


$qq = mysqli_query($conn, "SELECT * from subjects WHERE  allotedto = '$fn'");
$row=mysqli_fetch_array($qq);
$subc=$row['subject_code'];
$subn=$row['subject_name'];
$sub= $subc."<br>".$subn." LAB"; 
//"UPDATE $select_classroom SET $select_period = 'NEWSUB' WHERE day = $select_day"
//SELECT * FROM $select_classroom WHERE period1 = '-<br>-' and day = '$select_day' and $select_period =  'period1'
$q1 = mysqli_query($conn, "SELECT $select_period FROM $select_classroom WHERE  $select_period = '-<br>-' and day = '$select_day'");
$row = mysqli_fetch_array($q1);
 if($row)
 {
    
     $q = mysqli_query($conn, "UPDATE $select_classroom SET $select_period = '$sub' WHERE day = '$select_day'");
     if ($q) {
        $sql = "SELECT * FROM sections WHERE class_name = '$select_classroom'";
        $run_query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($run_query);
        $s_name = $row['sec_name'];
        //$qs = mysqli_query($conn, "UPDATE student_info SET snotify = 'Timetable Updated <br> New Period Added <br> Check Your Room TT' WHERE ssec in (SELECT sec_name FROM sections WHERE class_name = '$select_classroom')");
        $qs1 = mysqli_query($conn, "INSERT INTO notification (sec_name,croom_no,notify) VALUES('$s_name','$select_classroom','Timetable Updated<br>New Period Added<br>Check Your Room TT')");
         
        $message = "Allotted";
         echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:faculty_LabAllot.php");
     } else {
         $message = "Not Allotted";
         echo "<script type='text/javascript'>alert('$message');</script>";
         //header("Location:facultypage.php");

     }
    
 } else
 {
     $message = "Period already occupied";
     echo "<script type='text/javascript'>alert('$message');</script>";
     //header("Location:facultypage.php");
 }

?>