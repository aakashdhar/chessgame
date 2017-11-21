<?php include 'core/init.php'; ?>
<?php
  if (isset($_POST['emailsubmit'])) {
    $email = $_POST['email'];
    $_SESSION['forgotpasswordemail'] = $email;
    $sql_check = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `player_email` = '$email'");

    if(mysqli_num_rows($sql_check) < 1){
      echo "<script>alert('There is no registered email with this email id')</script>";
      echo "<script>window.location.href = 'forgotpassword.php'</script>";
    }else{
    $digits = 6;
    $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
    //$otp = '12345';
    $_SESSION['forgotpassotp'] = $otp;
    $to = $email;
    $subject = 'Your OTP for password change:';
    $message = "<h4>You recently requested a password change for your PlayEarn account. Please find the OTP to complete the process</h4>";
    $message .= "<h4>Your generated OTP for completing the password reset is: </h4>".$otp;
    $message .= "<p>If this request was not generated by you please let us know by sending us a email at info@playearn.in</p> <br>";
    $message .= "Thanks,<br>";
    $message .= "PlayEarn Team";

    $headers .= "From:  PlayEarn <info@playearn.in>\n" ;
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    // send email
    //$mail = mail($to, $subject, $message, $headers);

    if (mail($to, $subject, $message, $headers)) {
      echo "<script>alert('A mail with your otp for changing the password has been sent')</script>";
      echo "<script>window.location.href = 'forgotpassword.php?otpsent=true'</script>";
    }else {
      echo "<script>alert('Your otp mail couldnt be sent please refresh the page')</script>";
    }
    }
  }

 if (isset($_POST['otpsubmit'])) {
   $otpentered = $_POST['otpentered'];

   if ($otpentered == $_SESSION['forgotpassotp']) {
     echo "<script>alert('Otp Successfully Entered')</script>";
     echo "<script>window.location.href = 'forgotpassword.php?otpcorrect=true'</script>";
   }else {
     echo "<script>window.location.href = 'forgotpassword.php?otpwrong=true'</script>";
   }
 }

 if (isset($_POST['passwordsubmit'])) {
   $password = $_POST['password'];
   $repassword = $_POST['repassword'];

   $sql_update_password = mysqli_query($con,"UPDATE `tbl_users` SET `player_password`='$password'  WHERE `player_email` = '".$_SESSION['forgotpasswordemail']."'");

   if ($sql_update_password) {
     echo "<script>alert('Password Changed Successfully')</script>";
     echo "<script>window.location.href = 'login.php'</script>";
   }else {
     echo "<script>alert('Password Change Failed')</script>";
   }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PlayEarn Forgot Password</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/select2.css">
  <link rel="stylesheet" href="css/homestyle.css">
  <script>
   function validateForm() {
       var x = document.forms["myForm"]["password"].value;
       var y = document.forms["myForm"]["repassword"].value;
       if (x != y) {
          alert("The pasword retype Password feild do not match");
          return false;
       }else {
         return true;
       }
     }
 </script>
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
          <?php if (isset($_GET['otpsent'])): ?>
          <form class="" action="" method="post" autocomplete="off">
            <div class="control">
                <div class="label text-left">Name</div>
                <input type="text" class="form-control" id="" name="otpentered" placeholder="Enter the OTP sent on your registered email">
            </div>
              <button type="submit" name="otpsubmit" class="btn btn-orange">SUBMIT OTP</button>
            </form>
            <?php elseif(isset($_GET['otpcorrect'])): ?>
              <form action="" method="post" autocomplete="off" name="myForm" onsubmit="return validateForm()">
                <div class="control">
                    <div class="label text-left">Enter password</div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                </div>
                <div class="control">
                    <div class="label text-left">Re type password</div>
                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Retype password">
         	   </div>
         	   <input type="submit" name="passwordsubmit" value="SUBMIT Password" class="btn btn-orange">
                 </form>
             <?php elseif(isset($_GET['otpwrong'])): ?>
              <p>You entered the wrong OTP please click on the button to reset the form and start the process again</p>
              <a href="forgotpassword.php" class="btn btn-orange">Reset Process</a>
            <?php elseif(!isset($_GET['otpcorrect']) || !isset($_GET['otpsent']) || !isset($_GET['otpwrong'])): ?>
             <form action="" method="post" autocomplete="off">
               <div class="control">
                   <div class="label text-left">Enter your registered email</div>
               <input type="email" class="form-control" id="" name="email" placeholder="Enter your registered email">
                   </div>
                  <input type="submit" name="emailsubmit" value="ENTER EMAIL" class="btn  btn-orange">
                </form>
             <?php endif; ?>

    </div>
</div>
</body>
</html>