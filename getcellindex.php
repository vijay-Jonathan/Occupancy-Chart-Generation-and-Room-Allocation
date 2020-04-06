<?php
        
session_start();
$class = $_GET["i"];
// $str = "<option selected disabled>Select</option>";
$days = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday");
$day = $days[($class - 8) / 8];
$periods = array("period1", "period2", "period3", "period4", "period5", "period6");
$period = $periods[($class - 1) % 8];
// $q = mysqli_query($conn, "SELECT * FROM subjects ");
// while ($row = mysqli_fetch_assoc($q)) {
//     $query = mysqli_query($conn, "SELECT * FROM " . $row['subject_name']);
//     $r = mysqli_fetch_assoc($query);
   
//         $str .= " \"<option value=\"{$row['subject_name']}\">{$row['subject_name']}</option>\"";
    
// }
// echo $str;




?>