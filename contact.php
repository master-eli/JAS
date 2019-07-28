<?php
  require('config/config.php');
  require('config/server.php');

  $query = 'SELECT DISTINCT proprietor, tradeName, proprietorContact
            FROM inventory_tbl ORDER BY proprietor ASC';

  $result = mysqli_query($conn, $query);
  $posts1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  $sql = 'SELECT  DISTINCT customerName, customer, contact
          FROM customer_tbl ORDER BY customerName ASC';

          $result = mysqli_query($conn, $sql);
          $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

          mysqli_free_result($result);

  mysqli_close($conn);
?>

<?php include('includeFolder/header.php'); ?>
<div class="content-wrapper">
  <div class="upper-content">
    <h1>Contacts</h1><br>
  </div>

    <div class="bottom-content">
      <div class="contact-list">
        <div class="area-1">
          <h2 class="fh2">Purchase</h2>
          <?php foreach($posts1 as $post) : ?>
            <div class="proprietor-contact-box">
              <p>Owner: <?php echo $post['proprietor']; ?> </p>
              <p>Trade Name: <?php echo $post['tradeName']; ?> </p>
              <p>Contact: <?php echo $post['proprietorContact']; ?> </p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="area-2">
          <h2 class="sh2">Sales</h2>
          <?php foreach($posts as $post) : ?>
            <div class="proprietor-contact-box-right">
              <p>Owner: <?php echo $post['customerName']; ?> </p>
              <p>Trade Name: <?php echo $post['customer']; ?> </p>
              <p>Contact: <?php echo $post['contact']; ?> </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

</div>

<?php include('includeFolder/footer.php'); ?>
