<div class="col-md-2"></div>
<div class="col-md-8" >
	<h1 align="center">Add New Product</h1>
	<form method="post">
 	<?php echo validation_errors(); ?>
	<div class="form-group">
		<input type="text" name="product_name" placeholder="Product Name" class="form-control" pattern="[a-zA-Z()-0-9 ]{3,20}" required>
	</div>
	<div class="form-group">
			<input type="number" step="any" name="unit_price" placeholder="Unit Price in ₹" class="form-control" required>
	</div>
	<div class="form-group">
		<input type="text" name="unit_type" placeholder="Unit Type" class="form-control" pattern="[a-zA-Z ]{3,20}" required>
	</div>
<div class="form-group" align="right">
		<input type="submit" name="add_product"  class="btn btn-success">
	</div>
</div>
</form>