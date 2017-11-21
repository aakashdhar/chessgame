<?php include 'includes/header.php'; ?>
<?php
  if (isset($_POST['submit'])) {
    $name = ucwords($_POST['name']);
    $points = $_POST['points'];
    $target = "redeempic/";
    $target = $target . basename($_FILES['file']['name']);
    $tmpname = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmpname, $target);

    // $sql_check = "SELECT * FROM `tbl_type` WHERE `type` = '$name'";
    // $result_check = mysqli_query($con,$sql_check);

    // if (mysqli_num_rows($result_check) > 0) {
    //   echo "<script>alert('The Facility Name alaready Exists')</script>";
    // }else {
      $sql_insert = "INSERT INTO `table_redeempoints`(`name`, `image_url`, `points`) VALUES ('$name','$target','$points')";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('Successfully Added')</script>";
      }else{
        echo "<script>alert('Addition Failed')</script>";
      }
    // }
  }

 ?>
  <section class="content-header">
    <h1>
      Redeem Points
      <small>Add Redeem Points</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Add Redeem Points</h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="">Points</label>
            <input type="text" maxlength="10" class="form-control" id="" name="points" placeholder="Enter Points" onkeypress="return isOnlyNumberKey(event)" required>
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="file" accept="image/*" required>
          </div>
          <input type="submit" name="submit" class="form-control btn  btn-success" value="Add Redeem Points">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
