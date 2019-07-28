<?php
  require('config/config.php');
  require('config/server.php');
  include('includeFolder/header.php');

  $output = '';
  $output2 = '';


    $query = 'SELECT YEAR(getDate) AS YEAR, MONTHNAME(getDate) AS MONTH, sum(price) AS TOTAL
              FROM inventory_tbl
              WHERE getDate
              AND CURRENT_DATE
              GROUP BY YEAR(getDate), MONTH(getDate) ORDER BY YEAR ASC
              ';


  $result = mysqli_query($conn, $query);

    $sql = 'SELECT YEAR(salesDate) AS YEAR, MONTHNAME(salesDate) AS MONTH, sum(salePrice) AS TOTAL
            FROM customer_tbl
            WHERE salesDate
            AND CURRENT_DATE
            GROUP BY YEAR(salesDate), MONTH(salesDate) ORDER BY YEAR ASC
            ';


            $result1 = mysqli_query($conn, $sql);

  if (!$result) {
    die(mysqli_error($conn));
  }

  if (!$result1) {
    die(mysqli_error($conn));
  }

?>

<div class="content-wrapper">
  <div class="contact-list">
    <div class="area-1">
      <div class="so-box">
        <table style="text-align: center;">
          <?php
            if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result1) > 0) {


              $output .= '
                            <tr style="text-align: center;">
                              <th>Year</th>
                              <th>Month</th>
                              <th>Total</th>
                            </tr> ';

              while($row = mysqli_fetch_assoc($result)) {

                if(isset($row['YEAR'])) {
                  $getYear = $row['YEAR'];
                }

                if(isset($row['MONTH'])) {
                  $getMonth = $row['MONTH'];
                }

                if(isset($row['TOTAL'])) {
                  $price = $row['TOTAL'];
                }

                $output .= '
                <tr style="text-align: center;">
                              <td width="15%">'.$getYear.'</td>
                              <td width="15%">'.$getMonth.'</td>
                              <td width="70%">Php '.$price.'</td> ';

              echo '</tr>';
              }

              echo $output;
            }
          ?>
        </table>
      </div>
    </div>
    <div class="area-2">
      <div class="po-box">
        <table style="text-align: center;">
          <?php
            if(mysqli_num_rows($result1) > 0) {


              $output2 .= '
                            <tr style="text-align: center;">
                              <th>Year</th>
                              <th>Month</th>
                              <th>Total</th>
                            </tr> ';

              while($row = mysqli_fetch_assoc($result1)) {

                if(isset($row['YEAR'])) {
                  $getYear = $row['YEAR'];
                }

                if(isset($row['MONTH'])) {
                  $getMonth = $row['MONTH'];
                }

                if(isset($row['TOTAL'])) {
                  $price = $row['TOTAL'];
                }

                $output2 .= '
                <tr style="text-align: center;">
                              <td width="15%">'.$getYear.'</td>
                              <td width="15%">'.$getMonth.'</td>
                              <td width="70%">Php '.$price.'</td> ';

              echo '</tr>';
              }

              echo $output2;
            }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
