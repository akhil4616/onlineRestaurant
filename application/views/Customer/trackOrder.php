<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$total=0;
?>
<div class="col-md-2"></div> 
    <div class="col-md-8"> 
		<h2 align="center">Track Your Order</h2>
		<form method="post">
		 	<?php echo validation_errors(); ?>
			<div class="form-group">
				<input type="text" name="order_id" placeholder="Enter Your Order id" class="form-control">
			</div>
			<div class="form-group" align="right">
				<input type="submit" name="track_order" value="Track "  class="btn btn-success">
			</div>
		</form>
		<hr>
		<?php if (count($orderDetails)>0): ?>

			<h3>Order Details of order Id : <?php echo $orderDetails[0]['order_id'] ?></h3>
		<table class="table ">
			<thead>
			<tr>
				<th scope="col">Sl No</th>
				<th>Product Name</th>
				<th>Price per Unit</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
			</thead>
			<?php foreach($orderDetails as $key=>$product): ?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $product['product_name'] ?></td>
				<td><?php echo  '₹'. $product['unit_price'] ?>(<?php echo $product['unit_type'] ?>)</td>
				<td><?php echo $product['quantity'] ?></td>
				<td><?php echo '₹'. ($product['unit_price']*$product['quantity']) ?></td>
			</tr>
			</form>
			<?php $total+=($product['unit_price']*$product['quantity']); ?>
			<?php endforeach; ?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Grand Total :</td>	
				<th><?php echo '₹'. $total ?></th>
			</tr>
			<tr>
				<td colspan="3"></td>
				<th >Order Status :</th>
				<th><?php echo $orderDetails[0]['delivery_status'] ?></th>
			</tr>	
		</table>
		<?php else: ?>
			<h3 style="color:#f00722"><?php echo $status ?></h3>
		<?php endif ?>