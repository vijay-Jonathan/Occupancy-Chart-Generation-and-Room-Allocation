<?php

include 'connection.php';
if (isset($_POST['LN']) && isset($_POST['LS']) && isset($_POST['LSS']) && isset($_POST['LP']) && isset($_POST['LK']) ) {
    $lab_name = $_POST['LN'];
    $lab_strength = $_POST['LS'];
    $systems = $_POST['LSS'];
    $projector = $_POST['LP'];
    $speaker = $_POST['LK'];
    
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query($conn, "INSERT INTO lab ( lab_name,lab_strength,systems,projector,speaker) VALUES ('$lab_name','$lab_strength','$systems','$projector','$speaker')");
 $sql = "CREATE TABLE " . $lab_name . " (
 dayid VARCHAR(10) PRIMARY KEY, 
 day VARCHAR(10), 
 period1 VARCHAR(30),
 period2 VARCHAR(30),
 period3 VARCHAR(30),
 period4 VARCHAR(30),
 period5 VARCHAR(30),
 period6 VARCHAR(30)
 )";
 mysqli_query($conn, $sql);
 
 $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
 for ($i = 0; $i < 5; $i++) {
     $day = $days[$i];
     $sql = "INSERT into " . $lab_name . " VALUES('$i','$day','-<br>-','-<br>-','-<br>-','-<br>-','-<br>-','-<br>-')";
     mysqli_query($conn, $sql);
 }
if ($q) {
    $message = "Lab added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    header("Location:addlab.php");
} else {
    $message = "incorrect InFo.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}

?>