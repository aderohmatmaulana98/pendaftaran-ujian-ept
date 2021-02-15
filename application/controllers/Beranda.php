<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->load->view('beranda/beranda_header');
		$this->load->view('beranda/index');
		$this->load->view('beranda/beranda_footer');
	}
}
