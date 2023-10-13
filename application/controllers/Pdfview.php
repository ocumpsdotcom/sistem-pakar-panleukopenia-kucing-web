<?php
defined('BASEPATH') or exit('No direct script allowed access');

require 'vendor/autoload.php';

class Pdfview extends CI_Controller
{
    public function consultation($kode)
    {
        $pdf = new Mpdf\Mpdf();

        $data['title'] = 'Rekap Hasil Konsultasi';

        //query builder group
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        //query builder for 'data user'
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('hasil_diagnosa', 'hasil_diagnosa.user_id = user.id');
        $this->db->join('daftar_penyakit', 'hasil_diagnosa.kode_penyakit = daftar_penyakit.kode_penyakit');
        $data['dataPemilik'] = $this->db->where('hasil_diagnosa.kode_konsultasi =', $kode)->get()->result_array();

        //query builder for 'gejala diinput'
        $this->db->select('*');
        $this->db->from('hasil_diagnosa');
        $this->db->join('temp_diagnosa', 'temp_diagnosa.kode_konsultasi = hasil_diagnosa.kode_konsultasi');
        $this->db->join('daftar_gejala', 'temp_diagnosa.kode_gejala = daftar_gejala.kode_gejala');
        $this->db->where('hasil_diagnosa.user_id', $data['user']['id']);
        $data['gejalaDipilih'] =  $this->db->where('hasil_diagnosa.kode_konsultasi =', $kode)->get()->result_array();

        //for filename
        $file_pdf = 'rekap_hasil_konsultasi';
        $paper = 'A4';
        $orientation = 'potrait';

        $html = $this->load->view('diagnosis/report-diagnosis', $data, true);

        //dompdf run
        $pdf->WriteHTML($html);
        $pdf->Output();
        // $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
