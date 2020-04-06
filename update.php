<?php
session_start();

include('connection.php');
if (isset($_POST['sname']) && isset($_POST['semail']) && isset($_POST['snumber']) && isset($_POST['saddr']) && isset($_POST['ssem']) && isset($_POST['spassword']) ) {
    $sname = $_POST['sname'];
    $snumber = $_POST['snumber'];
    $semail = $_POST['semail'];
    $saddr = $_POST['saddr'];
    $ssem = $_POST['ssem'];
    $spassword = $_POST['spassword'];
    

    
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$sid=$_SESSION['sid'];

$q = mysqli_query($conn, "UPDATE student_info set sname='$sname',semail='$semail',snumber='$snumber',saddr='$saddr',ssem='$ssem',spassword='$spassword' where sid='$sid' ");
if ($q) {
    $message = "Updated";
     echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:student_edit.php");
 } else {
     $message = "Not updated";
     echo "<script type='text/javascript'>alert('$message');</script>";
     //header("Location:facultypage.php");

 }

?>