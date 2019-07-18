<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$total=0;
?><h2 align="center">Your Cart</h2><hr>
<?php if ($cartCount>0): ?>
<table class="table ">
	<thead>
	<tr>
		<th scope="col">Sl No</th>
		<th>Product Name</th>
		<th>Price per Unit</th>
		<th>Quantity</th>
		<th>Total</th>
		<th>#</th>
	</tr>
	</thead>
	<?php foreach($cartDetails as $key=>$product): ?>
	<tr>
		<td><?php echo $key+1 ?></td>
		<td><?php echo $product['product_name'] ?></td>
		<td><?php echo  '₹'. $product['unit_price'] ?>(<?php echo $product['unit_type'] ?>)</td>
		<td><?php echo $product['quantity'] ?></td>
		<td><?php echo '₹'. ($product['unit_price']*$product['quantity']) ?></td>
		<td><a href="<?php echo base_url().'Customer/deleteCart/'.$product['product_id'] ?>"><button type="button" class="btn btn-warning" onclick="return confirm('are you sure to delete?')">Delete</button></a></td>
	</tr>
	</form>
	<?php $total+=($product['unit_price']*$product['quantity']); ?>
	<?php endforeach; ?>
	<tr>
		<td></td>
		<td></td>
		<td><a href="<?php echo base_url().'Customer/emptyCart/'?>" onclick="return confirm('are you sure to Empty?')"><button class="btn btn-danger">Empty Cart</button></a></td>
		<td>Grand Total :</td>	
		<th><?php echo '₹'. $total ?></th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2"> <a href="<?php echo base_url().'Customer/placeOrder/'?>"><button class="btn btn-primary">Place Order</button></a></td>
		<td></td>
	</tr>
</table>
<?php else: ?>
	<h1 style="color:red; text-align:center">Your Cart is Empty !</h1>
<?php endif ?>