<?php include 'includes/header.php'; ?>
<?php
  $sql_get_players = mysqli_query($con,"SELECT * FROM `tbl_users`WHERE `id` != '".$_SESSION['playerid']."'");


 ?>
<div class="container">
  <div class="row text-center" style="padding-bottom:30px;">
    <h3 class="header-title">Welcome to Play Earn</h3>
  </div>
  <div class="col-lg-3 col-sm-6" style="margin-left:-50px;">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div >
                    <img alt="" src="flags/64x64/<?= $row_get['player_country'] ?>.png">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="#"><?= ucwords($row_get['player_name']) ?></a>
                    </div>
                    <div class="desc"><?= $row_get['player_points'] ?> Points</div>
                    <div class="desc"><?= $row_get['win'] ?> | <?= $row_get['draw'] ?> | <?= $row_get['lose'] ?></div>
                </div>
                <a href="preference.php" class="btn  btn-link">Game Preferences</a>
                <a href="startgame.php" class="btn  btn-link">Auto Match</a> <br>
            </div>
            <div>
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Profile -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:225px;height:66px"
                     data-ad-client="ca-pub-6964407832457862"
                     data-ad-slot="5711342283"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

        </div>
  <div class="col-md-1"></div>
  <section class="col-md-8">
    <table class="table text-center" style="font-size:16px;">
      <thead>
        <th width="5%">Status</th>
        <th width="5%">From</th>
        <th width="30%">Name</th>
        <th>Win/Draw/Lost</th>
        <th>Per Move Time / Total Play Time</th>
      </thead>
      <tbody>
        <?php while($row_get_players = mysqli_fetch_assoc($sql_get_players)): ?>
          <tr>
            <td class="text-center">
              <?php if ($row_get_players['current_status'] == 'online'): ?>
                <i class="fa fa-circle text-success"></i>
              <?php elseif ($row_get_players['current_status'] == 'offline'): ?>
                <i class="fa fa-circle text-danger"></i>
              <?php else: ?>
                <i class="fa fa-circle text-muted"></i>
              <?php endif; ?>
            </td>
            <td><img alt="" src="flags/16x16/<?= $row_get_players['player_country'] ?>.png"></td>
            <td>
              <?= ucwords($row_get_players['player_name']) ?>
            </td>
            <td class="text-center">
              <span class="text-success"><?= $row_get_players['win'] ?></span> /
              <span class="text-info"><?= $row_get_players['draw'] ?></span> /
              <span class="text-danger"><?= $row_get_players['lose'] ?></span>
            </td>
            <td>
              <?= (($row_get_players['per_move_time'] == '')? 'No Preference':$row_get_players['per_move_time']) ?>
              /
              <?= (($row_get_players['total_play_time'] == '')? 'No Preference':$row_get_players['total_play_time']) ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
