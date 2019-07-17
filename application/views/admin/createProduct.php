<div class="col-md-2"></div>
<div class="col-md-8" >
	<h1 align="center">Add New Product</h1>
	<form method="post">
 	<?php echo validation_errors(); ?>
	<div class="form-group">
		<input type="text" name="product_name" placeholder="Product Name" class="form-control">
	</div>
	<div class="form-group">
			<input type="number" step="any" name="unit_price" placeholder="Unit Price" class="form-control">
	</div>
	<div class="form-group">
		<input type="text" name="unit_type" placeholder="Unit Type" class="form-control">
	</div>
<div class="form-group">
		<input type="submit" name="add_product"  class="btn btn-success">
	</div>
</div>