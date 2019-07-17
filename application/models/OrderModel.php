<?php 
	class OrderModel extends CI_Model{
		public function placeOrder($cartDetails){
			$order_id=uniqid();
			$data=array(
				'customer_name'=>$this->input->post('customer_name'),
				'house_name'=>$this->input->post('house_name'),
				'place'=>$this->input->post('place'),
				'phone_number'=>$this->input->post('phone_number'),
				'delivery_date'=>$this->input->post('delivery_date'),
				'delivery_time'=>$this->input->post('delivery_time'),
				'order_date'=>date('Y-m-d'),
				'order_id'=>$order_id,
			);
			$this->db->insert('order_master',$data);
			$order_master_id = $this->db->insert_id();

			foreach($cartDetails as $cartData){
				$data=array(
					'order_master_id'=>$order_master_id,
					'product_id'=>$cartData['product_id'],
					'quantity'=>$cartData['quantity']
				);
				$this->db->insert('order_child',$data);
			}
			return $order_id;
		}
		public function viewOrderDetails($orderId){
			
			$this->db->select('*');
			$this->db->from('order_master');
			$this->db->join('order_child','order_child.order_master_id=order_master.order_master_id','inner');
			$this->db->join('products','order_child.product_id=products.product_id','inner');
			$this->db->where('order_id',$orderId);
			$query=$this->db->get();
			return $query->result_array();

		}

		public function viewOrders(){

			$this->db->select('*');
			$this->db->select('sum(`unit_price`*`quantity`) as amount');
			$this->db->from('order_master');
			$this->db->join('order_child','order_child.order_master_id=order_master.order_master_id','inner');
			$this->db->join('products','order_child.product_id=products.product_id','inner');
			$this->db->group_by('order_id');
			$query=$this->db->get();
			return $query->result_array();
		}

		public function updateOrder($deliveryStatus){

			$orderId=$this->input->post('order_id');
			$data=array(
				'delivery_status'=>$deliveryStatus,
			);
			$this->db->where('order_id',$orderId);
			$this->db->update('order_master',$data);
		}

		public function viewSalesReport(){

			$this->db->select('*');
			$this->db->select('sum(`unit_price`*`quantity`) as amount');
			$this->db->select('month(order_date) as order_month,year(order_date) as order_year');
			$this->db->from('order_master');
			$this->db->join('order_child','order_child.order_master_id=order_master.order_master_id','inner');
			$this->db->join('products','order_child.product_id=products.product_id','inner');
			$this->db->where('delivery_status','delivered');
			$this->db->group_by('order_month','order_year');
			$query=$this->db->get();
			return $query->result_array();
		}
	}

?>