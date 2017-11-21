<?php include 'includes/header.php'; ?>
<?php
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password = md5($password);

      $sql_insert ="UPDATE `tbl_admin` SET `username`= '$name',`password`='$password' WHERE `id` = '1'";
      $result_insert = mysqli_query($con,$sql_insert);

      if ($result_insert) {
        echo "<script>alert('Password Changed')</script>";
        echo "<script>window.location.href = 'index.php'</script>";
      }else{
        echo "<script>alert('Password Change Failed')</script>";
      }

   }

 ?>
  <section class="content-header">
    <h1>
      Password
      <small>Change Password</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
   <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"></h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post" autocomplete="off">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" placeholder="Enter New Name" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" id="" name="password" placeholder="Enter New Password" required>
          </div>
          <input type="submit" name="submit" class="form-control btn btn-success" value="update Password">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
