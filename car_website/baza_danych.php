<?php
    $servername='127.0.0.1';
    $username='nikusianiksa';
    $password='Nikanika.01bazy';
    $dbname = "nikusianiksa";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>