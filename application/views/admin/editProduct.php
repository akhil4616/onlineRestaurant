<div class="col-md-2"></div>
<div class="col-md-8" align="left" >
	<h1 align="center">Update Product</h1>
	<form method="post">
 	<?php echo validation_errors(); ?>
	<div class="form-group">
	<small>Product Name</small>
		<input type="text" name="product_name" placeholder="Product Name" class="form-control" value="<?php echo $product['product_name'] ?>" required>
	</div>
	<div class="form-group">
	<small>Unit price (in ₹)</small>
			<input type="number" step="any" name="unit_price" placeholder="Unit Price" class="form-control" value="<?php echo $product['unit_price'] ?>"pattern="[a-zA-Z()-0-9 ]{3,20}" required>
	</div>
	<div class="form-group">
	<small>Unit Type</small>
		<input type="text" name="unit_type" placeholder="Unit Type" class="form-control" value="<?php echo $product['unit_type'] ?>" pattern="[a-zA-Z ]{3,20}" required>
	</div>
	<div class="form-group">
	<small>Available Status</small>
		<select name="available_status" class="form-control">
			<?php if($product['available_status']=='available'): ?>
				<option value="available" selected>available</option>
				<option value=" not available" >not available</option>
			<?php else: ?>
				<option value="available" >available</option>
				<option value="not available" selected>not available</option>
			<?php endif; ?>
		</select>
	</div>
<div class="form-group">
		<input type="submit" name="edit_product" value="Update"  class="btn btn-success">
	</div>
</div>