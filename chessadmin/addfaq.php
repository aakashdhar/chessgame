<?php include 'includes/header.php'; ?>
<?php
  if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $tandc = $_POST['tandc'];
    $tandc = str_replace("'","''",$tandc);
    $sql = "INSERT INTO `tbl_faq`(`question`, `answer`) VALUES ('$question','$tandc')";
    $result = mysqli_query($con,$sql);

    if ($result) {
      echo "<script>alert('FAQ Successfully Added')</script>";
    }else{
      echo "<script>alert('FAQ Addition Failed')</script>";
    }
  }
?>
  <section class="content-header">
    <h1>
      F.A.Q
      <small>Add F.A.Q</small>
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
            <input type="text" class="form-control" id="" name="question" placeholder="Enter Question" required>
          </div>
          <div class="form-group">
            <label for="">Answer</label>
            <textarea name="tandc" class="form-control textarea" rows="8" cols="20" placeholder="Enter Answer" required></textarea>
          </div>
          <input type="submit" name="submit" value="Submit FAQ" class="btn btn-success btn-block">
        </form>
      </div>
    </div>
  </section>
<?php include 'includes/footer.php'; ?>
