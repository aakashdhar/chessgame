<?php include 'includes/header.php'; ?>
<?php
if (isset($_POST['submit'])) {
  $permovetime = $_POST['inlineRadioOptions'][0];
  $pergametime = $_POST['inlineRadioOption'][0];
  $sql_get_country = mysqli_query($con,"SELECT `alpha_2` FROM `tbl_countries` ORDER BY RAND() LIMIT 1");
  $row_get_country = mysqli_fetch_assoc($sql_get_country);
  $country = $row_get_country['alpha_2'];
  $sql_get = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `current_status` = 'online' AND `player_password` = '' AND `per_move_time` = '$permovetime' 
  AND `total_play_time` = '$pergametime'
    AND `id` != '".$_SESSION['playerid']."'");
  $_SESSION['pmvtime'] = $permovetime;
  $sql_get_c_points = mysqli_query($con,"SELECT * FROM `tbl_users`WHERE `id` = '".$_SESSION['playerid']."'");
  $row_get_c_points = mysqli_fetch_assoc($sql_get_c_points);
  $player_points = $row_get_c_points['player_points'];
  $player_losepoints = $row_get_c_points['lose'];
  $player_losepoints = $player_losepoints + 1;
  if (mysqli_num_rows($sql_get) > 0) {
    $row_get = mysqli_fetch_assoc($sql_get);
    $_SESSION['botid'] = $row_get['id'];
    $second_player_point = $row_get['player_points'];
    $bot = false;
    if ($player_points > $second_player_point) {
      $divi = $player_points / $second_player_point;
      $divi = $divi * 10;
      $invdivi = -1 * $divi;
      if ($divi > 15) {
        $divi = 15;
      }
      
      $player_update_points = $player_points - $divi;
      
      $_SESSION['pointsred'] = $divi;
      $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET `lose` = '$player_losepoints',`player_points`='$player_update_points' WHERE `id` = '".$_SESSION['playerid']."'");
    }else {
      $divi = $second_player_point / $player_points;
      $divi = $divi * 10;
      $invdivi = -1 * $divi;
      if ($divi > 15) {
        $divi = 15;
      }
      $player_update_points = $player_points - $divi;
      $_SESSION['pointsred'] = $divi;
      $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET `lose` = '$player_losepoints', `player_points`='$player_update_points' WHERE `id` = '".$_SESSION['playerid']."'");
    }
    $sql_insert_a = mysqli_query($con,"INSERT INTO `tbl_gametable`(`player_id`, `bot_id`, `winner`,
      `looser`, `winning_points`)
      VALUES ('".$_SESSION['playerid']."','".$_SESSION['botid']."','".$_SESSION['botid']."','".$_SESSION['playerid']."','$divi')");
    $last_inserted_game = mysqli_insert_id($con);
    $_SESSION['matchid'] = $last_inserted_game;
    echo "<script>
    setTimeout(function () {
      window.location.href = 'game/play.php?challenger=' + '".$_SESSION['playerid']."' +'&challengedto=' + '".$row_get['id']."';
    }, 5000);
    </script>";
  }else {
    $bot = true;
    $sql_get_alter = mysqli_query($con,"SELECT * FROM `tbl_users`WHERE `id` != '".$_SESSION['playerid']."'");
    $row_get_alter = mysqli_fetch_assoc($sql_get_alter);
    $playerlosepoints = $row_get_alter['lose'];
    $playerlosepoints = $playerlosepoints + 1;
    $x = 1; // Amount of digits
    $min = pow(10,$x);
    $max = pow(10,$x+1)-1;
    $value = rand($min, $max);
    //PHP array containing forenames.
      $names = array(
          'Christopher',
          'Ryan',
          'Ethan',
          'John',
          'Zoey',
          'Sarah',
          'Michelle',
          'Samantha',
          'Walker',
          'Thompson',
          'Anderson',
          'Johnson',
          'Tremblay',
          'Peltier',
          'Cunningham',
          'Simpson',
          'Mercado',
          'Sellers'
      );
      //PHP array containing surnames.
      $surnames = array(
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          ''
      );
    //Generate a random forename.
    $random_name = $names[mt_rand(0, sizeof($names) - 1)];
    //Generate a random surname.
    $random_surname = $surnames[mt_rand(0, sizeof($surnames) - 1)];
    //Combine them together and print out the result.
    $name =  $random_name . $random_surname;
    $name = $name . $value;
    $sql_insert = mysqli_query($con,"INSERT INTO `tbl_users`(`player_name`, `player_mobile`,
      `player_country`, `win`, `draw`, `lose`, `created_on`, `current_status`, `per_move_time`,
      `total_play_time`,`player_points`)
      VALUES ('$name','".$row_get_alter['player_mobile']."','$country','1','1','1',NOW(),'online','$permovetime'
      ,'$pergametime','110')");
    $last_inserted = mysqli_insert_id($con);
    $sql_get_bot = mysqli_query($con,"SELECT * FROM  `tbl_users` where `id` = '$last_inserted'");
    $row_get_bot = mysqli_fetch_assoc($sql_get_bot);
    $_SESSION['botid'] = $row_get_bot['id'];
    $bot_points = $row_get_bot['player_points'];
    if ($player_points > $bot_points) {
      $divi = $player_points / $bot_points;
      $divi = $divi * 10;
      $invdivi = -1 * $divi;
      $_SESSION['pointsred'] = $divi;
      $player_update_points = $player_points - $divi;

      $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET `lose` = '$playerlosepoints',`player_points`='$player_update_points' WHERE `id` = '".$_SESSION['playerid']."'");
    }else {
      $divi = $bot_points / $player_points;
      $divi = $divi * 10;
      $invdivi = -1 * $divi;
      $_SESSION['pointsred'] = $divi;
      $player_update_points = $player_points - $divi;

      $sql_update_points = mysqli_query($con,"UPDATE `tbl_users` SET `player_points`='$player_update_points' WHERE `id` = '".$_SESSION['playerid']."'");
    }
    $sql_insert_b = mysqli_query($con,"INSERT INTO `tbl_gametable`(`player_id`, `bot_id`, `winner`,
      `looser`, `winning_points`)
      VALUES ('".$_SESSION['playerid']."','$last_inserted','$last_inserted','".$_SESSION['playerid']."','$divi')");
    $last_inserted_game = mysqli_insert_id($con);
    $_SESSION['matchid'] = $last_inserted_game;
    echo "<script>
    setTimeout(function () {
      window.location.href = 'game/play.php?challenger=' + '".$_SESSION['playerid']."' +'&challengedto=' + '".$last_inserted."';
    }, 5000);
    </script>";
  }




}


 ?>
 <div class="row"  class="text-center" style="margin-top:30px;">
   <h3 class="header-title">Searching Players</h3>
 </div>
 <center>
  <div style="">
    <div id="rotator" style="height:100px;width:100px"></div>
  </div>
