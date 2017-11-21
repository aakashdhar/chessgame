<?php
  session_start();
  $con = mysqli_connect('localhost','playearn_chess','amigos@123','playearn_chess');


  if(!$con){
     die('Error Connecting to the database');
  }

?>
