<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        // INI ADALAH FUNCTION DEFAULT UNTUK MENAMPILKAN DASHBOARD


        $data['title'] = 'Dashboard';

        $this->load->view('public/dashboard_header');
        $this->load->view('public/dashboard');
        $this->load->view('public/dashboard_footer');
    }
}
