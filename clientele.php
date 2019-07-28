<?php
  require('config/config.php');
  require('config/server.php');

  if(isset($_POST['edit'])) {

    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $customer = strtoupper(mysqli_real_escape_string($conn, $_POST['customer']));
    $customerAddress = strtoupper(mysqli_real_escape_string($conn, $_POST['customerAddress']));
    $customerName = strtoupper(mysqli_real_escape_string($conn, $_POST['customerName']));
    $contact = strtoupper(mysqli_real_escape_string($conn, $_POST['contact']));
    $salePrice = strtoupper(mysqli_real_escape_string($conn, $_POST['salePrice']));
    $salesDate = strtoupper(mysqli_real_escape_string($conn, $_POST['salesDate']));

	  $query = "UPDATE customer_tbl SET
              customer = '$customer',
              customerAddress = '$customerAddress',
              customerName = '$customerName',
              contact = '$contact',
              salePrice = '$salePrice',
              salesDate = '$salesDate'
              WHERE id = {$update_id}
              ";

    if(mysqli_query($conn, $query)) {
      echo "<script> alert('Success!'); </script>";
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }

  }

  if(isset($_POST['del'])) {

    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);

    $query = "DELETE FROM customer_tbl WHERE id = {$update_id}";

    if(mysqli_query($conn, $query)) {
      echo "<script> alert('File Deleted!'); </script>";
    } else {
      echo 'ERORR: '. mysqli_error($conn);
    }
  }

	$query = 'SELECT * FROM customer_tbl ORDER BY id ASC';

	$result = mysqli_query($conn, $query);

	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);

?>
