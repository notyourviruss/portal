<?php

      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $db =  'Login_Portal';

      $conn = mysqli_connect($host, $user, $pass, $db);
      if ($conn->connect_error){
        die('Problem In'. $conn->connect_error);
      }
?>