</center>
  <?php if ($bot == true): ?>
    <div class="col-md-8 col-md-offset-2">
      <h3 class="sub-head">Player Matched</h3>
      <table class="table  text-center" style="font-size:16px">
        <thead>
          <th width="5%">Status</th>
          <th width="5%">From</th>
          <th width="30%">Name</th>
          <th>Win/Draw/Lost</th>
          <th>Per Move Time / Total Play Time</th>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">
              <i class="fa fa-circle text-success"></i>
            </td>
            <td><img alt="" src="flags/16x16/<?= $row_get_bot['player_country'] ?>.png"></td>
            <td>
              <?= ucwords($row_get_bot['player_name']) ?>
            </td>
            <td class="text-center">
              <span class="text-success"><?= $row_get_bot['win'] ?></span> /
              <span class="text-info"><?= $row_get_bot['draw'] ?></span> /
              <span class="text-danger"><?= $row_get_bot['lose'] ?></span>
            </td>
            <td>
              <?= $row_get_bot['per_move_time'] ?>
              /
              <?= $row_get_bot['total_play_time']?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php else: ?>
      <div class="col-md-8 col-md-offset-2">
        <h3>Player Matched</h3>
        <table class="table  text-center" style="font-size:16px;">
          <thead>
            <th width="5%">Status</th>
            <th width="5%">From</th>
            <th width="30%">Name</th>
            <th>Win/Draw/Lost</th>
            <th>Per Move Time / Total Play Time</th>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">
                <i class="fa fa-circle text-success"></i>
              </td>
              <td><img alt="" src="flags/16x16/<?= $row_get['player_country'] ?>.png"></td>
              <td>
                <?= ucwords($row_get['player_name']) ?>
              </td>
              <td class="text-center">
                <span class="text-success"><?= $row_get['win'] ?></span> /
                <span class="text-info"><?= $row_get['draw'] ?></span> /
                <span class="text-danger"><?= $row_get['lose'] ?></span>
              </td>
              <td>
                <?= $row_get['per_move_time'] ?>
                /
                <?= $row_get['total_play_time']?></td>
            </tr>
          </tbody>
        </table>
        <div>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Searching -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-6964407832457862"
                 data-ad-slot="9458235350"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        
      </div>
  <?php endif; ?>
<?php include 'includes/footer.php'; ?>
