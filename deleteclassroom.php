<?php

include 'connection.php';

$id = $_GET['croom_no'];
$q = mysqli_query($conn,"DELETE FROM classrooms WHERE croom_no = '$id' ");
$drop = "DROP TABLE " . $id;
$update = mysqli_query($conn,"UPDATE sections SET class_name = 'NOT-ALLOTED' WHERE class_name = '$id'");

$q = mysqli_query($conn, $drop);
if ($drop) {

    header("Location:addclassrooms.php");
} else {
    echo 'Error';
}

// if ($q) {

//     header("Location:addclassrooms.php");

// } else {
//     echo 'Error';
// }
?>
