<?php

include 'connection.php';

$id = $_GET['lab_name'];
$q = mysqli_query($conn,"DELETE FROM lab WHERE lab_name = '$id' ");
$drop = "DROP TABLE " . $id;
// $update = mysqli_query($conn,"UPDATE sections SET class_name = 'NOT-ALLOTED' WHERE class_name = '$id'");

$q = mysqli_query($conn, $drop);
if ($drop) {

    header("Location:addlab.php");
} else {
    echo 'Error';
}

// if ($q) {

//     header("Location:addclassrooms.php");

// } else {
//     echo 'Error';
// }
?>
