<h2 align="center">View Products</h2>
<table class="table ">
	<tr>
		<th>Sl No</th>
		<th>Product Name</th>
		<th>Unit Price</th>
		<th>Unit type</th>
		<th>Available Status</th>
		<th>#</th>
		<th>#</th>
	</tr>
	<?php foreach($products as $key=>$product): ?>
	<tr>
		<td><?php echo $key+1 ?></td>
		<td><?php echo $product['product_name'] ?></td>
		<td><?php echo '₹'. $product['unit_price'] ?></td>
		<td><?php echo $product['unit_type'] ?></td>
		<td><?php echo $product['available_status'] ?></td>
		<td><a href="<?php echo base_url().'Admin/editProduct/'.$product['product_id'] ?>"><button class="btn btn-success">Update</button></a></td>
		<td><a href="<?php echo base_url().'Admin/deleteProduct/'.$product['product_id'] ?>" onclick="return confirm('do you want to delete this product')"><button class="btn btn-danger">Delete</button></a></td>
	</tr>
<?php endforeach; ?>
</table>