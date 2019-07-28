


<?php
  require('config/config.php');
  require('config/server.php');

  $query = 'SELECT salePrice, salesDate FROM customer_tbl WHERE salesDate(CURRENT_DATE)';

  $result = mysqli_query($conn, $query);

  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  mysqli_close($conn);
?>

  <?php foreach($posts as $post) : ?>
        <?php $total = 0; ?>
  <?php endforeach; ?>
  <?php foreach($posts as $post) : ?>

    <?php
      $myvar = 0;
      if(isset($post['salePrice'])) {
        $myvar = $post['salePrice'];
      }
         $total += $myvar;
    ?>
  <?php endforeach; ?>
  <div class="so-box">
    <h1>Service Income</h1>
    <p>Total: Php <?php echo $total; ?></p>
  </div>
