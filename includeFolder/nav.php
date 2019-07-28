
  <div id="nav">
      <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="./salesorder.php">Sales Order</a></li>
        <li><a href="./purchaseorder.php">Purchase Order</a></li>
        <li id="add"><a href="./addinventory.php">Inventory</a></li>
        <li class="dropdown">
          <a href="#" class="drop-btn pseu">Projects</a>
          <div class="drpdwn">
              <a href="#">Ongoing</a>
              <a href="#">Finished</a>
          </div>
        </li>
        <li class="dropdown">
          <a href="contact.php" class="drop-btn pseu">Contacts</a></li>
        <li><a href="./purchasehistory.php">Purchase / Sales History</a></li>
      </ul>
  </div>

  <?php include('footer.php'); ?>

  <script>
  $(document).ready(function(){

    if($(window).width() > 480) {
      $('.drop-btn').on('click', function() {

        var drpdwn = $(this).next();

        $('drop-btn').toggleClass('pseu');
        drpdwn.toggle(300);

      });

      $('li').on('click', function(e) {

        // e.preventDefault();

        // $(this).addClass('active').siblings().removeClass('active');

        $('ul li.active').removeClass('active');
        $(this).closest('li').addClass('active');
      });

      // $('#add').on('click', function() {
      //   $('.entry-bg').addClass('entry-bgPasok');
      // });
    }

  });
  </script>
