<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->cname = 'dashboard';
        $this->title = 'Dashboard';
        $this->load->model('M_dashboard', 'mdb');
        $this->user    = $this->session->userdata('user_login');
        $this->load->library('datatables');
    }

    public function index()
    {	

        $this->templates->display('dashboard/index', @$data);
    }


}


/* mikaeil */
