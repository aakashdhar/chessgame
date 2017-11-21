<?php include 'includes/header.php'; ?>
<?php
  if (isset($_POST['submit'])) {
    $tandc = $_POST['tandc'];
    $tandc = str_replace("'","''",$tandc);
    $sql = "INSERT INTO `tbl_about`(`terms`) VALUES ('$tandc')";
    $result = mysqli_query($con,$sql);

    if ($result) {
      echo "<script>alert('About Us Successfully Added')</script>";
      echo "<script>window.location.href = 'tandc.php'</script>";
    }else{
      echo "<script>alert('About Us Addition Failed')</script>";
    }
  }



 ?>
  <section class="content-header">
    <h1>
      About Us
      <small>Add About Us</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Add About Us</h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post">
          <div class="form-group">
            <label for="">About Us</label>
            <textarea name="tandc" class="form-control textarea" rows="20" cols="80"></textarea>
          </div>
          <input type="submit" name="submit" class="form-control btn btn-success" value="Add About Us">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
