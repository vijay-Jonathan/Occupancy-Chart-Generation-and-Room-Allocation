<?php

include 'connection.php';

$id = $_GET['name'];
$q = mysqli_query($conn,"DELETE FROM sections WHERE sec_name = '$id' ");
$drop = "DROP TABLE " . $id;
$update = mysqli_query($conn,"UPDATE classrooms SET sec_name = 'NOT-ALLOTED' WHERE sec_name = '$id'");

$q = mysqli_query($conn, $drop);
if ($drop) {

    header("Location:addsection.php");
} else {
    echo 'Error';
}

// if ($q) {

//     header("Location:addclassrooms.php");

// } else {
//     echo 'Error';
// }
?>
