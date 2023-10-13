<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Daftar Penyakit';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['penyakit'] = $this->db->get('daftar_penyakit')->result_array();

        $this->form_validation->set_rules('nama_penyakit', 'Nama_Penyakit', 'required|max_length[50]');
        $this->form_validation->set_rules('solusi', 'solusi', 'required|min_length[20]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penyakit/index', $data);
            $this->load->view('templates/footer');
        } else {
            $todayTime = date("Y-m-d H:i:s", time());
            $query = $this->db->query("select max(kode_penyakit) as max_id from daftar_penyakit");
            $rows = $query->row();
            $kode = $rows->max_id;
            $noUrut = (int)substr($kode, 3, 5);
            $noUrut++;
            $char = "PK";
            $kode = $char . sprintf("%02s", $noUrut);

            $data = [
                'kode_penyakit' => $kode,
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'solusi' => $this->input->post('solusi'),
                'created_at' => $todayTime
            ];
            $this->db->insert('daftar_penyakit', $data);
            $this->session->set_flashdata('message', 'Data Penyakit Berhasil Disimpan!');
            redirect('penyakit');
        }
    }
    public function updatePenyakit()
    {
        $this->form_validation->set_rules('update_nama_penyakit', 'update_nama_penyakit', 'required|max_length[100]');
        $this->form_validation->set_rules('update_solusi', 'update_solusi', 'required|min_length[20]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('penyakit/index');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $todayTime = date("Y-m-d H:i:s", time());

            $data = [
                'nama_penyakit' => $this->input->post('update_nama_penyakit'),
                'solusi' => $this->input->post('update_solusi'),
                'updated_at' => $todayTime
            ];

            $this->db->where('id', $id);
            $this->db->update('daftar_penyakit', $data);
            $this->session->set_flashdata('message', 'Data penyakit berhasil diubah!');
            redirect('penyakit');
        }
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('daftar_penyakit');
        $this->session->set_flashdata('message', 'Data penyakit berhasil dihapus!!!');
        redirect('penyakit');
    }
}
