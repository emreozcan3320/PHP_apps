<?php
  //Create Connection to Database
  $conn = mysqli_connect('localhost','root','','phpblog');

  //check the Connection
  if (mysqli_connect_errno()) {
    //connection failed
    echo 'Failed to connect to MySQL'.mysqli.connect_errno();
  }

 ?>
