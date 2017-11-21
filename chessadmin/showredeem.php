<?php include 'core/init.php'; ?>
<?php
  $output = array('data' => array());

  $sql = "SELECT * FROM `table_redeempoints` order by `id` desc";
  $query = mysqli_query($con,$sql);

  $x = 1;
  while ($row = mysqli_fetch_assoc($query)) {
    $image = '<img src='.$row['image_url'].' alt="Facility Icon" height="120" width="80">';
    $actionButton = '
  	<div class="btn-group">
  	  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  	    Action <span class="caret"></span>
  	  </button>
  	  <ul class="dropdown-menu">
  	    <li><a href="editredeem.php?edit='.$row['id'].'"><span class="fa fa-pencil"></span> Edit</a></li>
  	    <li><a href="editredeem.php?delete='.$row['id'].'"><span class="fa fa-trash-o"></span> Delete</a></li>
      </ul>
  	</div>';
    $output['data'][] = array(
  		$x,
  		$row['name'],
        $image,
        $row['points'],
  		$actionButton
  	);

  	$x++;
  }
  echo json_encode($output);
 ?>
