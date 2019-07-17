<?php 
	class ProductModel extends CI_Model{
		#	method to create product
		public function createProduct(){

			$data=array(
				'product_name'=>$this->input->post('product_name'),
				'unit_price'=>$this->input->post('unit_price'),
				'unit_type'=>$this->input->post('unit_type'),
				'available_status'=>'available',
			);
			return $this->db->insert('products',$data);
		}

		#	method to view products
		public function viewProducts($id=''){
			if($id==True){
				$data=array('product_id'=>$id);
				$qurey=$this->db->get_where('products',$data);
				return $qurey->row_array();
			}
			else{
				$qurey=$this->db->get('products');
				return $qurey->result_array();
			}
		}

		#	method to view Available products
		public function viewAvailableProducts($status){
			
			$data=array('available_status'=>$status);
			$qurey=$this->db->get_where('products',$data);
			return $qurey->result_array();
		}
		#	method for edit Products
		public function editProduct($id){
			$data=array(
				'product_name'=>$this->input->post('product_name'),
				'unit_price'=>$this->input->post('unit_price'),
				'unit_type'=>$this->input->post('unit_type'),
				'available_status'=>$this->input->post('available_status'),
			);
			$this->db->where('product_id',$id);
			return $this->db->update('products',$data);
		}
		#	method for delete a product
		public function deleteProduct($id){
			
			$this->db->where('product_id',$id);
			return $this->db->delete('products');
		}
	}

 ?>