<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "sms";
 
       // Create connection
 
       $conn = new mysqli($servername, $username, $password, $dbname);
 
       // Check connection
 
       if ($conn->connect_error) {
 
           die("Connection failed: " . $conn->connect_error);
 
       } 
 
       $sql = "SELECT * from kotak_masuk where status_baca = 0";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       $count = $result->num_rows;
       echo $count;
       $conn->close();
?>