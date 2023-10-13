<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Sistem Pakar Panleukopenia Kucing';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('landing/index', $data);
        $this->load->view('templates/footer');
    }
    public function artikel()
    {
        $data['title'] = 'Artikel - SP Panleukopenia Kucing';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('landing/artikel', $data);
        $this->load->view('templates/footer');
    }
}
