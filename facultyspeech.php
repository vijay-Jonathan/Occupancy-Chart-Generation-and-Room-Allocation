<?php
include 'connection.php'
      if(isset($_POST['fname']))
      {
          $ele = $_POST['fname'];
      }
      header('faculty_edit.php');
?>


