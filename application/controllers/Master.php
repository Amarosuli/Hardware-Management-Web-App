<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function index()
    {
        // menampilkan list menu master

        $data['title'] = 'Master System';
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('templates/footer');
    }

    public function master_data()
    {
        // menampilkan list data
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();

        $data['mp'] = $this->db->query('SELECT * FROM master_part')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/masterdata', $data);
        $this->load->view('templates/footer');
    }

    public function master_kit()
    {
        // menampilkan list data
        $data['title'] = 'Master Kit';
        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();

        $data['st'] = $this->db->list_tables();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/masterkit', $data);
        $this->load->view('templates/footer');
    }
}
