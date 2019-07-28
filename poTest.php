

<?php include('proprietor.php'); ?>
<?php include('includeFolder/header.php'); ?>
	<div class="content-wrapper">
		<div class="upper-content">
			<h1>Proprietor</h1>

			<div class="view-opt">
				<div id="display-block">Block</div>
				<div id="display-tbl">Table</div>
			</div>
		</div>
		<div class="dBlock">

			<?php foreach($posts as $post) : ?>
				<div class="box-clienteleI">

	          <div class="optionMenu">
	            <div id="triangle" class="tri-btn" name="tri-btn">
	                <div class="circle"></div>
	                <div class="circle"></div>
	                <div class="circle"></div>
	            </div>

	            <div class="modal">
	              <div class="form-wrapper">
	                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="modal-form">
	                      <span class="close">&times;</span>
												<input type="number" placeholder="SI #" name="siNum" value="<?php echo $post['siNum']; ?>"><br>
	                      <input type="textarea" placeholder="PROPRIETOR" name="proprietor" value="<?php echo $post['proprietor']; ?>"><br>
	                      <input type="textarea" placeholder="TRADE NAME" name="tradeName" value="<?php echo $post['tradeName']; ?>"><br>
	                      <input type="textarea" placeholder="ADDRESS" name="address" value="<?php echo $post['address']; ?>"><br>
	                      <input type="textarea" placeholder="CONTACT" name="proprietorContact" value="<?php echo $post['proprietorContact']; ?>"><br>
	                      <input type="number" placeholder="PRICE" name="price" step="0.001" step="0.001" value="<?php echo $post['price']; ?>"><br>
	                      <input type="date" placeholder="DATE" name="getDate" value="<?php echo $post['getDate']; ?>">
	                      <input type="hidden" name="update_id" value="<?php echo $post['siNum']; ?>">

	                      <table class="modal-btn-tbl">
	                        <tr>
	                          <th>
	                            <div class="modal-btn">
	                              <button type="submit" name="edit">Save</button>
	                            </div>
	                          </th>
	                          <th>
	                            <div class="modal-btn del">
	                              <button type="submit" name="del" >Delete</button>
	                            </div>
	                          </th>
	                        </tr>
	                      </table>
	                </form>
	              </div>
	            </div>
	          </div>
						<p>SI #: <?php echo $post['siNum'];?></p>
	    			<p>Owner : <?php echo $post['proprietor'];?></p>
	          <p>Company Name: <?php echo $post['tradeName'];?></p>
	    			<p>Address: <?php echo $post['address'];?></p>
	    			<p>Contact: <?php echo $post['proprietorContact'];?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="dTable">
			<table id="disp-tbl">
					<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details">

        <div id="result"></div>
			</table>
		</div>
	</div>

  <?php include('includeFolder/footer.php'); ?>

<script>
	$(document).ready(function(){

		 load_data();

		 function load_data(query)
		 {
		  $.ajax({
		   url:"fetch.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
		    $('#result').html(data);
		   }
		  });
		 }
		 $('#search_text').keyup(function(){
		  var search = $(this).val();
		  if(search != '')
		  {
		   load_data(search);
		  }
		  else
		  {
		   load_data();
		  }
		 });
	});
</script>

  <script>

    $(document).ready(function() {

      $('.tri-btn').on('click', function() {

        var tri = $(this).next();

        tri.addClass('modal-active');
      });

      $('.close').on('click', function() {
        $('.modal').removeClass('modal-active');
      });

         /* -------------- */
      $('.del').on('click', function() {

        return confirm('Are you sure?');
        return false;

      });

			$('#display-block').on('click', function() {

				$('.dBlock').css({"display" : "block"});
				$('.dTable').css({"display" : "none"});
			});

			$('#display-tbl').on('click', function() {

				$('.dBlock').css({"display" : "none"});
				$('.dTable').css({"display" : "block"});
			});

    });

  </script>
