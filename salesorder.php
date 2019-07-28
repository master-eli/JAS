

<?php include('clientele.php'); ?>
<?php include('includeFolder/header.php'); ?>
	<div class="content-wrapper">
		<div class="upper-content">
			<h1>Clientele</h1>

			<div class="view-opt">
				<div id="display-block">Block</div>
				<div id="display-tbl">Table</div>
			</div>
		</div>

		<div class="bottom-content">
			<div class="dBlock">
				<?php foreach($posts as $post) : ?>
					<div class="box-clienteleI" id="disp-bl">

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
		                      <input type="textarea" placeholder="COMPANY NAME" name="customer" value="<?php echo $post['customer']; ?>"><br>
		                      <input type="textarea" placeholder="COMPANY ADDRESS" name="customerAddress" value="<?php echo $post['customerAddress']; ?>"><br>
		                      <input type="textarea" placeholder="OWNER" name="customerName" value="<?php echo $post['customerName']; ?>"><br>
		                      <input type="textarea" placeholder="CONTACT" name="contact" value="<?php echo $post['contact']; ?>"><br>
		                      <input type="number" placeholder="PRICE" name="salePrice" step="0.001" value="<?php echo $post['salePrice']; ?>"><br>
		                      <input type="date" placeholder="" name="salesDate" value="<?php echo $post['salesDate']; ?>">
		                      <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">

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
		          <p>Company Name: <?php echo $post['customer'];?></p>
		    			<p>Address: <?php echo $post['customerAddress'];?></p>
		    			<p>Owner : <?php echo $post['customerName'];?></p>
		    			<p>Contact: <?php echo $post['contact'];?></p>
					</div>
				<?php endforeach; ?>
			</div>
				<div class="dTable">
					<table class="disp-tbl">
						<input type="text" name="search_text" id="search_text" placeholder="Search....">
						<div id="result1"></div>
					</table>
				</div>
			</div>
		</div>

	<!-- </div> -->

  <?php include('includeFolder/footer.php'); ?>

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

	<script>
		$(document).ready(function(){

		 load_data();

		 function load_data(query)
		 {
		  $.ajax({
		   url:"fetchsale.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
		    $('#result1').html(data);
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
