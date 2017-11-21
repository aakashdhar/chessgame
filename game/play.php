<?php include '../core/init.php'; ?>
 <?php
  if (!isset($_GET['challenger'])) {
    echo "<script>window.location.href = '../index.php'</script>";
  }
  if (!isset($_SESSION['playerid'])) {
    echo "<script>window.location.href = '../login.php'</script>";
  }
  if (isset($_GET['challenger'])) {
    $challengerid = $_GET['challenger'];
    $challengedto = $_GET['challengedto'];
    $sql_get_from  = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `id` = '$challengerid'");
    $row_get_from = mysqli_fetch_assoc($sql_get_from);
    $playername=$row_get_from['player_name'];
    $_SESSION['from'] = $challengerid;
    $sql_get_to  = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `id` = '$challengedto'");
    $row_get_to = mysqli_fetch_assoc($sql_get_to);
    $botname=$row_get_to['player_name'];
    $_SESSION['to'] = $challengedto;
    
    
    
    $total_play_time = $row_get_to['total_play_time'];
    // $minutes = gmdate("i", $total_play_time);
    $minutes = $total_play_time;

    $permovetime = $row_get_to['per_move_time'];

  }

  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="Chess, Chessboard, Javascript, Play Chess, Javascript Chess, three.js, chessboard.js, chessboard3.js">
        <title>chess</title>

        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

        <link type="text/css" rel="stylesheet" href="css/site.css">
        <link type="text/css" rel="stylesheet" href="css/chessboard.css">
        <link type="text/css" rel="stylesheet" href="css/play.css">
        <link type="text/css" rel="stylesheet" href="css/sweetalert.css">
        <link rel="stylesheet" href="css/flipclock.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/offline-js/0.7.19/themes/offline-theme-chrome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/offline-js/0.7.19/themes/offline-language-english.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        
        
        <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/jquery.sonic-gauge.js"></script>
        <script type="text/javascript" src="js/three.js"></script>
        <script type="text/javascript" src="js/OrbitControls.js"></script>
        <script type="text/javascript" src="js/chessboard3.js"></script>

        <!--Use chessboard.js as a fallback library -->
        <script type="text/javascript" src="js/chessboard.js"></script>

        <!-- game state, move validation, PGN, etc -->
        <script type="text/javascript" src="js/chess.js"></script>

        <script type="text/javascript" src="js/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/offline-js/0.7.19/offline.js" charset="utf-8"></script>
      	<!-- include the countdown plugin -->
      	<script src="js/flipclock.js"></script>
      	<script type="text/javascript" src="js/play.js"></script>
      	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/offline-js/0.7.19/offline.js" charset="utf-8"></script>-->
      	<script>
            // Load GPT asynchronously
            var googletag = googletag || {};
            googletag.cmd = googletag.cmd || [];
            (function() {
              var gads = document.createElement("script");
              gads.async = true;
              gads.type = "text/javascript";
              var useSSL = "https:" == document.location.protocol;
              gads.src = (useSSL ? "https:" : "http:") +
              "//www.googletagservices.com/tag/js/gpt.js";
              var node = document.getElementsByTagName("script")[0];
              node.parentNode.insertBefore(gads, node);
            })();
        </script>
    
         
        <script>
          googletag.cmd.push(function() {
           // Define the ad slot
           var slot2 =  googletag.defineSlot('/21627176021/PlayLeft', [250, 250], 'playleft').setTargeting("test", "refresh").addService(googletag.pubads());
            // Start ad fetching
            googletag.enableServices();
            googletag.display("playleft");
            
            // Set timer to refresh slot every 30 seconds
           setInterval(function(){googletag.pubads().refresh([slot2]);}, 30000);
          });
        </script>
        
        <script>
          googletag.cmd.push(function() {
            // Define the ad slot
            var slot1 = googletag.defineSlot('/21627176021/PlayRight', [250, 250], 'playright').setTargeting("test", "refresh").addService(googletag.pubads());
            
            // Start ad fetching
               googletag.enableServices();
               googletag.display("playright");
            
            // Set timer to refresh slot every 30 seconds
           setInterval(function(){googletag.pubads().refresh([slot1]);}, 30000);
          });
        </script>
    </head>
    <style media="screen">
      .clock {
        transform-origin: 0 0;
        transform: scale(.40);
        -ms-transform: scale(.40);
        -webkit-transform-origin: 0 0;
        -webkit-transform: scale(.40);
        -o-transform-origin: 0 0;
        -o-transform: scale(.40);
        -moz-transform-origin: 0 0;
        -moz-transform: scale(.40);
      }
      #playerb{
        transform-origin: 0 0;
        transform: scale(.30);
        -ms-transform: scale(.30);
        -webkit-transform-origin: 0 0;
        -webkit-transform: scale(.30);
        -o-transform-origin: 0 0;
        -o-transform: scale(.30);
        -moz-transform-origin: 0 0;
        -moz-transform: scale(.30);
      }
      #playera{
        transform-origin: 0 0;
        transform: scale(.30);
        -ms-transform: scale(.30);
        -webkit-transform-origin: 0 0;
        -webkit-transform: scale(.30);
        -o-transform-origin: 0 0;
        -o-transform: scale(.30);
        -moz-transform-origin: 0 0;
        -moz-transform: scale(.30);
      }
      .highlight-white {
        -webkit-box-shadow: inset 0 0 3px 3px black;
        -moz-box-shadow: inset 0 0 3px 3px black;
        box-shadow: inset 0 0 3px 3px black;
      }
      .highlight-black {
        -webkit-box-shadow: inset 0 0 3px 3px #d31717;
        -moz-box-shadow: inset 0 0 3px 3px #d31717;
        box-shadow: inset 0 0 3px 3px #d31717;
      }
    </style>
    <body>
