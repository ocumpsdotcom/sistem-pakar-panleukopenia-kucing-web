<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function getNewCode(): string
    {
        $query = $this->db->query("select max(kode_konsultasi) as max_id from hasil_diagnosa");
        $rows = $query->row();
        $kode = $rows->max_id;
        $noUrut = (int)substr($kode, 3, 5);
        $noUrut++;
        $char = "KNS";
        $kode = $char . sprintf("%02s", $noUrut);

        return $kode;
    }

    public function index()
    {
        $data['title'] = 'Mulai Diagnosa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['gejala'] = $this->db->get('daftar_gejala')->result_array();

        foreach ($data['gejala'] as $gejala) {
            $this->form_validation->set_rules('cf_' . $gejala["kode_gejala"], 'cf_' . $gejala["kode_gejala"], 'required');
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('diagnosis/index', $data);
            $this->load->view('templates/footer');
        } else {
            $todayTime = date("Y-m-d H:i:s", time());
            $kode = $this->getNewCode();

            $kepastian = [];
            $kode_penyakit = [];

            //rule 1
            if ($this->input->post("cf_GEP01") != 0 && $this->input->post("cf_GEP02") != 0 && $this->input->post("cf_GEP05") != 0) {
                $cfPush = min($this->input->post("cf_GEP01"), $this->input->post("cf_GEP02"), $this->input->post("cf_GEP05")) * 0.5;
                $kodePush = 'PK01';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 2
            if ($this->input->post("cf_GEP03") != 0 && $this->input->post("cf_GEP06") != 0 && $this->input->post("cf_GEP07") != 0) {
                $cfPush = min($this->input->post("cf_GEP03"), $this->input->post("cf_GEP06"), $this->input->post("cf_GEP07")) * 0.6;
                $kodePush = 'PK01';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 3
            if ($this->input->post("cf_GEP02") != 0 && $this->input->post("cf_GEP05") != 0 && $this->input->post("cf_GEP08") != 0) {
                $cfPush = min($this->input->post("cf_GEP02"), $this->input->post("cf_GEP05"), $this->input->post("cf_GEP08")) * 0.5;
                $kodePush = 'PK02';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 4
            if ($this->input->post("cf_GEP07") != 0 && $this->input->post("cf_GEP08") != 0 && $this->input->post("cf_GEP09") != 0) {
                $cfPush = min($this->input->post("cf_GEP07"), $this->input->post("cf_GEP08"), $this->input->post("cf_GEP09")) * 0.6;
                $kodePush = 'PK02';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 5
            if ($this->input->post("cf_GEP10") != 0 && $this->input->post("cf_GEP12") != 0 && $this->input->post("cf_GEP13") != 0) {
                $cfPush = min($this->input->post("cf_GEP10"), $this->input->post("cf_GEP12"), $this->input->post("cf_GEP13")) * 0.7;
                $kodePush = 'PK02';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 6
            if ($this->input->post("cf_GEP12") != 0 && $this->input->post("cf_GEP13") != 0 && $this->input->post("cf_GEP15") != 0) {
                $cfPush = min($this->input->post("cf_GEP12"), $this->input->post("cf_GEP13"), $this->input->post("cf_GEP15")) * 0.8;
                $kodePush = 'PK03';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 7
            if ($this->input->post("cf_GEP14") != 0 && $this->input->post("cf_GEP16") != 0 && $this->input->post("cf_GEP17") != 0) {
                echo 'rule 7';
                $cfPush = min($this->input->post("cf_GEP14"), $this->input->post("cf_GEP16"), $this->input->post("cf_GEP17")) * 0.75;
                $kodePush = 'PK03';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 8
            if ($this->input->post("cf_GEP15") != 0 && $this->input->post("cf_GEP18") != 0 && $this->input->post("cf_GEP19") != 0) {
                $cfPush = min($this->input->post("cf_GEP15"), $this->input->post("cf_GEP18"), $this->input->post("cf_GEP19")) * 0.8;
                $kodePush = 'PK03';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 9
            if ($this->input->post("cf_GEP02") != 0 && $this->input->post("cf_GEP05") != 0) {
                $cfPush = min($this->input->post("cf_GEP02"), $this->input->post("cf_GEP05")) * 0.65;
                $kodePush = 'PK02';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            //rule 10
            if ($this->input->post("cf_GEP11") != 0 && $this->input->post("cf_GEP16") != 0) {
                $cfPush = min($this->input->post("cf_GEP11"), $this->input->post("cf_GEP16")) * 0.7;
                $kodePush = 'PK03';
                array_push($kepastian, $cfPush);
                array_push($kode_penyakit, $kodePush);
            }

            if (count($kepastian) > 1) {
                $cfGabungan = $kepastian[0] + $kepastian[0] * (1 - $kepastian[0]);
                $cfPush = round($cfGabungan, 3);
                $kodePush = $kode_penyakit[0];
            } else {
                $cfPush = round($kepastian[0], 3);
                $kodePush = $kode_penyakit[0];
            }

            $diagnosisData = [
                'kode_konsultasi' => $kode,
                'user_id' => $data['user']['id'],
                'kode_penyakit' => $kodePush,
                'tingkat_kepercayaan' => $cfPush,
                'created_at' => $todayTime
            ];

            $this->db->insert('hasil_diagnosa', $diagnosisData);

            foreach ($data['gejala'] as $gejala) {
                if ($this->input->post('cf_' . $gejala["kode_gejala"]) != 0) {
                    $gejalaData = [
                        'kode_konsultasi' => $kode,
                        'kode_gejala' => $gejala["kode_gejala"],
                        'cf_value' => $this->input->post('cf_' . $gejala["kode_gejala"]),
                        'created_at' => $todayTime,
                    ];
                    $this->db->insert('temp_diagnosa', $gejalaData);
                }
            }

            redirect('diagnosis/result/' . $kode);
        }
    }

    public function result($kode)
    {

        $data['title'] = 'Hasil Diagnosa';
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('diagnosis/result', $data);
        $this->load->view('templates/footer', $data);
    }
}
