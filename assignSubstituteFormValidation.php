<?php

//$days = array("monday","tuesday","wednesday","thursday","friday","saturday");
//echo $_POST['CN'];
//echo $_POST['SB'];
include('sms.php');
//include('facultypage1.php');
include('getcellindex.php');
include('connection.php');
session_start();
$whose = $_SESSION['shown_id'];
//$sub = $_POST['SB'];
$class = $_POST['CN'];
$table = $_POST['select_teacher'];


$days = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday");
$day = $days[($class - 8) / 8];

$periods = array("period1", "period2", "period3", "period4", "period5", "period6");
$period = $periods[($class - 1) % 8];
//$query = mysqli_query($conn, "SELECT * FROM teachers WHERE faculty_number = '$whose'");
//$row = mysqli_fetch_assoc($query);
//$whose_name = $row['name'];
// $query = mysqli_query($conn, "SELECT * FROM teachers WHERE faculty_number = '$sub'");
$query = mysqli_query($conn, "SELECT * FROM $table ");

$row = mysqli_fetch_assoc($query);
$sub_name = $row['name'];
$whose = strtolower($whose);
$sub = strtolower($sub);
$query = mysqli_query($conn, "SELECT * FROM $sub WHERE day = '$day'");
$row = mysqli_fetch_assoc($query);
// $update = mysqli_query($conn,"UPDATE * FROM $table WHERE day = '$day' and period3 = '-<br>-' ");
$available = false;
if (true) {
    $update = mysqli_query($conn, "UPDATE * FROM $table SET '$period' = 'XL'  WHERE day = '$day' and '$period' = '-<br>-'");
    $message = 'Message Sent!';
    echo $table;

    
} else  {
    // echo "<script type='text/javascript'>alert('Selected substitute teacher is not available!');
    //     window.location.href = 'generatetimetable.php?display='$whose;</script>";
    echo "<script type='text/javascript'>alert('Selected substitute teacher is not available!');
    window.location.href = 'facultypage1.php';</script>";
}

$query = mysqli_query($conn, "SELECT * FROM $whose WHERE day = '$day'");
$row = mysqli_fetch_assoc($query);
$pieces = explode("<br>", $row[$period]);
/*echo $pieces[0]; // piece1
echo $pieces[1];
echo $whose_name;
echo $sub_name;
echo "<br>";*/
// $string = "Hello " . $sub_name . ", You have to take class " . $pieces[0] . " of " . $whose_name . " in " . $pieces[1] . "\n\n-Sent from TimeTable Management System AMU";
// $_SESSION['s'] = $string;
// echo 'Sending SMS...';

// if (isset($_POST['pwd'])) {
//     echo "<script type='text/javascript'>alert('Message Sent!');
//         window.location.href = 'generatetimetable.php?display=" . $whose . "';</script>";
// }
?>
<div class="content">
    <form method="post" id="smsform"><input type="hidden" name="uid" value="sender mobile number goes here"/>
        <input type="hidden" name="pwd" value="way2sms password goed here"/><input type="hidden" name="to" value="recipient mobile number goes here"/>
        <input type="hidden" name="msg" value="<?php echo $_SESSION['s'] ?>"/>
        <input type="hidden" value="Send SmS" id="send"/></form>
</div>
<script>
    //var send = document.getElementById('smsform');
    //send.submit();
</script>

