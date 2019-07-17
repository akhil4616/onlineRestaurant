<div class="col-md-2"></div>
<div class="col-md-8" >
	<h1 align="center">Update Product</h1>
	<form method="post">
 	<?php echo validation_errors(); ?>
	<div class="form-group">
	<small>Product Name</small>
		<input type="text" name="product_name" placeholder="Product Name" class="form-control" value="<?php echo $product['product_name'] ?>">
	</div>
	<div class="form-group">
	<small>Unit price</small>
			<input type="number" step="any" name="unit_price" placeholder="Unit Price" class="form-control" value="<?php echo $product['unit_price'] ?>">
	</div>
	<div class="form-group">
	<small>Unit Type</small>
		<input type="text" name="unit_type" placeholder="Unit Type" class="form-control" value="<?php echo $product['unit_type'] ?>">
	</div>
	<div class="form-group">
	<small>Available Status</small>
		<input type="text" name="available_status" placeholder="Available Status" class="form-control" value="<?php echo $product['available_status'] ?>">
	</div>
<div class="form-group">
		<input type="submit" name="edit_product"  class="btn btn-success">
	</div>
</div>