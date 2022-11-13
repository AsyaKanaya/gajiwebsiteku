<?php

class GantiPassword extends CI_Controller{

	public function index()
	{
		$data['title'] = "Ganti Password";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('formGantiPassword',$data);
		$this->load->view('templates_admin/footer');
	}

	public function gantiPasswordAksi()
	{
		$passBaru  = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');

		$this->form_validation->set_rules('passBaru','password baru','required|matches[ulangPass]');
		$this->form_validation->set_rules('ulangPass','ulangi password','required');

		if($this->form_validation->run() != FALSE){
			$data = array('password' => md5($passBaru));
			$id = array('id_pegawai' => $this->session->userdata('id_pegawai'));
			$this->penggajianModel->update_data('data_pegawai',$data,$id);
			redirect('welcome');
		}else{
			$data['title'] = "Ganti Password";
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('formGantiPassword',$data);
			$this->load->view('templates_admin/footer');
		}
	
	}
}

?>