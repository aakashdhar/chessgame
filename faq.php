<?php include 'core/init.php' ?>
<?php
  $sql_get = mysqli_query($con,"SELECT * FROM `tbl_faq`");
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/faqstyle.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<title>FAQ PlayEarn</title>
</head>
<body class="body-image">
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
<section class="cd-faq">
    <div class="row text-center">
        <h3 class="" style="color:white; margin-bottom:20px;font-size:2.5em;">Frequently Asked Question</h3>
    </div>
	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
			<?php while($row_get = mysqli_fetch_assoc($sql_get)): ?>
			<li>
				<a class="cd-faq-trigger" href="#0"><?= $row_get['question'] ?></a>
				<div class="cd-faq-content">
					<p><?= $row_get['answer'] ?></p>
				</div> <!-- cd-faq-content -->
			</li>
			<?php endwhile; ?>
		</ul> <!-- cd-faq-group -->
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>