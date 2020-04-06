<?php

include 'connection.php';
if (isset($_POST['sname']) && isset($_POST['snumber']) && isset($_POST['sroll']) && isset($_POST['semail']) && isset($_POST['spassword']) && isset($_POST['saddr']) && isset($_POST['sdob']) && isset($_POST['sbranch']) && isset($_POST['ssem']) && isset($_POST['ssec'])) {
    $sname = $_POST['sname'];
    $snumber = $_POST['snumber'];
    $sroll = $_POST['sroll'];
    $semail = $_POST['semail'];
    $spassword = $_POST['spassword'];
    $saddr = $_POST['saddr'];
    $sdob = $_POST['sdob'];
    $sbranch = $_POST['sbranch'];
    $ssem = $_POST['ssem'];
    $ssec = $_POST['ssec'];

    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query($conn, "INSERT INTO student_info ( sname,snumber,sroll,semail,spassword,saddr,sdob,sbranch,ssem,ssec) VALUES ('$sname','$snumber','$sroll','$semail','$spassword','$saddr','$sdob','$sbranch','$ssem','$ssec')");


if ($q) {
    $message = "Student added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addstudents.php");
} else {
    $message = "Enter Valid Info.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}

?>