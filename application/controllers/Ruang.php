<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
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
        $data['title'] = "Ruangan";
        $data['title2'] = "Ruangan";
        $data['path'] = "Ruangan / index";
        $data['ruang'] = $this->admin->get('ruang');
        $this->template->load('templates/dashboard', 'ruang/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Ruangan";
            $data['title2'] = "Ruangan";
            $data['path'] = "Ruangan / add";
            $this->template->load('templates/dashboard', 'ruang/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('ruang', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('ruang');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('ruang/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Ruangan";
            $data['title2'] = "Ruangan";
            $data['path'] = "Ruangan / edit";
            $data['ruang'] = $this->admin->get('ruang', ['id_ruang' => $id]);
            $this->template->load('templates/dashboard', 'ruang/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('ruang', 'id_ruang', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('ruang');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('ruang/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('ruang', 'id_ruang', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('ruang');
    }
}
