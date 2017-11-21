<?php include 'includes/header.php'; ?>
 <?php
   if (isset($_GET['edit']) && !empty($_GET['edit'])) {
     $edit_id = $_GET['edit'];
     $sql_edit = "SELECT * FROM `table_redeempoints` WHERE `id` = '$edit_id'";
     $result_edit = mysqli_query($con,$sql_edit);
     $row = mysqli_fetch_object($result_edit);
   }
   if (isset($_GET['delete']) && !empty($_GET['delete'])) {
     $del_id = $_GET['delete'];
     $sql = "DELETE FROM `table_redeempoints` WHERE `id` = '$del_id'";
     $result = mysqli_query($con,$sql);
     echo "<script>window.location.href = 'viewredeem.php'</script>";
   }
   if (isset($_POST['submit'])) {
     $image_url = $_POST['image_url'];
     $name = ucwords($_POST['name']);
     $points = $_POST['points'];
     $target = "propertyicon/";
     $target = $target . basename($_FILES['file']['name']);

     if ($_FILES['file']['size'] == 0) {
       unset($target);
       $target = $image_url;
     }else {
       $tmpname = $_FILES['file']['tmp_name'];
       move_uploaded_file($tmpname, $target);
     }
    //  $sql_check = "SELECT * FROM `tbl_type` WHERE `type` = '$name' AND `id` != '$edit_id'";
    //  $result_check = mysqli_query($con,$sql_check);

    //  if (mysqli_num_rows($result_check) > 0) {
    //   echo "<script>alert('The city Name already Exists')</script>";
    //  }else {
       $sql_insert = "UPDATE `table_redeempoints` SET `name`='$name',`image_url`='$target',`points` = '$points' WHERE `id` = '$edit_id'";
       $result_insert = mysqli_query($con,$sql_insert);

       if ($result_insert) {
         echo "<script>alert(' Successfully Updated')</script>";
         echo "<script>window.location.href = 'viewredeem.php'</script>";
       }else{
         echo "<script>alert('Updation Failed')</script>";
       }
    //  }
   }


  ?>
  <section class="content-header">
    <h1>
     Redeem Points
      <small>Edit Redeem Points</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Edit Redeem Points</h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" value="<?= $row -> type ?>" placeholder="Enter Property Name" required>
          </div>
          <div class="form-group">
            <label for="">Points</label>
            <input type="text" maxlength="10" class="form-control" id="" name="points" placeholder="Enter Points" onkeypress="return isOnlyNumberKey(event)" required>
          </div>
          <div class="form-group col-md-8">
            <label for="">Image</label>
            <input type="file" class="form-control" name="file" accept="image/*">
          </div>
          <div class="form-group col-md-4">
            <img src="<?= $row -> image_url ?>" alt="" height="120" width="80">
          </div>
          <input type="hidden" name="image_url" value="<?= $row -> image_url ?>">
          <input type="submit" name="submit" class="form-control btn  btn-success" value="Update Redeem Points">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
