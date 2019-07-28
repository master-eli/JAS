


<?php
  require('config/config.php');
  require('config/server.php');

  $output = '';
  $output2 = '';
  $outputPO = '';
  $outputPO2 = '';

  $query = 'SELECT YEAR(salesDate) AS YEAR, MONTHNAME(salesDate) AS MONTH, sum(salePrice) AS TOTAL
            FROM customer_tbl
            WHERE salesDate
            BETWEEN (CURRENT_DATE - INTERVAL 2 MONTH) AND (CURRENT_DATE - INTERVAL 1 MONTH)
            -- AND (CURRENT_DATE - INTERVAL 1 MONTH)
            GROUP BY YEAR(salesDate), MONTH(salesDate) ORDER BY YEAR ASC
            ';

  $result = mysqli_query($conn, $query);

  $query1 = 'SELECT YEAR(salesDate) AS YEAR, MONTHNAME(salesDate) AS MONTH, sum(salePrice) AS TOTAL
            FROM customer_tbl
            WHERE salesDate
            BETWEEN (CURRENT_DATE - INTERVAL 1 MONTH) AND CURRENT_DATE
            GROUP BY YEAR(salesDate), MONTH(salesDate) ORDER BY YEAR ASC
            ';

  $result2 = mysqli_query($conn, $query1);

  $queryPO = 'SELECT YEAR(getDate) AS YEAR, MONTHNAME(getDate) AS MONTH, sum(price) AS TOTAL
            FROM inventory_tbl
            WHERE getDate
            BETWEEN (CURRENT_DATE - INTERVAL 2 MONTH) AND (CURRENT_DATE - INTERVAL 1 MONTH)
            -- AND (CURRENT_DATE - INTERVAL 1 MONTH)
            GROUP BY YEAR(getDate), MONTH(getDate) ORDER BY YEAR ASC
            ';

  $resultPO = mysqli_query($conn, $queryPO);

  $queryPO1 = 'SELECT YEAR(getDate) AS YEAR, MONTHNAME(getDate) AS MONTH, sum(price) AS TOTAL
            FROM inventory_tbl
            WHERE getDate
            BETWEEN (CURRENT_DATE - INTERVAL 1 MONTH) AND CURRENT_DATE
            GROUP BY YEAR(getDate), MONTH(getDate) ORDER BY YEAR ASC
            ';

  $resultPO2 = mysqli_query($conn, $queryPO1);

  if (!$result) {
    die(mysqli_error($conn));
  }

  if (!$resultPO2) {
    die(mysqli_error($conn));
  }

  mysqli_close($conn);
?>

  <div class="contact-list">
    <div class="area-1">
        <div class="so-box">
          <div class="label"></h3>Previous Month</h3></div>
          <table style="text-align: center;">
            <?php
              if(mysqli_num_rows($result) > 0) {


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
        <div class="so-box">
          <div class="label"></h3>Current Month</h3></div>
          <table style="text-align: center;">
            <?php
              if(mysqli_num_rows($result2) > 0) {


                $output2 .= '
                              <tr style="text-align: center;">
                                <th>Year</th>
                                <th>Month</th>
                                <th>Total</th>
                              </tr> ';

                while($row = mysqli_fetch_assoc($result2)) {

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
    <div class="area-2">
        <div class="po-box">
          <div class="label"></h3>Previous Month</h3></div>
          <table style="text-align: center;">
            <?php
              if(mysqli_num_rows($resultPO) > 0) {


                $outputPO .= '
                              <tr style="text-align: center;">
                                <th>Year</th>
                                <th>Month</th>
                                <th>Total</th>
                              </tr> ';

                while($row = mysqli_fetch_assoc($resultPO)) {

                  if(isset($row['YEAR'])) {
                    $getYear = $row['YEAR'];
                  }

                  if(isset($row['MONTH'])) {
                    $getMonth = $row['MONTH'];
                  }

                  if(isset($row['TOTAL'])) {
                    $price = $row['TOTAL'];
                  }

                  $outputPO .= '
                  <tr style="text-align: center;">
                                <td width="15%">'.$getYear.'</td>
                                <td width="15%">'.$getMonth.'</td>
                                <td width="70%">Php '.$price.'</td> ';

                echo '</tr>';
                }

                echo $outputPO;
              }
            ?>
          </table>
        </div>
        <div class="po-box">
          <div class="label"></h3>Current Month</h3></div>
          <table style="text-align: center;">
            <?php
              if(mysqli_num_rows($resultPO2) > 0) {


                $outputPO2 .= '
                              <tr style="text-align: center;">
                                <th>Year</th>
                                <th>Month</th>
                                <th>Total</th>
                              </tr> ';

                while($row = mysqli_fetch_assoc($resultPO2)) {

                  if(isset($row['YEAR'])) {
                    $getYear = $row['YEAR'];
                  }

                  if(isset($row['MONTH'])) {
                    $getMonth = $row['MONTH'];
                  }

                  if(isset($row['TOTAL'])) {
                    $price = $row['TOTAL'];
                  }

                  $outputPO2 .= '
                  <tr style="text-align: center;">
                                <td width="15%">'.$getYear.'</td>
                                <td width="15%">'.$getMonth.'</td>
                                <td width="70%">Php '.$price.'</td> ';

                echo '</tr>';
                }

                echo $outputPO2;
              }
            ?>
          </table>
        </div>
    </div>
  </div>
