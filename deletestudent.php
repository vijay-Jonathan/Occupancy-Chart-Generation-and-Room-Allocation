<?php

include 'connection.php';
$id = $_GET['sroll'];
$q = mysqli_query($conn,"DELETE FROM student_info WHERE sroll = '$id' ");

if ($q) {

    header("Location:addstudents.php");

} else {
    echo 'Error';
}
?>

