<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function getBrgBaik($table_name, $where)
    {
        $this->db->where($where);
        $get = $this->db->get($table_name);
        return $get->result_array();
    }

    public function getBrg($table_name, $where, $id)
    {
        $this->db->where($where, $id);
        $edit = $this->db->get($table_name);
        return $edit->row();
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }


    public function getBarang()
    {
        $this->db->join('ruang r', 'b.ruang_id = r.id_ruang');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->where('kondisi', 'baik');
        $this->db->order_by('id_barang', 'DESC');
        return $this->db->get('barang b')->result_array();
    }

    public function formbarangrusak($id, $tanggal_rusak, $kondisi, $approved_rusak, $keterangan_rusak, $bukti)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE barang SET tanggal_rusak='$tanggal_rusak', kondisi= '$kondisi', approved_rusak='$approved_rusak', keterangan_rusak = '$keterangan_rusak', foto = '$bukti' WHERE id_barang='$id'");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function formbarangkeluar($id, $tanggal_keluar, $kondisi, $approved_keluar, $nilai_lelang, $bukti)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE barang SET tanggal_keluar='$tanggal_keluar', kondisi= '$kondisi', approved_keluar = '$approved_keluar', nilai_lelang = '$nilai_lelang', kuitansi = '$bukti' WHERE id_barang='$id'");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    function verifbarang($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }

    public function ubahbarangrusakkebaik($id, $tanggal_rusak, $kondisi, $approved_rusak, $keterangan_rusak, $bukti, $keterangan_tolak)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE barang SET tanggal_rusak='$tanggal_rusak', kondisi= '$kondisi', approved_rusak='$approved_rusak', keterangan_rusak = '$keterangan_rusak', foto = '$bukti', keterangan_tolak = '$keterangan_tolak' WHERE id_barang='$id'");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function ubahbarangkeluarkebaik($id, $tanggal_keluar, $kondisi, $approved_rusak, $approved_keluar, $keterangan_tolak, $nilai_lelang, $kuitansi)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE barang SET tanggal_keluar='$tanggal_keluar', kondisi= '$kondisi', approved_rusak='$approved_rusak', approved_keluar='$approved_keluar', keterangan_tolak = '$keterangan_tolak', nilai_lelang='$nilai_lelang', kuitansi = '$kuitansi' WHERE id_barang='$id'");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function getBarangg($limit = null, $id_barang = null, $range = null)
    {
        $this->db->join('ruang r', 'b.ruang_id = r.id_ruang');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }

        if ($range != null) {
            $this->db->where('tanggal_perolehan' . ' >=', $range['mulai']);
            $this->db->where('tanggal_perolehan' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_barang', 'DESC');
        return $this->db->get('barang b')->result_array();
    }

    public function getBarangSortTgl($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT * FROM barang 
        JOIN ruang ON barang.ruang_id = ruang.id_ruang 
        JOIN jenis ON barang.jenis_id = jenis.id_jenis 
        JOIN satuan ON barang.satuan_id = satuan.id_satuan
        WHERE barang.tanggal_perolehan BETWEEN '$tgl_awal' AND '$tgl_akhir'
        ORDER BY barang.tanggal_perolehan DESC
          ";
        return $this->db->query($query);
    }

    public function getBarangByID($id)
    {
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        return $this->db->get_where('barang', ['barang.id_barang' => $id])->row_array();
    }

    public function getBarangkeluarr($limit = null, $id_barang = null, $range = null)
    {
        $this->db->join('ruang r', 'b.ruang_id = r.id_ruang');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->where('kondisi', 'keluar');

        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }

        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }

        $this->db->order_by('tanggal_keluar', 'DESC');
        return $this->db->get('barang b')->result_array();
    }

    public function getBarangRusak($limit = null, $id_barang = null, $range = null)
    {
        $this->db->join('ruang r', 'b.ruang_id = r.id_ruang');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->where('kondisi', 'rusak');

        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }

        if ($range != null) {
            $this->db->where('tanggal_rusak' . ' >=', $range['mulai']);
            $this->db->where('tanggal_rusak' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_barang', 'DESC');
        return $this->db->get('barang b')->result_array();
    }

    public function getBarangMasuk($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        // $this->db->join('user u', 'bm.user_id = u.id_user');
        // $this->db->join('supplier sp', 'bm.supplier_id = sp.id_supplier');
        $this->db->join('ruang r', 'b.ruang_id = r.id_ruang');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }

        if ($range != null) {
            $this->db->where('tanggal_perolehan' . ' >=', $range['mulai']);
            $this->db->where('tanggal_perolehan' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_barang', 'DESC');
        return $this->db->get('barang b')->result_array();
    }


    public function getBarangKeluar($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        // $this->db->join('user u', 'bk.user_id = u.id_user');
        $this->db->join('ruang r', 'b.ruang_id = r.id_ruang');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_barang', 'DESC');
        return $this->db->get('barang b')->result_array();
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    // public function countt($table, $field)
    // {
    //     $this->db->select_count($field);
    //     return $this->db->get($table)->row_array()[$field];
    // }

    public function getBarangBaik()
    {
        $sql = "SELECT count(kondisi) as kondisi FROM barang WHERE barang.kondisi = 'baik'";
        $result = $this->db->query($sql);
        return $result->row()->kondisi;
    }

    public function getBarangkeluarrr()
    {
        $sql = "SELECT count(kondisi) as kondisi FROM barang WHERE barang.kondisi = 'keluar'";
        $result = $this->db->query($sql);
        return $result->row()->kondisi;
    }

    public function getBarangRusakk()
    {
        $sql = "SELECT count(kondisi) as kondisi FROM barang WHERE barang.kondisi = 'rusak'";
        $result = $this->db->query($sql);
        return $result->row()->kondisi;
    }


    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    public function chartBarangMasuk($bulan)
    {
        $like = 'T-BM-' . date('y') . $bulan;
        $this->db->like('id_barang', $like, 'after');
        return count($this->db->get('barang')->result_array());
    }

    // public function chartBarangKeluar($bulan)
    // {
    //     $like = 'T-BK-' . date('y') . $bulan;
    //     $this->db->like('id_barang_keluar', $like, 'after');
    //     return count($this->db->get('barang_keluar')->result_array());
    // }

    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'barang_masuk' ? 'tanggal_masuk' : 'tanggal_keluar';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
    }

    // public function cekStok($id)
    // {
    //     $this->db->join('satuan s', 'b.satuan_id=s.id_satuan');
    //     return $this->db->get_where('barang b', ['id_barang' => $id])->row_array();
    // }
}
