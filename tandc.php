<?php include 'includes/header.php' ?>
<?php
  $sql_get = mysqli_query($con,"SELECT * FROM `tbl_tandc`");
  $row_get = mysqli_fetch_assoc($sql_get);

?>
<div class="container">
    <div class="row text-center">
        <h3 class="header-title">Terms and Conditions</h3>
    </div>
    <section class="shallow-back text-justify">
        <?= $row_get['terms'] ?>
    </section>
</div>
<?php include 'includes/footer.php' ?>