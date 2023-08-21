<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $nama = userdata('nama');
        $data['title'] = "Dashboard";
        $data['title2'] = "Hallo $nama 😊";
        $data['path'] = "Dashboard / index";
        $data['barang'] = $this->admin->count('barang');
        $data['getbarang'] = $this->admin->getBarangg(5);
        $data['barang_baik'] = $this->admin->getBarangBaik();
        $data['barang_rusak'] = $this->admin->getBarangRusakk();
        $data['barang_rusakk'] = $this->admin->getBarangRusak(5);
        $data['barang_keluar'] = $this->admin->getBarangkeluarr(5);
        $data['getbarang_keluar'] = $this->admin->getBarangkeluarrr();

        // $data['supplier'] = $this->admin->count('supplier');
        $data['user'] = $this->admin->count('user');
        // $data['transaksi'] = [
        //     'barang_masuk' => $this->admin->getBarangMasuk(5),
        //     'barang_keluar' => $this->admin->getBarangKeluar(5)
        // ];

        // Line Chart
        // $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        // $data['cbm'] = [];
        // $data['cbk'] = [];

        // foreach ($bln as $b) {
        //     $data['cbm'][] = $this->admin->chartBarangMasuk($b);
        //     $data['cbk'][] = $this->admin->chartBarangKeluar($b);
        // }

        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
