<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		#	check for session
		if($this->session->userdata('loginId')==False){
			$this->session->set_userdata('errorMsg','Login to Continue !');
			redirect(base_url().'login');
		}
	}
	public function index()
	{
		
		$this->load->view('Admin/header');
		$this->load->view('Admin/home');
		$this->load->view('Admin/footer');
	}

	
	public function createProduct(){

		if($this->input->post('add_product')==True){
			if($this->form_validation->run()===True){
				$this->ProductModel->createProduct();
			}
		}
		$this->load->view('Admin/header');
		$this->load->view('Admin/createProduct');
		$this->load->view('Admin/footer');
	}
	public function viewProducts(){

		$data['products']=$this->ProductModel->viewProducts();
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewProducts',$data);
		$this->load->view('Admin/footer');
	}
	public function editProduct($id){
		$this->form_validation->set_rules('product_name','Product Name','required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('unit_price','Unit Price','required|min_length[1]|max_length[6]');
		$this->form_validation->set_rules('unit_type','Unit Type','required|min_length[2]|max_length[10]');
		
		if($this->input->post('edit_product')==True){
			if($this->form_validation->run()===True){
				$this->ProductModel->editProduct($id);
				redirect('admin/viewProducts');
			}
		}

		$data['product']=$this->ProductModel->viewProducts($id);
		$this->load->view('Admin/header');
		$this->load->view('Admin/editProduct',$data);
		$this->load->view('Admin/footer');
	}
	public function deleteProduct($id){
		$this->ProductModel->deleteProduct($id);
		redirect('admin/viewProducts');
	}
	public function viewOrders(){
		$data['orderDetails']=$this->OrderModel->viewOrders();
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewOrders',$data);
		$this->load->view('Admin/footer');
	}

	public function viewOrderDetails($orderId){

		if($this->input->post('mark_as_delivered')==True){
			$this->OrderModel->updateOrder('delivered');
		}
		if($this->input->post('mark_as_cancelled')==True){
			$this->OrderModel->updateOrder('cancelled');
		}
		if($this->input->post('mark_as_processing')==True){
			$this->OrderModel->updateOrder('processing');
		}

		$data['orderDetails']=$this->OrderModel->viewOrderDetails($orderId);
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewOrderDetails',$data);
		$this->load->view('Admin/footer');

	}
	# method for creating chart of sales
	public function viewSalesReport(){
		$salesDetails=$this->OrderModel->viewSalesReport();
		$dataPoints=""; 
		#	creating data for graph
		foreach($salesDetails as $sales){
			$dataPoints.="{ label: '".date('M', mktime(0, 0, 0, $sales['order_month'], 10))."-".$sales['order_year']."',  y: ".$sales['amount']."  },";
		}
		$data['dataPoints']=$dataPoints;
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewSalesReport',$data);
		$this->load->view('Admin/footer');
	}
	
}
