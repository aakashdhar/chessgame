<?php include 'core/init.php'; ?>
<?php
error_reporting(0);
  if (!isset($_SESSION['playerid'])) {
    echo "<script>window.location.href = 'login.php'</script>";
  }else {
    $sql_get = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `id` = '".$_SESSION['playerid']."'");
    $row_get = mysqli_fetch_assoc($sql_get);
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PlayEarn</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link type="text/css" rel="stylesheet" href="game/css/sweetalert.css">
  <link rel="stylesheet" href="css/homestyle.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation" style="border-radius:0px;">
   <div class="container-fluid">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <!--<a class="navbar-brand" href="#"></a>-->
     </div>
     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="navbar">
       <ul class="nav navbar-nav">
         <!--<li class="active"><a href="index.php">PlayEarn</a></li>-->
         <!--<li><a href="#"></a></li>-->

       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="profile.php">Home</a></li> 
         <li><a href="faq.php">F.A.Q</a></li>
         <li><a href="tandc.php">T & C</a></li>
         <li><a href="about.php">About Us</a></li>
         <li><a href="redeem.php">Redeem Points</a></li>
         <li><a href="refer.php">Refer</a></li>
         <li><a href="leaderboard.php">Leader Board</a></li>
         <li><a href="logout.php">Logout</a></li>

       </ul>
     </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
 </nav>