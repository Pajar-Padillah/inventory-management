<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangrusak extends CI_Controller
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
        $data['title'] = "Barang Rusak";
        $data['title2'] = "Barang Rusak";
        $data['path'] = "Barang Rusak / index";
        $data['barang'] = $this->admin->getBarangRusak();
        $this->template->load('templates/dashboard', 'barang_rusak/data', $data);
    }


    public function edit()
    {
        $data['title'] = "Barang Rusak";
        $data['title2'] = "Barang Rusak";
        $data['path'] = "Barang Rusak / editbarangrusak";
        $data['barang'] = $this->admin->getBrg('barang', 'id_barang', $this->uri->segment('3'));
        $this->template->load('templates/dashboard', 'barang_rusak/editbarangrusak', $data);
    }

    public function editbarangrusak()
    {
        $this->_validasi();
        $id = $this->input->post('id_barang');
        $tanggal_rusak = $this->input->post('tanggal_rusak');
        $kondisi = 'rusak';
        $approved_rusak = 'pending';
        $keterangan_rusak = $this->input->post('keterangan_rusak');
        $idd = slug($this->input->post('id_barang'));

        $config['upload_path'] = './assets/img/rusak/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        // $config['max_size'] = '1000';
        // $config['max_width'] = '1000';
        // $config['max_height'] = '1000';
        $config['file_name'] = 'Bukti Kerusakan ' . $idd . '';
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $foto = $this->upload->data();
        $bukti = $foto['file_name'];
        $hasil = $this->admin->formbarangrusak($id, $tanggal_rusak, $kondisi, $approved_rusak, $keterangan_rusak, $bukti);
        if ($hasil) {
            set_pesan('data berhasil diperbarui');
            redirect('barangrusak');
        } else {
            set_pesan('gagal memperbarui data');
            redirect('barang/formbarangrusak/' . $id);
        }
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang Rusak";
            $data['title2'] = "Barang Rusak";
            $data['path'] = "Barang Rusak / add";
            $data['ruang'] = $this->admin->get('ruang');
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang'] = $this->admin->getBrgBaik('barang', ['kondisi' => 'baik']);

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('barang', 'id_barang');
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_barang'] = 'BMN' . $number;

            $this->template->load('templates/dashboard', 'barang_rusak/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('barang', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('barang');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('barang/add');
            }
        }
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');
    }


    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang', 'id_barang', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('barang');
    }

    public function terima_barang_rusak()
    {
        $id = $this->input->post('id_barang');
        $save  = array(
            'id_barang' => $id,
            'approved_rusak' => "ya"
        );
        $this->admin->verifbarang($id, $save);
        $this->session->set_flashdata('terima_brg_rusak', 'terima_brg_rusak');
        redirect('barangrusak');
    }
    public function tolak_barang_rusak()
    {
        $id = $this->input->post('id_barang');
        $save  = array(
            'id_barang' => $id,
            'keterangan_tolak' => $this->input->post('keterangan_tolak'),
            'approved_rusak' => "tidak"
        );
        $this->admin->verifbarang($id, $save);
        $this->session->set_flashdata('tolak_brg_rusak', 'tolak_brg_rusak');
        redirect('barangrusak');
    }
    public function ubah_rusak_ke_baik()
    {
        $id = $this->input->post('id_barang');
        $tanggal_rusak = '';
        $kondisi = 'baik';
        $approved_rusak = 'pending';
        $keterangan_rusak = null;
        $keterangan_tolak = '';
        $bukti = null;
        $foto_old = './assets/img/rusak/' . htmlentities($post['foto_old']);
        if (file_exists($foto_old)) {
            unlink($foto_old);
        }
        $hasil = $this->admin->ubahbarangrusakkebaik($id, $tanggal_rusak, $kondisi, $approved_rusak, $keterangan_rusak, $bukti, $keterangan_tolak);
        if ($hasil) {
            $this->session->set_flashdata('ubah_brg_rusak', 'ubah_brg_rusak');
            redirect('barangrusak');
        } else {
            $this->session->set_flashdata('gagal_ubah_brg_rusak', 'gagal_ubah_brg_rusak');
            redirect('barangrusak');
        }
    }
}
