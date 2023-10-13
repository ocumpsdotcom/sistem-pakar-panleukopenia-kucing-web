<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Daftar Gejala';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['gejala'] = $this->db->get('daftar_gejala')->result_array();


        $this->form_validation->set_rules('nama_gejala', 'Nama_gejala', 'required|max_length[50]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gejala/index', $data);
            $this->load->view('templates/footer');
        } else {
            $todayTime = date("Y-m-d H:i:s", time());
            $query = $this->db->query("select max(kode_gejala) as max_id from daftar_gejala");
            $rows = $query->row();
            $kode = $rows->max_id;
            $noUrut = (int)substr($kode, 3, 5);
            $noUrut++;
            $char = "GEP";
            $kode = $char . sprintf("%02s", $noUrut);

            $data = [
                'kode_gejala' => $kode,
                'nama_gejala' => $this->input->post('nama_gejala'),
                'created_at'  => $todayTime
            ];
            $this->db->insert('daftar_gejala', $data);
            $this->session->set_flashdata('message', 'Gejala berhasil ditambahkan!');
            redirect('gejala');
        }
    }
    public function updateGejala()
    {
        $this->form_validation->set_rules('update_nama_gejala', 'update_Nama_Gejala', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('gejala/index');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $todayTime = date("Y-m-d H:i:s", time());
            $data = [
                'nama_gejala' => $this->input->post('update_nama_gejala'),
                'updated_at'  => $todayTime
            ];

            $this->db->where('id', $id);
            $this->db->update('daftar_gejala', $data);
            $this->session->set_flashdata('message', 'Data gejala berhasil diubah!');
            redirect('gejala');
        }
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('daftar_gejala');
        $this->session->set_flashdata('message', 'Data gejala berhasil dihapus!');
        redirect('gejala');
    }
}
