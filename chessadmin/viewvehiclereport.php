<?php include 'includes/header.php'; ?>
<?php
  $sql_driver = mysqli_query($con,"SELECT * FROM `tbl_cars`");
?>
  <section class="content-header">
    <h1>
      Vehicle
      <small> Vehicle Report</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <div class='col-md-12'>
          <input type='button' id='btnExport1' class="pull-right" value=' Export Table data into Excel ' />
        </div>
  <section class="content" style="margin-top:30px;">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"></h3>
      </div>
      <div class="panel-body">
          <div class="col-md-12" id="dvData">
              <table class="table">
    	    <thead>
    		    <tr>
			    <th>Car Type</th>
                <th>Minimum Km</th>
                <th>Minimum Price</th>
                <th>Extra Per Km</th>
                <th>Type</th>
    			</tr>
    			</thead>
    			<tbody>
    			    <?php while($row = mysqli_fetch_object($sql_driver)): ?>
    			      <tr>
    			        <td><?= $row -> car_type ?></td>
    			        <td><?= $row -> minkm ?></td>
    			        <td><?= $row -> minprice ?></td>
    			        <td><?= $row -> extrapkm ?></td>
    			        <td><?= $row -> type ?></td>
    			      </tr>
    			    <?php endwhile; ?>
    			</tbody>
    		</table>
              </div>
        
      </div>
  </section>
<?php include 'includes/footer.php'; ?>
