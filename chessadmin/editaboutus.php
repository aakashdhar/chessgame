<?php include 'includes/header.php'; ?>
<?php
  $sql_edit = "SELECT * FROM `tbl_about`";
  $result_edit = mysqli_query($con,$sql_edit);
  $row = mysqli_fetch_object($result_edit);
  if (isset($_POST['submit'])) {
    $tandc = $_POST['tandc'];
    $tandc = str_replace("'","''",$tandc);
    $sql = "UPDATE `tbl_about` SET `terms`='$tandc',`updated_on`=NOW() WHERE `id` = '1'";
    $result = mysqli_query($con,$sql);

    if ($result) {
      echo "<script>alert('About Us Successfully Updated')</script>";
      echo "<script>window.location.href = 'aboutus.php'</script>";
    }else{
      echo "<script>alert('About Us Updation Failed')</script>";
    }
  }
 ?>
  <section class="content-header">
    <h1>
      About Us
      <small>Edit About Us</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Edit About Us</h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post">
          <div class="form-group">
            <label for="">About Us</label>
            <textarea name="tandc" class="form-control textarea" rows="20" cols="80"><?= $row -> terms ?></textarea>
          </div>
          <input type="submit" name="submit" class="form-control btn btn-success" value="Edit About Us">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
