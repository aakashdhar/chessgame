<?php

  include 'core/init.php';

    $regnumb = $_POST['regnumb'];
    
    $result = mysqli_query($con,"SELECT * FROM `tbl_book` WHERE `status` = 'completed' AND `driver_regno` = '$regnumb'");
    
    $sql_total = mysqli_query($con,"SELECT SUM(`total_cost`) FROM `tbl_book` WHERE `status` = 'completed' AND `driver_regno` = '$regnumb'");
    $total = mysqli_fetch_array($sql_total);
  
    
  if(mysqli_num_rows($result)> 0){
  while ($row = mysqli_fetch_object($result)) {
      
      $sql_customer = mysqli_query($con,"SELECT * FROM `tbl_user` WHERE `id` = '".$row -> userid."'");
      $row_customer = mysqli_fetch_object($sql_customer);
      
      $sql_driver = mysqli_query($con,"SELECT * FROM `tbl_driver` WHERE `vehicle_number` = '".$row -> driver_regno."'");
      $row_driver = mysqli_fetch_object($sql_driver);
      
      echo "<tr>
        <td>$row->bookingnumber</td>
        <td>$row->source</td>
        <td>$row->destination</td>
        <td>$row_driver->name</td>
        <td>$row_driver->mobile</td>
        <td>$row->driver_regno</td>
        <td>$row_customer->name </td>
        <td>$row_customer->mobile</td>
        <td>$row->sdate</td>
        <td>$row_driver->vehicle_type</td>
        <td>$row->type</td>
        <td>$row->total_cost Rs.</td>
      </tr>";
     }
     echo"<tr>
       <td  colspan='11' class='text-right'>Sum : </td>
       <td>$total[0] Rs.</td>
    </tr>";
    }else{
     echo "No Data available to generate report";
   }
 ?>
