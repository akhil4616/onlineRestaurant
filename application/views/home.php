<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><h2 align="center">Our Products</h2>
<table class="table ">
	<tr>
		<th>Product Name</th>
		<th>Price per Unit</th>
		<th>Quantity</th>
		<th>#</th>
	</tr>
	<?php foreach($products as $product): ?>
	<form method="post" action="<?php echo base_url().'Customer/addToCart/' ?>">
		<input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
		<!-- <input type="hidden" name="product_name" value="<?php echo $product['product_name'] ?>"> -->
	<tr>
		<td><?php echo $product['product_name'] ?></td>
		<td><?php echo $product['unit_price'] ?> (<?php echo $product['unit_type'] ?>)</td>
		<td><input type="number" name="quantity" min="1" value="1" class="form-control" style="width:50px"></td>
		<td><button class="btn btn-success" type="submit">Add to cart</button></a></td>
	</tr>
	</form>
<?php endforeach; ?>
</table>