<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		#	check for cart
		if($this->session->userdata('cart')==True){
			$this->cartCount= count(array_filter($this->session->userdata('cart')));
		}
		else{
			$this->cartCount = 0;
		}
	}
	#	checking item in cart and updating
	public function checkCart($productId,$quantity){
		$cartDetails=$this->session->userdata('cart');
		foreach ($cartDetails as $key => $cartData) {
			if($productId== $cartData['product_id']){
				# updating quantiy of an item in cart
				$cartDetails[$key]['quantity']+=$quantity; 
				$this->session->set_userdata('cart',$cartDetails);
				return True;
			}
			
		}
		return False;
	}
	# method for add item to cart
	public function addToCart(){
		# checking whether cart was created
		if($this->session->userdata('cart')==true){

			$cart=$this->session->userdata('cart');
			$productId=$this->input->post('product_id');
			$productDetails=$this->ProductModel->viewProducts($productId);
			$quantity=$this->input->post('quantity');
			# checking item in cart
			if($this->checkCart($productId,$quantity)==False){
				$cartData=array(
						'product_id'=>$this->input->post('product_id'),
						'product_name'=>$productDetails['product_name'],
						'unit_price'=>$productDetails['unit_price'],
						'unit_type'=>$productDetails['unit_type'],
						'quantity'=>$this->input->post('quantity')
				);
				array_push($cart,$cartData);
			$this->session->set_userdata("cart",$cart);
			}

		}
		else{
			# creating a cart array in session 
			$cart=array();
			$productId=$this->input->post('product_id');
			$productDetails=$this->ProductModel->viewProducts($productId);
			$cartData=array(
					'product_id'=>$this->input->post('product_id'),
					'product_name'=>$productDetails['product_name'],
					'unit_price'=>$productDetails['unit_price'],
					'unit_type'=>$productDetails['unit_type'],
					'quantity'=>$this->input->post('quantity')
			);
			array_push($cart,$cartData);
			$this->session->set_userdata("cart",$cart);
		}
		redirect('Home');
	}
	public function viewCart(){
		$data['cartCount']=$this->cartCount;
		$data['cartDetails']=$this->session->userdata('cart');
		$this->load->view('header',$data);
		$this->load->view('Customer/ViewCart',$data);	
	}
	# delete an item from cart
	public function deleteCart($productId){
		$cartDetails=$this->session->userdata('cart');
		foreach ($cartDetails as $key => $cartData) {
			if($productId== $cartData['product_id']){
				unset($cartDetails[$key]);
				$this->session->set_userdata('cart',$cartDetails);
				break;
			}
			
		}
		redirect('Customer/viewCart');
	}
	# method for empty the cart
	public function emptyCart(){
		$data=array();
		$this->session->set_userdata('cart',$data);
		redirect(base_url().'Customer/viewCart');
	}

	public function placeOrder(){

		$this->form_validation->set_rules('customer_name','Customer Name','required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('house_name','House Name','required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('place','Place','required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('phone_number','Phone Number','required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('delivery_date','Delivery Date','required');
		$this->form_validation->set_rules('delivery_time','Delivery Time','required');

		if($this->input->post('place_order')==True){
			if($this->form_validation->run()===True){
				$cartDetails=$this->session->userdata('cart');
				$orderId=$this->OrderModel->placeOrder($cartDetails);
				$data=array();
				$this->session->set_userdata('cart',$data);
				redirect('Customer/orderComplete/'.$orderId);
			}
		}
		
		$data['cartCount']=$this->cartCount;
		$this->load->view('header',$data);
		$this->load->view('Customer/placeOrder');
	}
	# method for showing order Id after placing it.
	public function orderComplete($orderId){
		$data['orderId']=$orderId;
		$data['cartCount']=$this->cartCount;
		$this->load->view('header',$data);
		$this->load->view('Customer/orderComplete',$data);
		$this->load->view('footer');
	}
	# method for tracking an order by using order id.
	public function trackOrder(){
		$data['orderDetails']=[];
		$data['status']='';
		$this->form_validation->set_rules('order_id','Order Id','required');
		if($this->input->post('track_order')==True){
			if($this->form_validation->run()===True){
				$orderId=$this->input->post('order_id');
				$data['orderDetails']=$this->OrderModel->viewOrderDetails($orderId);
				if(count($data['orderDetails'])>0){
					$data['status']='success';
				}
				else{
					$data['status']='Invalid Order Id !';
				}
			}
			
		}
		$data['cartCount']=$this->cartCount;
		$this->load->view('header',$data);
		$this->load->view('Customer/trackOrder',$data);
		$this->load->view('footer');
	}
}	

?>