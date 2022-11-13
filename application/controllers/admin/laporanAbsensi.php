<?php
	
	class LaporanAbsensi extends CI_Controller{

		public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') !='1') {
			redirect('welcome');
		}
	}

		public function index()
		{
			$data['title'] = "Laporan Absensi";
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/filterLaporanAbsensi');
			$this->load->view('templates_admin/footer');
		}

		public function cetakLaporanAbsensi()
		{
			$data['title'] = "Cetak Laporan Absensi";
			$bulan=$this->input->post('bulan');
			$tahun=$this->input->post('tahun');
			$bulantahun=$bulan.$tahun;
			$data['lap_kehadiran'] = $this->db->query("
				SELECT data_kehadiran.*,data_pegawai.nama_pegawai
				FROM data_kehadiran
				INNER JOIN data_pegawai ON data_kehadiran.nik = data_pegawai.nik
				WHERE bulan = '$bulantahun'
				")->result();
			$this->load->view('templates_admin/header',$data);
			$this->load->view('admin/cetakLaporanAbsensi');
		}
	}
?>