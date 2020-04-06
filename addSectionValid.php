<?php

include 'connection.php';
if (isset($_POST['SN']) && isset($_POST['SS']) && isset($_POST['CR']) ) {
    $sname = $_POST['SN'];
    $spop = $_POST['SS'];
    $classroom_no = $_POST['CR'];

   
    $sqls = "SELECT sec_name FROM sections WHERE sec_name='$sname'";
    $run_query=mysqli_query($conn,$sqls);
    $row=mysqli_fetch_array($run_query);
    $name=$row['sec_name'];

    $cc = "SELECT class_name FROM sections WHERE class_name='$classroom_no'";
    $run_query2=mysqli_query($conn,$cc);
    $crow=mysqli_fetch_array($run_query2);
    $rnmae=$crow['class_name'];


    $ss = "SELECT c_strength FROM classrooms WHERE croom_no='$classroom_no'";
    $run_query3=mysqli_query($conn,$ss);
    $srow=mysqli_fetch_array($run_query3);
    $pop=$srow['c_strength'];


  


    if($rnmae==$classroom_no){
        $message = "Alredy Exist";
        echo "<script type='text/javascript'>alert('Class Room Alredy Alloted : $classroom_no');</script>";
    die();
    }elseif ($name==$sname) {
        # code...
        $message = "Alredy Exist";
        echo "<script type='text/javascript'>alert('Section Alredy Exist : $sname');</script>";
    die();
    }
    elseif ($spop>$pop) {
        # code...
        $message = "Strength";
        echo "<script type='text/javascript'>alert('Strength is MORE : $spop');</script>";
    die();
    }
    
    
    
    else{



$sq = mysqli_query($conn, "INSERT INTO sections (sec_name ,sec_strength,class_name ) VALUES ('$sname','$spop','$classroom_no')");
$qq = mysqli_query($conn, "UPDATE classrooms SET sec_name= '$sname' WHERE classrooms.croom_no='$classroom_no'");

$sql = "CREATE TABLE " . $sname . " (
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
    $sql = "INSERT into " . $sname . " VALUES('$i','$day','','','','','','')";
    mysqli_query($conn, $sql);
}
if ($qq) {
    $message = "ClassRoom  added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsection.php");
} else {
    $message = "Section Details Incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}

if ($aq) {
    $message = "Scction added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsection.php");
} else {
    $message = "Section Details Incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location:index.php");

}



    }











} else {
    $message = "Enter The Missed Details";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
//$q = mysqli_query($conn, "INSERT INTO sections (sec_name ,sec_strength,class_name ) VALUES ('$sname','$spop','$classroom_no')");
// $qq = mysqli_query($conn, "UPDATE classrooms SET sec_name= '$sname' WHERE classrooms.croom_no='$classroom_no'");

// $sql = "CREATE TABLE " . $sname . " (
// dayid VARCHAR(10) PRIMARY KEY,
// day VARCHAR(10), 
// period1 VARCHAR(30),
// period2 VARCHAR(30),
// period3 VARCHAR(30),
// period4 VARCHAR(30),
// period5 VARCHAR(30),
// period6 VARCHAR(30)
// )";
// mysqli_query($conn, $sql);
// $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
// for ($i = 0; $i < 5; $i++) {
//     $day = $days[$i];
//     $sql = "INSERT into " . $sname . " VALUES('$i','$day','','','','','','')";
//     mysqli_query($conn, $sql);
// }
// if ($qq) {
//     $message = "ClassRoom  added.\\nTry again.";
//     echo "<script type='text/javascript'>alert('$message');</script>";
//     header("Location:addsection.php");
// } else {
//     $message = "Section Details Incorrect.\\nTry again.";
//     echo "<script type='text/javascript'>alert('$message');</script>";
//     // header("Location:index.php");

// }
// if ($q) {
//     $message = "Scction added.\\nTry again.";
//     echo "<script type='text/javascript'>alert('$message');</script>";
//     header("Location:addsection.php");
// } else {
//     $message = "Section Details Incorrect.\\nTry again.";
//     echo "<script type='text/javascript'>alert('$message');</script>";
//     // header("Location:index.php");

// }

?>