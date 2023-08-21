<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
        $data['title'] = "Barang";
        $data['title2'] = "Barang";
        $data['path'] = "Barang / index";
        $data['barang'] = $this->admin->getBarang();
        $this->template->load('templates/dashboard', 'barang/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('ruang_id', 'Ruangan', 'required');
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang";
            $data['title2'] = "Barang";
            $data['path'] = "Barang / add";
            $data['ruang'] = $this->admin->get('ruang');
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            // $data['user'] = $this->admin->get('user');
            $data['id_user'] = $this->session->userdata('login_session')['user'];

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('barang', 'id_barang');
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_barang'] = 'BMN' . $number;

            $this->template->load('templates/dashboard', 'barang/add', $data);
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

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang";
            $data['title2'] = "Barang";
            $data['path'] = "Barang / edit";
            $data['ruang'] = $this->admin->get('ruang');
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang'] = $this->admin->get('barang', ['id_barang' => $id]);
            $this->template->load('templates/dashboard', 'barang/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('barang', 'id_barang', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('barang');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('barang/edit/' . $id);
            }
        }
    }

    public function formbarangrusak()
    {
        $data['title'] = "Barang";
        $data['title2'] = "Barang";
        $data['path'] = "Barang / formbarangrusak";
        $data['barang'] = $this->admin->getBrg('barang', 'id_barang', $this->uri->segment('3'));
        $this->template->load('templates/dashboard', 'barang/formbarangrusak', $data);
    }

    public function formbarangkeluar()
    {
        $data['title'] = "Barang";
        $data['title2'] = "Barang";
        $data['path'] = "Barang / formbarangkeluar";
        $data['barang'] = $this->admin->getBrg('barang', 'id_barang', $this->uri->segment('3'));
        $this->template->load('templates/dashboard', 'barang/formbarangkeluar', $data);
    }

    public function setbarangkeluar()
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

    public function setbarangrusak()
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

    // public function getstok($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $query = $this->admin->cekStok($id);
    //     output_json($query);
    // }

    public function getBarangByID($id)
    {
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        return $this->db->get_where('barang', ['barang.id_barang' => $id])->row_array();
    }

    public function ubahKondisibarang($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();
        $data = [
            'kondisi' => 'rusak',
        ];
        $this->db->where('barang.id_barang', $id);
        $update = $this->db->update('barang', $data);

        if ($update) {
            set_pesan('data berhasil disimpan');
            redirect('barang');
        } else {
            set_pesan('gagal menyimpan data');
            redirect('barang/edit/' . $id);
        }
    }
}
