<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {	# Default controller
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('cart')==True){	# Checking session
			$this->cartCount= count(array_filter($this->session->userdata('cart')));
		}
		else{
			$this->cartCount = 0;	# Setting cart count to Zero
		}
	}
	public function index(){
		
		$data['cartCount']=$this->cartCount;	# Getting Cart count from session
		#	Get available poroducts
		$data['products']=$this->ProductModel->viewAvailableProducts($status='available');	
		$this->load->view('header',$data);
		$this->load->view('home',$data);
	}
	public function login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->input->post('login')==True){
			if($this->form_validation->run()===True){
				$result=$this->LoginModel->login();
				if(sizeof($result)>0){
					$this->session->set_userdata('loginId',$result[0]['login_id']);
					redirect(base_url().'admin');
				}
			}
		}
		$data['cartCount']=$this->cartCount;
		$this->load->view('header',$data);
		$this->load->view('Admin/login');

	}
	public function logout(){
		$this->session->unset_userdata('loginId');
		redirect(base_url().'login');
	}
}
