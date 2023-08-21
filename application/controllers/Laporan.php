<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Laporan Transaksi";
        $data['title2'] = "Laporan Transaksi";
        $data['path'] = "Laporan Transaksi / index";
        $this->template->load('templates/dashboard', 'laporan/form', $data);
    }

    public function laporan_barang()
    {
        $data['title'] = "Laporan Transaksi";
        $data['title2'] = "Laporan Transaksi";
        $data['path'] = "Laporan Transaksi / index";
        $tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));

        $data['barang'] = $this->admin->getBarangSortTgl($tgl_awal, $tgl_akhir)->result_array();

        // kirim data tanggal untuk riwayat penelusuran
        $data['tgl_awal'] = $this->input->post('tanggal_awal');
        $data['tgl_akhir'] = $this->input->post('tanggal_akhir');

        $this->template->load('templates/dashboard', 'laporan/form', $data);
    }

    public function barangPDF()
    {
        $tgl_awal = date('Y-m-d', strtotime($this->uri->segment(3, 0)));
        $tgl_akhir = date('Y-m-d', strtotime($this->uri->segment(4, 0)));
        $data = array(
            'title_web' => 'Laporan Semua Data Barang',
            'barang' => $this->admin->getBarangSortTgl($tgl_awal, $tgl_akhir)->result_array(),
            'tanggal' => [
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir
            ]
        );
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $paper_size = 'A4';
        $orientation = 'portrait';
        $this->pdf->set_paper($paper_size, $orientation);
        $this->pdf->filename = "laporan_barang.pdf";
        $this->pdf->load_view('laporan/laporan_barang', $data);
    }
}
