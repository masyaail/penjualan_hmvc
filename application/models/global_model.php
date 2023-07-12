<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model {
public function __construct() {
    parent::__construct();
    }
    public function get_by_date($start_date, $end_date)
    {
        if ($start_date && $end_date) {
            $this->db->where('tanggal_transaksi >=', $start_date);
            $this->db->where('tanggal_transaksi <=', $end_date);
        } elseif ($start_date) {
            $this->db->where('tanggal_transaksi >=', $start_date);
        } elseif ($end_date) {
            $this->db->where('tanggal_transaksi <=', $end_date);
        }

        return $this->db->get('penjualan')->result_array();
    }
    public function search($keyword)
    {
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('tanggal_transaksi', $keyword);
        return $this->db->get('penjualan')->result_array();
    }
    public function sort($column)
    {
        $this->db->order_by($column);
        return $this->db->get('penjualan')->result_array();
    }
    public function get_all() {

        // $this->db->from($table);
        // $q = $this->db->get();
        // return $q->result_array();
        return $this->db->get('penjualan')->result_array();
    }
    public function insert($data)
    {
        $this->db->insert('penjualan', $data);
    }
    public function get_by_id($id)
    {
        return $this->db->get_where('penjualan', array('id' => $id))->row_array();
    }
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penjualan');
    }


    public function get_jenis_barang()
    {
        return $this->db->get('penjualan')->result_array();
    }

    public function get_top_penjualan($jenis_barang, $start_date, $end_date ) {

        $comparator = ['start'=>'','end'=>''];
        
        if ($start_date && $end_date){
        $comparator = ['start'=>'>=','end' => '<='];
        }

        $this->db->where('jenis_barang', $jenis_barang);
        $this->db->where('tanggal_transaksi' . $comparator['start'] , $start_date);
        $this->db->where('tanggal_transaksi '. $comparator['end'], $end_date);
        $this->db->order_by('jumlah_terjual', 'desc');
        $this->db->limit(1);
        return $this->db->get('penjualan')->row_array();
    }
    
    public function get_bottom_penjualan($jenis_barang, $start_date, $end_date ) {
        $comparator = ['start'=>'','end'=>''];
        
        if ($start_date && $end_date){
        $comparator = ['start'=>'>=','end' => '<='];
        }
        
        $this->db->where('jenis_barang', $jenis_barang);
        $this->db->where('tanggal_transaksi '. $comparator['start'], $start_date);
        $this->db->where('tanggal_transaksi '. $comparator['end'], $end_date);
        $this->db->order_by('jumlah_terjual', 'asc');
        $this->db->limit(1);
        return $this->db->get('penjualan')->row_array();
    }

}