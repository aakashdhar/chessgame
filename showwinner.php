<?php include 'includes/header.php'; ?>
<?php

  if (!isset($_GET['winner'])) {
     echo "<script>window.location.href = 'profile.php'</script>";
  }else {
    if ($_SESSION['pointsred'] != 0) {
        $botid = $_SESSION['botid'];
        
      $sql_get_r_p = mysqli_query($con,"SELECT * FROM `tbl_redeem` where `player_id` = '".$_SESSION['playerid']."'");
      $row_get_r_p = mysqli_fetch_assoc($sql_get_r_p);
      $points = $row_get_r_p['points'];
      $balance = $row_get_r_p['balance'];
     
      $sql_get_r = mysqli_query($con,"SELECT * FROM `tbl_users` where `id` = '".$_SESSION['playerid']."'");
      $row_get_r = mysqli_fetch_assoc($sql_get_r);
      $win = $row_get_r['win'];
      $draw = $row_get_r['draw'];
      $lose = $row_get_r['lose'];
      $playerpoints = $row_get_r['player_points'];
      echo $botid.'-'.$balance.'-'.$playerpoints.'-'.$_SESSION['playerid'];
      
      $newwin =  $win + 1;
      $newlose = $lose - 1;
      
      $matchid = $_SESSION['matchid'];
      $sql_get_bot = mysqli_query($con,"SELECT * FROM `tbl_users` where `id` = '$botid'");
      $row_get_bot_r = mysqli_fetch_assoc($sql_get_bot);
      $win = $row_get_bot_r['win'];
      $draw = $row_get_bot_r['draw'];
      $lose = $row_get_bot_r['lose'];
      $botpoints = $row_get_bot_r['player_points'];
      
      
      $winner = $_GET['winner'];
      $reason = $_GET['reason'];
      if ($winner == 'u') {
        $winpoints = $_SESSION['pointsred'] * 2;
        $winpointsgame = $_SESSION['pointsred'] * 2;
        $winpoints = $playerpoints + $winpoints;
        $losepoints=$botpoints + $_SESSION['pointsred'];
        $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET `player_points`='$winpoints', `win` = '$newwin', `lose` = '$newlose' WHERE
          `id` = '".$_SESSION['playerid']."'");
          
        $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET `player_points`='$losepoints', `lose` = lose+1 WHERE
          `id` = '$botid'");
        
        $reedempoints = $points + ($_SESSION['pointsred'] * 2);
        $sql_update_points = mysqli_query($con,"UPDATE `tbl_redeem` SET `points`='$reedempoints' WHERE
            `id` = '".$_SESSION['playerid']."'");
        $sql_update_gametable = mysqli_query($con,"UPDATE `tbl_gametable` SET `winner`='".$_SESSION['playerid']."',`looser`='$botid',
        `loosing_reason`='$reason',`winning_points`='$winpointsgame' WHERE `id` = '$matchid';");
        
        unset($_SESSION['pointsred'],$_SESSION['botid'],$_SESSION['matchid']);
      }else {
        $winpoint = $_SESSION['pointsred'];
        $losepoints = $winpoint * .3;
        $losepoints1 = ceil($losepoints);
        
        $winpoints = $botpoints + $winpoint;

        $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET `player_points`='$winpoints', `win` = $win+1 WHERE `id` = '$botid'");
        $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET  `lose` = lose+1 WHERE
          `id` = '".$_SESSION['playerid']."'");
    
        $winpoints = $playerpoints + $losepoints1;

        $losepoints=$losepoints1+$points;
        
        $sql_update_points = mysqli_query($con,"UPDATE `tbl_redeem` SET `points`='$losepoints' WHERE
            `id` = '".$_SESSION['playerid']."'");

        $sql_update_p = mysqli_query($con,"UPDATE `tbl_users` SET `player_points`='$winpoints' WHERE
          `id` = '".$_SESSION['playerid']."'");
          
        $sql_update_gametable = mysqli_query($con,"UPDATE `tbl_gametable` SET `winner`='$botid',`looser`='".$_SESSION['playerid']."',
        `loosing_reason`='$reason',`winning_points`='$winpoint' WHERE `id` = '$matchid';");

        unset($_SESSION['pointsred'],$_SESSION['botid']);
      }
    }else {
      echo "<script>alert('Please do not try to change the outcome of the game')</script>";
    //   echo "<script>window.location.href = 'profile.php'</script>";
    }
  }
 ?>
 <script type="text/javascript">
  history.pushState(null, null, document.URL);
  window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
  });
 </script>
 <!-- PopAds.net Popunder Code for playearn.in -->
<!--<script type="text/javascript" data-cfasync="false">-->
<!--/*<![CDATA[/* */-->
<!--  var _pop = _pop || [];-->
<!--  _pop.push(['siteId', 2092329]);-->
<!--  _pop.push(['minBid', 0]);-->
<!--  _pop.push(['popundersPerIP', 0]);-->
<!--  _pop.push(['delayBetween', 0]);-->
<!--  _pop.push(['default', false]);-->
<!--  _pop.push(['defaultPerDay', 0]);-->
<!--  _pop.push(['topmostLayer', false]);-->
<!--  (function() {-->
<!--    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;-->
<!--    var s = document.getElementsByTagName('script')[0];-->
<!--    pa.src = '//c1.popads.net/pop.js';-->
<!--    pa.onerror = function() {-->
<!--      var sa = document.createElement('script'); sa.type = 'text/javascript'; sa.async = true;-->
<!--      sa.src = '//c2.popads.net/pop.js';-->
<!--      s.parentNode.insertBefore(sa, s);-->
<!--    };-->
<!--    s.parentNode.insertBefore(pa, s);-->
<!--  })();-->
<!--/*]]>/* */-->
<!--</script>-->
<!-- PopAds.net Popunder Code End -->
<style media="screen">
body{
background-image: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.0)),url(../images/showwinner.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	background-attachment: fixed;
}
.jumbotron{
    background:rgba(255,255,255,0.9);
        border-radius: 0px !important;
    -webkit-box-shadow: 12px 10px 17px -2px rgba(0,0,0,0.75);
-moz-box-shadow: 12px 10px 17px -2px rgba(0,0,0,0.75);
box-shadow: 12px 10px 17px -2px rgba(0,0,0,0.75);
margin-top:12em;
}
.jumbotron h1{
  font-size: 2.5em;
  
}
/*.outer {*/
/*  display: table;*/
/*  position: absolute;*/
/*  height: 100%;*/
/*  width: 100%;*/
  
/*}*/

/*.middle {*/
/*  display: table-cell;*/
/*  vertical-align: middle;*/
/*}*/

/*.inner {*/
/*  margin-left: auto;*/
/*  margin-right: auto;*/
  width: /*whatever width you want*/;
 
/*}*/
</style>

 <?php if ($_GET['winner'] == 'u'): ?>
   <!--<div class="outer">-->
   <!--  <div class="middle">-->
   <!--    <div class="inner">-->
         
   <!--    </div>-->
   <!--  </div>-->
   <!--</div>-->
   <div class="container">
   <div class="row">
     <div class="jumbotron">
       <h1>Congratulations!! You have won the game <?= $winpoints  ?></h1>
       <a href="profile.php" class="btn btn-link">Wanna Play Again!</a>
     </div>
   </div>
 </div>
  <?php else: ?>
    <!--<div class="outer">-->
    <!--  <div class="middle">-->
    <!--    <div class="inner">-->
         
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
     <div class="container">
        <div class="row">
          <div class="jumbotron">
            <h1>Sorry!! You Lost the game. <br> Dont worry you have earned <?= $losepoints1 ?> Points</h1>
            <a href="profile.php" class="btn btn-link" style="font-size:1.5em">Wanna Play Again!</a>
          </div>
        </div>
      </div>
 <?php endif; ?>
<?php include 'includes/footer.php'; ?>
