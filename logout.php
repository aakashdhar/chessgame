<?php
  include 'core/init.php';
  $sql_update = mysqli_query($con,"UPDATE `tbl_users` SET `current_status`='offline' WHERE `id` = '".$_SESSION['playerid']."'");
  session_destroy();

  echo "<script>window.location.href = 'login.php'</script>";

 ?>
