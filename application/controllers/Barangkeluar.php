<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
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
        $data['title'] = "Barang keluar";
        $data['title2'] = "Barang keluar";
        $data['path'] = "Barang keluar / index";
        $data['barangkeluar'] = $this->admin->getBarangkeluarr();
        $this->template->load('templates/dashboard', 'barang_keluar/data', $data);
    }

    public function edit()
    {
        $data['title'] = "Barang Keluar";
        $data['title2'] = "Barang Keluar";
        $data['path'] = "Barang Keluar / editbarangkeluar";
        $data['barang'] = $this->admin->getBrg('barang', 'id_barang', $this->uri->segment('3'));
        $this->template->load('templates/dashboard', 'barang_keluar/editbarangkeluar', $data);
    }

    public function editbarangkeluar()
    {
        $this->_validasi();
        $id = $this->input->post('id_barang');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $kondisi = 'keluar';
        $approved_keluar = 'pending';
        $nilai_lelang = $this->input->post('nilai_lelang');
        $idd = slug($this->input->post('id_barang'));

        $config['upload_path'] = './assets/img/keluar/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        // $config['max_size'] = '1000';
        // $config['max_width'] = '1000';
        // $config['max_height'] = '1000';
        $config['file_name'] = 'Kuitansi ' . $idd . '';
        $this->upload->initialize($config);
        $this->upload->do_upload('kuitansi');
        $kuitansi = $this->upload->data();
        $bukti = $kuitansi['file_name'];

        $hasil = $this->admin->formbarangkeluar($id, $tanggal_keluar, $kondisi, $approved_keluar, $nilai_lelang, $bukti);
        if ($hasil) {
            set_pesan('data berhasil diperbarui');
            redirect('barangkeluar');
        } else {
            set_pesan('gagal memperbarui data');
            redirect('barang/formbarangrusak/' . $id);
        }
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');

        $input = $this->input->post('barang_id', true);
        $stok = $this->admin->get('barang', ['id_barang' => $input])['stok'];
        $stok_valid = $stok + 1;

        $this->form_validation->set_rules(
            'jumlah_keluar',
            'Jumlah Keluar',
            "required|trim|numeric|greater_than[0]|less_than[{$stok_valid}]",
            [
                'less_than' => "Jumlah Keluar tidak boleh lebih dari {$stok}"
            ]
        );
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang Keluar";
            $data['title2'] = "Barang keluar";
            $data['path'] = "Barang / add";
            $data['barang'] = $this->admin->getBarangRusak();

            // Mendapatkan dan men-generate kode transaksi barang keluar
            $kode = 'BK-' . date('ymd');
            $kode_terakhir = $this->admin->getMax('barang_keluar', 'id_barang_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_barang_keluar'] = $kode . $number;

            $this->template->load('templates/dashboard', 'barang_keluar/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('barang_keluar', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('barangkeluar');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('barangkeluar/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang_keluar', 'id_barang_keluar', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('barangkeluar');
    }

    public function terima_barang_keluar()
    {
        $id = $this->input->post('id_barang');
        $save  = array(
            'id_barang' => $id,
            'approved_keluar' => "ya"
        );
        $this->admin->verifbarang($id, $save);
        $this->session->set_flashdata('terima_brg_keluar', 'terima_brg_keluar');
        redirect('barangkeluar');
    }
    public function tolak_barang_keluar()
    {
        $id = $this->input->post('id_barang');
        $save  = array(
            'id_barang' => $id,
            'keterangan_tolak' => $this->input->post('keterangan_tolak'),
            'approved_keluar' => "tidak"
        );
        $this->admin->verifbarang($id, $save);
        $this->session->set_flashdata('tolak_brg_keluar', 'tolak_brg_keluar');
        redirect('barangkeluar');
    }
    public function ubah_keluar_ke_rusak()
    {
        $id = $this->input->post('id_barang');
        $tanggal_keluar = null;
        $kondisi = 'rusak';
        $approved_rusak = 'pending';
        $approved_keluar = 'pending';
        $keterangan_tolak = '';
        $nilai_lelang = '0';
        $kuitansi = null;
        $foto_old = './assets/img/keluar/' . htmlentities($post['foto_old']);
        if (file_exists($foto_old)) {
            unlink($foto_old);
        }
        $hasil = $this->admin->ubahbarangkeluarkebaik($id, $tanggal_keluar, $kondisi, $approved_rusak, $approved_keluar, $keterangan_tolak, $nilai_lelang, $kuitansi);
        if ($hasil) {
            $this->session->set_flashdata('ubah_brg_keluar', 'ubah_brg_keluar');
            redirect('barangkeluar');
        } else {
            $this->session->set_flashdata('gagal_ubah_brg_keluar', 'gagal_ubah_brg_keluar');
            redirect('barangkeluar');
        }
    }
}
