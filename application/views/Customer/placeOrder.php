<div class="col-md-2"></div>
<div class="col-md-8" align="left">
	<h1 align="center">Plce Your Order</h1>
	<form method="post">
 	<?php echo validation_errors(); ?>
	<div class="form-group">
		<small>your Name</small>
		<input type="text" name="customer_name" placeholder="Name" class="form-control">
	</div>
	<div class="form-group">
		<small>House Name</small>
			<input type="text" name="house_name" placeholder="House Name" class="form-control">
	</div>
	<div class="form-group">
		<small>Place</small>
		<input type="text" name="place" placeholder="Place" class="form-control">
	</div>
	<div class="form-group">
		<small>Phone Number</small>
		<input type="text" name="phone_number" placeholder="Phone Number" class="form-control">
	</div>
		<div class="form-group">
		<small>Delivery Date</small>
		<input type="date" name="delivery_date"  class="form-control">
	</div>
		<div class="form-group">
		<small>Delivery Time</small>
		<input type="time" name="delivery_time" class="form-control">
	</div>
	<div class="form-group" align="right">
		<input type="submit" name="place_order"  class="btn btn-success">
	</div>
</div>