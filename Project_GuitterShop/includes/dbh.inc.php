<?php

  $dbServername = "localhost";
  $dbUsername = ""; //your db username
  $dbPassword = ""; //password
  $dbName = ""; //name ur db as this

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 

  if(!conn){
      die("Connection failed: ".mysqli_connect_error());
  }
