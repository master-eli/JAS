<?php
require('config/config.php');
require('config/server.php');

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM inventory_tbl
  WHERE siNum LIKE '%".$search."%'
  OR proprietor LIKE '%".$search."%'
  OR tradeName LIKE '%".$search."%'
  OR address LIKE '%".$search."%'
  OR proprietorContact LIKE '%".$search."%'
 ";
} else {
   $query = "
    SELECT * FROM inventory_tbl ORDER BY siNum
   ";
  }
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0) {
     $output .= '
       <table id="disp-tbl">
        <tr>
         <th>Proprietor</th>
         <th>Trade Name</th>
         <th>Address</th>
         <th>Contact</th>
        </tr>
     ';
     while($row = mysqli_fetch_array($result)) {

        $output .= '
         <tr>
          <td>'.$row["proprietor"].'</td>
          <td>'.$row["tradeName"].'</td>
          <td>'.$row["address"].'</td>
          <td>'.$row["proprietorContact"].'</td>
         </tr>
        ';
     }
     echo $output;
  }
else
{
 echo 'Data Not Found';
}

?>
