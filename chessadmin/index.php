<?php include 'includes/header.php'; ?>
<?php
  if (!isset($_SESSION['admin'])) {
    echo "<script>window.location.href = 'login.php'</script>";
  }
?>
  <section class="content-header">
    <h1>
      Dashboard
      <small>Quick View</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <section class="content">

  </section>
<?php include 'includes/footer.php'; ?>
