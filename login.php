<?php include 'core/init.php'; ?>
<?php
  if (isset($_SESSION['playerid'])) {
    echo "<script>window.location.href = 'profile.php'</script>";
  }
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_check = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `player_email` = '$username' and `player_password` = '$password'");

    if (mysqli_num_rows($sql_check) > 0) {
      $row = mysqli_fetch_assoc($sql_check);

      $_SESSION['playername'] = $row['player_name'];
      $_SESSION['playerid'] = $row['id'];

      $sql_update = mysqli_query($con,"UPDATE `tbl_users` SET `last_logged`= NOW(),`current_status`='online' WHERE `id` = '".$row['id']."'");
      echo "<script>window.location.href = 'profile.php'</script>";
    }else {
      echo "<script>alert('no such account found')</script>";
    }
  }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chess</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/homestyle.css">
</head>
<body class="login-page">
  <div class="container">
	<div class="row login_box">
	   <div class="col-md-12 col-xs-12" align="center" style="padding:30px">
      <span class="wow fadeInLeftBig">
        <span class="span-size1 span-one">Play</span><span class="span-size1 span-two">Earn</span>
      </span>
	    </div>
        <div class="col-md-12 col-xs-12 login_control">
          <form class="" action="" method="post" autocomplete="off">
            <div class="control">
                <div class="label text-left">Email Address</div>
                <input type="text" class="form-control" name="username" placeholder="Enter Email" autofocus required/>
            </div>

            <div class="control">
                <div class="label">Password</div>
                <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="new-password" required/>
            </div>
            <div align="center">
              <button type="submit" name="submit" class="btn btn-orange">LOGIN</button>
            </div>
          </form>
          <div align="center">
            - OR -
          </div>
            <a href="register.php" style="color:#21202E">Register</a> |
            <a href="forgotpassword.php">Forgot Password</a>
            
        </div>
        <div>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Login -->
<ins class="adsbygoogle"
     style="display:inline-block;width:472px;height:110px"
     data-ad-client="ca-pub-6964407832457862"
     data-ad-slot="5275447764"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
    </div>
    
</div>

</body>

</html>
