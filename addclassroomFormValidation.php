<?php

// include 'connection.php';
// if (isset($_POST['CN'])) {
//     $name = $_POST['CN'];
//     //  $message = "nTry again.";
//     // echo "<script type='text/javascript'>alert('$message');</script>";
// } else {
//     $message = "dead.";
//     echo "<script type='text/javascript'>alert('$message');</script>";
//     die();
// }
// $q = mysqli_query($conn, "INSERT INTO classrooms VALUES ('$name',0)");
// if ($q) {
//     $message = "Classroom added.";
//     echo "<script type='text/javascript'>alert('$message');</script>";
//     header("Location:addclassrooms.php");
// } else {
//     $message = "Username and/or Password incorrect.\\nTry again.";
//     echo "<script type='text/javascript'>alert('$message');</script>";
//     // header("Location:index.html");

// }
?>

<?php

include 'connection.php';
if (isset($_POST['CN']) && isset($_POST['CS']) && isset($_POST['CPP']) && isset($_POST['CP']) && isset($_POST['SC']) && isset($_POST['SK']) ) {
    $roomno = $_POST['CN'];
    $cstrength = $_POST['CS'];
    $cpowerpoint = $_POST['CPP'];
    $projector = $_POST['CP'];
    $smartclass = $_POST['SC'];
    $speaker = $_POST['SK'];
    // $section = $_POST['SEC'];
    // $password = $_POST['TPP'];
    // $address = $_POST['TA'];
    //  $message = "nTry again.";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query($conn, "INSERT INTO classrooms ( croom_no,c_strength,pp_no,projector,smart_class,speaker,sec_name ) VALUES ('$roomno','$cstrength','$cpowerpoint','$projector','$smartclass','$speaker','NOT-ALLOTED')");
 $sql = "CREATE TABLE " . $roomno . " (
 dayid VARCHAR(10) PRIMARY KEY, 
 day VARCHAR(10), 
 period1 VARCHAR(30),
 period2 VARCHAR(30),
 period3 VARCHAR(30),
 period4 VARCHAR(30),
 period5 VARCHAR(30),
 period6 VARCHAR(30),
 runtime VARCHAR(30)
 )";
 mysqli_query($conn, $sql);
 
 $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
 for ($i = 0; $i < 5; $i++) {
     $day = $days[$i];
     $sql = "INSERT into " . $roomno . " VALUES('$i','$day','-<br>-','-<br>-','-<br>-','-<br>-','-<br>-','-<br>-','-<br>-')";
     mysqli_query($conn, $sql);
 }
if ($q) {
    $message = "Classroom added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    header("Location:addclassrooms.php");
} else {
    $message = "incorrect InFo.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}

?>