<?php
include 'connection.php'
      if(isset($_POST['UN']))
      {
          $ele = $_POST['UN'];
      }
      else
      {
        $ele = ' ';
      }
      header('index.php');
?>


