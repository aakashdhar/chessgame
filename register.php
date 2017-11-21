<?php include 'core/init.php'; ?>
<?php
  $sql_cat = mysqli_query($con,"SELECT * FROM `tbl_countries`");
  mysqli_set_charset($con,"utf8");

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];

    $sql_check = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `player_email` = '$email'");

    if (mysqli_num_rows($sql_check) > 0) {
      echo "<script>alert('A user with this email already exists')</script>";
    }else {
      $sql_insert = mysqli_query($con,"INSERT INTO `tbl_users`(`player_name`, `player_email`, `player_mobile`,
        `player_password`, `player_country`) VALUES ('$name','$email','$mobile','$password','$country')");

      if ($sql_insert) {

        $_SESSION['playername'] = $name;
        $_SESSION['playerid'] = mysqli_insert_id($con);

        $sql_redeem_insert = mysqli_query($con,"INSERT INTO `tbl_redeem`(`player_id`, `points`, `redeem_points`,
          `balance`) VALUES ('".$_SESSION['playerid']."','0','0','0')");
        echo "<script>window.location.href = 'login.php'</script>";
      }else {
        echo "<script>alert('fail')</script>";
      }
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
   <link rel="stylesheet" href="css/select2.css">
   <link rel="stylesheet" href="css/homestyle.css">
 </head>
 <body class="login-page">
  <div class="container">
 	<div class="row login_boxs">
 	   <div class="col-md-12 col-xs-12" align="center" style="padding:30px">
       <span class="wow fadeInLeftBig">
         <span class="span-size1 span-one">Play</span><span class="span-size1 span-two">Earn</span>
       </span>
 	    </div>
         <div class="col-md-12 col-xs-12 login_control">
           <form class="" action="" method="post" autocomplete="off">
             <div class="control">
                 <div class="label text-left">Name</div>
                 <input type="text" maxlength="12" class="form-control" name="name" placeholder="Enter Name" autofocus required/>
             </div>
             <div class="control">
                 <div class="label text-left">Email Address</div>
                 <input type="email" class="form-control" name="email" placeholder="Enter Email"  required/>
             </div>
             <div class="control">
                 <div class="label text-left">Mobile Number</div>
                 <input type="text" class="form-control" name="mobile"  maxlength="10" placeholder="Enter Mobile Number" onkeypress="return isOnlyNumberKey(event)"/>
             </div>
             <div class="control">
                 <div class="label">Password</div>
                 <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="new-password" required/>
             </div>
             <div class="control">
                 <div class="label">Country</div>
                 <select class="form-control select2" name="country" required>
                   <option value="">Select Country</option>
                   <?php while($row = mysqli_fetch_object($sql_cat)): ?>
                     <option value="<?= $row -> alpha_2 ?>"><?= $row -> name ?></option>
                   <?php endwhile; ?>
                 </select>
             </div>
             <div align="center">
               <button type="submit" name="submit" class="btn btn-orange">REGISTER</button>
             </div>
             <a href="login.php">Already have an account Login</a>
           </form>
     </div>
 </div>
 <script src="js/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="js/bootstrap.js"></script>
 <script src="js/select2.full.js"></script>
 <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
 </script>
 <script>
    function isOnlyNumberKey(evt){
      var charCode = (evt.which) ? evt.which : evt.keyCode
     if ( charCode > 31 && (charCode < 48 || charCode > 57)){
          return false;
      }
      return true;
    }
</script>
</body>
</html>