<!--        <form onsubmit="googletag.pubads().refresh();return false;">-->
<!--  <input type="submit" value="refresh" />-->
<!--</form>-->
       <div id="abcd" style="display:none"></div>
        <input type="hidden" id="permvt" value="<?= $permovetime ?>" />
        <article id="container">
          <div class="row">
            <div class="col-md-3">
                <div class="row user-header">
                <div class="col-md-6">
                  <img src="../flags/64x64/<?= $row_get_from['player_country'] ?>.png" alt="">
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <h5 class="pull-left"><strong>Points:</strong> <?= $row_get_from['player_points'] ?></h5> <br>
                  </div>
                  <div class="row">
                    <h5 class="pull-left"><strong>Game Stats:</strong> <span  data-toggle="tooltip" title="Win"><?= $row_get_from['win'] ?></span> / <span data-toggle="tooltip" title="Lose"><?= $row_get_from['lose'] ?></span> / <span data-toggle="tooltip" title="Draw"><?= $row_get_from['draw'] ?></span></h5>
                  </div>
                </div>
              </div>
              <h3 style="font-size:1em"><?= $playername ?> 's per move time</h3>
              <div id="playera" style="margin:2em;"></div>
            </div>
            <center>
            <div class="col-md-6">
              <h3 class="header-title" >Total Game Time</h3>
              <div>
                <div style="width:100%; margin-left:35%;">
                <div class="clock" style="margin-top:2em; "></div>
                </div>
              </div>
            </div>
          </center>
            <div class="col-md-3">
                <div class="row user-header">
                <div class="col-md-6">
                  <img src="../flags/64x64/<?= $row_get_to['player_country'] ?>.png" alt="">
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <h5 class="pull-left"><strong>Points:</strong> <?= $row_get_to['player_points'] ?></h5> <br>
                  </div>
                  <div class="row">
                    <h5 class="pull-left"><strong>Game Stats:</strong> <span  data-toggle="tooltip" title="Win"><?= $row_get_to['win'] ?></span> / <span data-toggle="tooltip" title="Lose"><?= $row_get_to['lose'] ?></span> / <span data-toggle="tooltip" title="Draw"><?= $row_get_to['draw'] ?></span></h5>
                  </div>
                </div>
              </div>
              <h3 style="font-size:1em"> <?= $botname ?> 's per move time</h3>
              <div style="width:100%; margin-left:50%;">
                <div id="playerb" class="" style="margin:2em;"></div>
              </div>
            </div>
          </div>
            <div class="row">
              <div id="board">
                  <h1 class="vertical-align">LOADING...</h1>
              </div>
            </div>
            <div id="">
            <div class="col-md-3"  style="position:absolute; top:33%;">
                <!-- /21627176021/PlayLeft -->
                <!--<div id='div-gpt-ad-1503032471533-0' style='height:250px; width:250px;'>-->
                <!--    <script>-->
                <!--    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1503032471533-0'); });-->
                <!--    </script>-->
                <!--</div>-->
                <div id='playleft' style='height:250px; width:250px;'></div>
            </div>
              <div class="col-md-6 col-md-offset-3">
                <div class="well well-sm">
                  <label id="status"></label>
                </div>
              </div>
              <div class="col-md-3"  class="" style="position:absolute; top:33%;left:75%">
                <!-- /21627176021/PlayRight -->
                <!--<div id='div-gpt-ad-1503033231944-0' style='height:250px; width:250px;'>-->
                <!--    <script>-->
                <!--    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1503033231944-0'); });-->
                <!--    </script>-->
                <!--</div>-->
                <div id='playright' style='height:250px; width:250px;'></div>
              </div>
                <label id="working"></label>
                <div id="gaugebox">
                    <div id="optionsBox" style="display:none">
                      <div class ="buttonpanel">
                          <input type="button" class="btn btn-info" id="hintBtn" value="HINT">
                          <input type="button" class="yellowButton" id="flipBtn" value="FLIP">
                          <input type="button" class="btn btn-success" id="dimensionBtn" value="2D">
                          <input type="button" class="btn btn-warning" id="resetBtn" value="RESET">
                      </div>
                        <label for="piecesMenu">CHESS SET:</label>
                        <select id="piecesMenu">
                            <option value="iconic" selected>Iconic</option>
                            <option value="bauhaus">Bauhaus</option>
                            <option value="classic">Classic</option>
                            <option value="mueller">Mueller</option>
                            <option value="minions">Minions</option>
                        </select>
                        <br>
                        <label for="engineMenu">CHESS ENGINE:</label>
                        <select id="engineMenu">
                            <option value="js/p4wn.js">p4wn</option>
                            <option value="js/lozza.js" selected>Lozza</option>
                            <option value="js/stockfish.js">stockfish</option>
                        </select>
                        <br>
                        <label for="moveTime">MOVE TIME (seconds):</label>
                        <select id="moveTime">
                            <option value="100">0.1</option>
                            <option value="200">0.2</option>
                            <option value="500">0.5</option>
                            <option value="1000" selected>1</option>
                            <option value="2000">2</option>
                            <option value="5000">5</option>
                            <option value="10000">10</option>
                            <option value="20000">20</option>
                        </select>
                        <br>
                        <label for="promotion">PROMOTE PAWNS TO:</label>
                        <select id="promotion">
                            <option value="q">queens</option>
                            <option value="n">knights</option>
                            <option value="r">rooks</option>
                            <option value="b">bishops</option>
                        </select>
                    </div>
                    <div id="gauge" style="display:none"></div>
                </div>
                <div id="aftergame" class="col-md-8 col-md-offset-2" style="display:none; margin-top:30px;">
                  <div class="panel panel-default">
                    
                    <div class="panel-body">
                      <div style="display:none">
                        <div id="pgn"></div>
                      </div>
                      <div class="col-md-12">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" id="startBtn"><span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span></button>
                            <button type="button" class="btn btn-primary" id="backBtn" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
                            <button type="button" class="btn btn-primary" id="forwardBtn" ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
                            <button type="button" class="btn btn-primary" id="endBtn"><span class="glyphicon glyphicon-fast-forward" aria-hidden="true"></span></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            
        </article>
        
        
      <script type="text/javascript">
        $(document).ready(function() {
          var clock;
          var time = <?= $minutes ?>;
          var lastturn = $("#abcd").text();
          var message = lastturn + "Won the game due to timeout";
            clock = $('.clock').FlipClock(time, {

            countdown: true,
            callbacks: {
            	stop: function() {
                swal({
                    title : "Game Over",
                    text : message,
                    type: 'info',
                    showCancelButton: false,
                    confirmButtonColor: "#DD6655",
                    onConfirmButtonText: 'OK',
                    closeOnConfirm: true
                });
                if (lastturn != 'White') {
                  setTimeout(function () {
                     window.location.href = "../showwinner.php?winner=u&reason=timeout";
                  }, 2000);
                }else {
                  setTimeout(function () {
                     window.location.href = "../showwinner.php?winner=op&reason=timeout";
                  }, 2000);
                }
            	}
            }
        });

        });
      </script>
      <!--<script type="text/javascript">-->
      <!--if (performance.navigation.type == 1) {-->
      <!--  alert("You Lost! Coz you refreshed the page");-->
      <!--  window.location.href = "../showwinner.php?winner=op";-->
      <!--}-->

      <!--</script>-->
      <script type="text/javascript">
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
    <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
      });
      </script>
    </body>
</html>
