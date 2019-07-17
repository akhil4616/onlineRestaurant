<h2 align="center">View Orders</h2>
<table class="table ">
	<tr>
		<th>Customer Name</th>
		<th>House Name</th>
		<th>Place</th>
		<th>Phone Number</th>
		<th>Total Amount</th>
		<th>Delivery Status</th>
		<th>#</th>
	</tr>
	<?php foreach($orderDetails as $orderDetail): ?>
	<tr>
		<td><?php echo $orderDetail['customer_name'] ?></td>
		<td><?php echo $orderDetail['house_name'] ?></td>
		<td><?php echo $orderDetail['place'] ?></td>
		<td><?php echo $orderDetail['phone_number'] ?></td>
		<td><?php echo $orderDetail['amount'] ?></td>
		<td><?php echo $orderDetail['delivery_status'] ?></td>
		<td><a href="<?php echo base_url().'Admin/viewOrderDetails/'.$orderDetail['order_id'] ?>">View Details</a></td>
	</tr>
<?php endforeach; ?>
</table>