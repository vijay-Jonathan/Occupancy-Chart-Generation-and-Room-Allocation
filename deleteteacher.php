<?php

include 'connection.php';
$id = $_GET['name'];
$q = mysqli_query($conn,"DELETE FROM teachers WHERE faculty_number = '$id' ");
$drop = "DROP TABLE " . $id;

$q = mysqli_query($conn, $drop);
if ($drop) {

    header("Location:addteachers.php");

} else {
    echo 'Error';
}
?>

