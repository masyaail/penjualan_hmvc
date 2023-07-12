<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends MX_Controller{
    public function index()
	{
        
	$data = [
        'header' => modules::run('global/header/top'),
        'content' => modules::run('compare/view_banding'),
        'footer' => modules::run('global/footer/bottom')
        ];

		$this->load->view('template', $data);    
	}
    public function view_banding() {
        $jenis_barang = $this->input->get('jenis_barang');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data['jenis'] = $this->global_model->get_jenis_barang();
        $data['top_penjualan'] = $this->global_model->get_top_penjualan($jenis_barang, $start_date, $end_date);
        $data['bottom_penjualan'] = $this->global_model->get_bottom_penjualan($jenis_barang, $start_date, $end_date);
        $this->load->view('compares', $data);
    }
}