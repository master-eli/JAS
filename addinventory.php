<?php
  require('config/config.php');
  require('config/server.php');


  if(isset($_POST['submitPurchase'])) {

    $siNum = strtoupper(mysqli_real_escape_string($conn, $_POST['siNum']));
    $proprietor = strtoupper(mysqli_real_escape_string($conn, $_POST['proprietor']));
    $tradeName = strtoupper(mysqli_real_escape_string($conn, $_POST['tradeName']));
    $address = strtoupper(mysqli_real_escape_string($conn, $_POST['address']));
    $proprietorContact = strtoupper(mysqli_real_escape_string($conn, $_POST['proprietorContact']));
    $price = strtoupper(mysqli_real_escape_string($conn, $_POST['price']));
    $getDate = strtoupper(mysqli_real_escape_string($conn, $_POST['getDate']));

    $query = "INSERT INTO inventory_tbl (siNum, proprietor, tradeName, address, proprietorContact, price, getDate)
              VALUES('$siNum', '$proprietor', '$tradeName', '$address', '$proprietorContact', '$price', '$getDate')";

    if(mysqli_query($conn, $query)) {
                // header('Location: '.ROOT_URL.'');
      echo "<script> alert('Success!'); </script>";
      } else {
        echo 'ERROR: '. mysqli_error($conn);
      }
  }

  if(isset($_POST['submitSales'])) {

    $customer = strtoupper(mysqli_real_escape_string($conn, $_POST['customer']));
    $customerAddress = strtoupper(mysqli_real_escape_string($conn, $_POST['customerAddress']));
    $customerName = strtoupper(mysqli_real_escape_string($conn, $_POST['customerName']));
    $contact = strtoupper(mysqli_real_escape_string($conn, $_POST['contact']));
    $salePrice = strtoupper(mysqli_real_escape_string($conn, $_POST['salePrice']));
    $salesDate = strtoupper(mysqli_real_escape_string($conn, $_POST['salesDate']));

	  $query = "INSERT INTO customer_tbl (customer, customerAddress, customerName, contact, salePrice, salesDate)
              VALUES ('$customer', '$customerAddress', '$customerName', '$contact', '$salePrice', '$salesDate')";

    if(mysqli_query($conn, $query)) {
      // header('Location: '.ROOT_URL.'');
      echo "<script> alert('Success!'); </script>";
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }
  }

  // mysqli_query($conn, $query);

  mysqli_close($conn);
?>

<style>
  <?php include('includeFolder/style.css'); ?>
</style>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entries</title>
    <!-- <link rel="stylesheet" href="includeFolder/style.css"> -->
  </head>

  <div class="entry-bg">

    <a href="<?php echo ROOT_URL ?>"><img src="includeFolder/JAS-Logo.jpg"></a>
    <div class="form-container">
      <table class="tbl">
      <div class="choice">

            <tr>
              <th><button type="submit" id="purchase">Purchase</button></th>
              <th><button type="submit" id="sales">Sales</button></th>
            </tr>

        </div>
        </table>
      <div class="add-form">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="add-inv">
          <div id="first" class="inline-fields">
            <input type="number" placeholder="SI #" name="siNum"><br>
            <input type="textarea" placeholder="PROPRIETOR" name="proprietor"><br>
            <input type="textarea" placeholder="TRADE NAME" name="tradeName"><br>
            <input type="textarea" placeholder="ADDRESS" name="address"><br>
            <input type="textarea" placeholder="CONTACT" name="proprietorContact"><br>
            <input type="number" placeholder="PRICE" name="price" step="0.001"><br>
            <input type="date" placeholder="DATE" name="getDate"><br>

            <div class="btn">
              <button type="submit" name="submitPurchase">Save</button>
            </div>
            </div>
            <div id="second" class="inline-fields">
              <input type="textarea" placeholder="COMPANY NAME" name="customer"><br>
              <input type="textarea" placeholder="COMPANY ADDRESS" name="customerAddress"><br>
              <input type="textarea" placeholder="OWNER" name="customerName"><br>
              <input type="textarea" placeholder="CONTACT" name="contact"><br>
              <input type="number" placeholder="PRICE" name="salePrice" step="0.001"><br>
              <input type="date" placeholder="" name="salesDate">

              <div class="btn">
                <button type="submit" name="submitSales">Save</button>
              </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <?php include('includeFolder/footer.php'); ?>

  <!--<script>

		$(document).ready(function(){

			$('#purchase').on('click', function() {

				$('#first').fadeIn(200);
				$('#second').hide();
			});

			$('#sales').on('click', function() {

				$('#first').hide();
				$('#second').fadeIn(200);
			});

		});
	</script> -->

  <script>

    var purchase = document.getElementById('purchase');
    var sales = document.getElementById('sales');
    var first = document.getElementById('first');
    var second = document.getElementById('second');

    purchase.addEventListener('click', hidePurchase);
    sales.addEventListener('click', hideSales);

    function hidePurchase() {

      first.style.display = "block";
      first.style.opacity = "1";
      second.style.display = "none";
      second.style.opacity = "0";
    }


    function hideSales() {

      first.style.display = "none";
      first.style.opacity = "0";
      second.style.display = "block";
      second.style.opacity = "1";
    }
  </script>
