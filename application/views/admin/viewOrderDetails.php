<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$total=0;
?>
<div class="col-md-2"></div> 
    <div class="col-md-8"> 
		<h2 align="center">Order Details</h2>
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
			<tr>
				<?php if($orderDetails[0]['delivery_status']!='delivered' and $orderDetails[0]['delivery_status']!='cancelled'): ?>
				<form method="post">
					<td><input type="hidden" name="order_id" value="<?php echo $orderDetails[0]['order_id'] ?>"></td>
					<td><input type="submit" class="btn btn-danger" name="mark_as_cancelled" value="Mark as Cancelled"></td>
					<td><input type="submit" class="btn btn-warning" name="mark_as_processing" value="Mark as Processing"></td>
					<td><input type="submit" class="btn btn-success" name="mark_as_delivered" value="Mark as Delivered"></td>
				</form>
				<?php endif ?>
			</tr>	
		</table>

		<?php endif ?>