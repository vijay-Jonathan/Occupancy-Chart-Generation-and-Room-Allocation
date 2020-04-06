<?php
include 'connection.php'
      if(isset($_POST['sname']))
      {
          $ele = $_POST['sname'];
      }
      header('student_edit.php');
?>


