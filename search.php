<?php
  include('proprietor.php');

  $output = '';

  if(isset($_POST['search'])) {

     $searchq = $_POST['search'];
     $query = 'SELECT * FROM inventory_tbl WHERE
       customer LIKE "%$searchq%"
       OR customerAddress LIKE "%$searchq%"
       OR customerName LIKE "%$searchq%"
       OR contact LIKE "%$searchq%"
       OR salePrice LIKE "%$searchq%"
       OR salesDate LIKE "%$searchq%"
       ';
       
       $count = mysqli_num_rows($result);

        if($count > 0)
        {
           echo '
             <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>City</th>
              <th>Postal Code</th>
              <th>Country</th>
             </tr>
          ';

            while($row = mysqli_fetch_array($result))
            {
             echo '
              <tr>
               <td>'.$row["siNum"].'</td>
               <td>'.$row["proprietor"].'</td>
               <td>'.$row["tradeName"].'</td>
               <td>'.$row["address"].'</td>
               <td>'.$row["proprietorContact"].'</td>
              </tr>
              ';
            }
       }

  }

  $result = mysqli_query($conn, $query);

	mysqli_close($conn);

?>
