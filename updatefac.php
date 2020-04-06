<?php
session_start();

include('connection.php');
if (isset($_POST['fname']) && isset($_POST['femailid']) && isset($_POST['fcontact_number']) && isset($_POST['faddress']) && isset($_POST['fpassword']) ) {
    $fname = $_POST['fname'];
    $fcontact_number = $_POST['fcontact_number'];
    $femailid = $_POST['femailid'];
    $faddress = $_POST['faddress'];
    $fpassword = $_POST['fpassword'];

    
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$fid=$_SESSION['tid'];

$q = mysqli_query($conn, "UPDATE teachers set name='$fname',emailid='$femailid',contact_number='$fcontact_number',address='$faddress',password='$fpassword' where faculty_number='$fid' ");
if ($q) {
    $message = "Updated";
     echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:faculty_edit.php");
 } else {
     $message = "Not updated";
     echo "<script type='text/javascript'>alert('$message');</script>";
     //header("Location:facultypage.php");

 }

?>