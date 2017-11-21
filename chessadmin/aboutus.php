<?php include 'includes/header.php'; ?>
<?php
  $sql = "SELECT * FROM `tbl_about`";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_object($result);
  $count = mysqli_num_rows($result);
 ?>
  <section class="content-header">
    <h1>
      About Us
      <small>View About Us</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <div class="container" style="margin-bottom:1em;">
      <div class="row">
        <?php if ($count > 0): ?>
          <div class="col-md-6">
            <a href="editaboutus.php" class="btn btn-success">Edit About Us</a>
          </div>
          <?php else: ?>
            <div class="col-md-6">
              <a href="addaboutus.php" class="btn btn-success">Add About Us</a>
            </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if ($count > 0): ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">About Us</h3>
        </div>
        <div class="panel-body">
          <div class="container-fluid">
            <?= $row -> terms ?>
          </div>
        </div>
      </div>
      <?php else: ?>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">About Us</h3>
          </div>
          <div class="panel-body">
            <h3>No About Us Detected.</h3>
          </div>
        </div>
    <?php endif; ?>
  </section>
<?php include 'includes/footer.php'; ?>
