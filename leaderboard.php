<?php include 'includes/header.php'; ?>
<?php
  $sql_get_players = mysqli_query($con,"SELECT * FROM `tbl_users`WHERE `id` != '".$_SESSION['playerid']."' ORDER BY `player_points` DESC");


 ?>
<div class="container">
  <div class="row text-center" style="padding-bottom:30px;">
    <h3 class="header-title">Leaderboard</h3>
  </div>
  <section class="col-md-10 col-md-offset-1">
    <table class="table text-center" style="font-size:16px;">
      <thead>
        <th width="5%">From</th>
        <th width="30%">Name</th>
        <th>Win/Draw/Lost</th>
        <th width="20%">Points</th>
      </thead>
      <tbody>
        <?php while($row_get_players = mysqli_fetch_assoc($sql_get_players)): ?>
          <tr>
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
              <?= $row_get_players['player_points'] ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
