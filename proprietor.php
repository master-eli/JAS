<?php
  require('config/config.php');
  require('config/server.php');

  $output = '';

  if(isset($_POST['edit'])) {

    $update_id = mysqli_real_escape_string($conn, $_POST['siNum']);
    $tradeName = strtoupper(mysqli_real_escape_string($conn, $_POST['tradeName']));
    $address = strtoupper(mysqli_real_escape_string($conn, $_POST['address']));
    $proprietor = strtoupper(mysqli_real_escape_string($conn, $_POST['proprietor']));
    $proprietorContact = strtoupper(mysqli_real_escape_string($conn, $_POST['proprietorContact']));
    $price = strtoupper(mysqli_real_escape_string($conn, $_POST['price']));
    $getDate = strtoupper(mysqli_real_escape_string($conn, $_POST['getDate']));

	  $query = "UPDATE inventory_tbl SET
              proprietor = '$proprietor',
              tradeName = '$tradeName',
              address = '$address',
              proprietorContact = '$proprietorContact',
              price = '$price',
              getDate = '$getDate'
              WHERE siNum = {$update_id}
              ";

    if(mysqli_query($conn, $query)) {
      echo "<script> alert('Success!'); </script>";
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }

  }

  if(isset($_POST['del'])) {

    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);

    $query = "DELETE FROM inventory_tbl WHERE id = {$update_id}";

    if(mysqli_query($conn, $query)) {
      echo "<script> alert('File Deleted!'); </script>";
    } else {
      echo 'ERORR: '. mysqli_error($conn);
    }
  }

	$query = 'SELECT * FROM inventory_tbl ORDER BY siNum ASC';

	$result = mysqli_query($conn, $query);

	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

?>
