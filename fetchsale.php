<?php

require('config/config.php');
require('config/server.php');

$output = '';
if(isset($_POST["query"])) {

     $search = mysqli_real_escape_string($conn, $_POST["query"]);
     $query = "
      SELECT * FROM customer_tbl
      WHERE customer LIKE '%".$search."%'
      OR customerAddress LIKE '%".$search."%'
      OR customerName LIKE '%".$search."%'
      OR contact LIKE '%".$search."%'
     ";
    } else {
       $query = "
        SELECT * FROM customer_tbl ORDER BY id
       ";
      }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
       $output .= '
         <table id="disp-tbl">
          <tr>
           <th>Customer</th>
           <th>Customer Address</th>
           <th>Trade Name</th>
           <th>Contact</th>
          </tr>
       ';
       while($row = mysqli_fetch_array($result))
       {
        $output .= '
         <tr>
          <td>'.$row["customer"].'</td>
          <td>'.$row["customerAddress"].'</td>
          <td>'.$row["customerName"].'</td>
          <td>'.$row["contact"].'</td>
         </tr>
        ';
       }
       echo $output;
    } else
      {
       echo 'Data Not Found';
      }

?>
