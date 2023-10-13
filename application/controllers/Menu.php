<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'New menu added!');
            redirect('menu');
        }
    }

    public function updateData()
    {
        $this->form_validation->set_rules('updatemenu', 'updatemenu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/index');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $updatemenu = $this->input->post('updatemenu');

            $this->db->where('id', $id);
            $this->db->update('user_menu', ['menu' => $updatemenu]);
            $this->session->set_flashdata('message', 'Menu has been edited!');
            redirect('menu');
        }
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', 'Menu has been deleted!');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'menu_id', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => 1
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'New Sub menu added!');
            redirect('menu/submenu');
        }
    }

    public function updateSub()
    {
        $this->form_validation->set_rules('updatetitle', 'updatetitle', 'required');
        $this->form_validation->set_rules('updatemenu_id', 'updatemenu_id', 'required');
        $this->form_validation->set_rules('updateurl', 'updateURL', 'required');
        $this->form_validation->set_rules('updateicon', 'updateicon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('menu/submenu');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'title' => $this->input->post('updatetitle'),
                'menu_id' => $this->input->post('updatemenu_id'),
                'url' => $this->input->post('updateurl'),
                'icon' => $this->input->post('updateicon')
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'Sub menu has been edited!');
            redirect('menu/submenu');
        }
    }
    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', 'Submenu has been deleted!');
        redirect('menu/submenu');
    }
}
