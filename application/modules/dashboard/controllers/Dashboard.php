<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
    }
    public function filter_date()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data['penjualan'] = $this->global_model->get_by_date($start_date, $end_date);

        $this->load->view('search', $data);
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['penjualan'] = $this->global_model->search($keyword);
        $this->load->view('search', $data);
    }
    public function index()
	{
	$data = [
        'header' => modules::run('global/header/top'),
        'content' => modules::run('dashboard/view'),
        'footer' => modules::run('global/footer/bottom')
        ];

		$this->load->view('template', $data);
        
	}
    public function view()
    {
        // $data = [
		// 	'penjualan' => $this->global_model->get_all('penjualan')
		// ];
        $data['penjualan'] = $this->global_model->get_all();
        $this->load->view('index', $data);
    }
    public function add()
	{
	$data = [
        'header' => modules::run('global/header/top'),
        'content' => modules::run('dashboard/view_add'),
        'footer' => modules::run('global/footer/bottom')
    ];

		$this->load->view('template', $data);
	}
    public function view_add()
    {
        $this->load->view('add');  
    }
    public function store()
    {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'stok' => $this->input->post('stok'),
            'jumlah_terjual' => $this->input->post('jumlah_terjual'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'jenis_barang' => $this->input->post('jenis_barang')
        );
        $this->global_model->insert($data);
        redirect('penjualan');
    }
    public function edit($id)
	{
	$data = [
        'header' => modules::run('global/header/top'),
        'content' => modules::run('dashboard/view_edit', $id),
        'footer' => modules::run('global/footer/bottom')
    ];

		$this->load->view('template', $data);
	}
    public function view_edit($id)
    {
        $data['penjualan'] = $this->global_model->get_by_id($id);
        $this->load->view('edit', $data);
    }
    public function update($id)
    {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'stok' => $this->input->post('stok'),
            'jumlah_terjual' => $this->input->post('jumlah_terjual'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'jenis_barang' => $this->input->post('jenis_barang')
        );
        $this->global_model->update($id, $data);
        redirect('penjualan');
    }
    public function delete($id)
    {
        $this->global_model->delete($id);
        redirect('penjualan');
    }
    public function sort()
    {
        $column = $this->input->post('column');
        // $order = $this->input->post('order');
        $data['penjualan'] = $this->global_model->sort($column);
        $this->load->view('search', $data);
    }

}