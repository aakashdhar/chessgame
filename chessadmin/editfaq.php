<?php include 'includes/header.php'; ?>
<?php
  if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $sql_edit = "SELECT * FROM `tbl_faq` WHERE `id` = '$edit_id'";
    $result_edit = mysqli_query($con,$sql_edit);
    $row_driver = mysqli_fetch_object($result_edit);
  }
  if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $sql = "DELETE FROM `tbl_faq` WHERE `id` = '$del_id'";
    $result = mysqli_query($con,$sql);
    echo "<script>alert('FAQ Successfully Deleted')</script>";
    echo "<script>window.location.href = 'viewfaq.php'</script>";
  }
  if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $tandc = $_POST['tandc'];
    $tandc = str_replace("'","''",$tandc);
    $sql = "UPDATE `tbl_faq` SET `question`='$question',`answer` = '$tandc' WHERE `id` = '$edit_id'";
    $result = mysqli_query($con,$sql);

    if ($result) {
      echo "<script>alert('FAQ Successfully Updated')</script>";
      echo "<script>window.location.href = 'viewfaq.php'</script>";
    }else{
      echo "<script>alert('FAQ Updation Failed')</script>";
    }
  }
?>
  <section class="content-header">
    <h1>
      F.A.Q
      <small>Edit F.A.Q</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"></h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post">
          <div class="form-group">
            <label for="">Question</label>
            <input type="text" class="form-control" id="" name="question" placeholder="Enter Question" value="<?= $row_driver -> question ?>" required>
          </div>
          <div class="form-group">
            <label for="">Answer</label>
            <textarea name="tandc" class="form-control textarea" rows="8" cols="20" placeholder="Enter Answer" required><?= $row_driver -> answer ?></textarea>
          </div>
          <input type="submit" name="submit" value="Submit FAQ" class="btn btn-success btn-block">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
