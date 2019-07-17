<?php 
	class LoginModel extends CI_model{
		
		public function login(){
			$data=array(
				'username'=>$this->input->post('username'),	
				'password'=>md5($this->input->post('password'))
			);
			$query=$this->db->get_where('login',$data);
			return $query->result_array();

		}
	}

?>