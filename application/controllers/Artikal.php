<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikal extends CI_Controller {

    public function add_artikal()
	{
		if($this->session->userdata('logged_in')) {
			$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
        	$this->load->view('add_artikal');
			$this->load->view('template/footer');
		} else {
			redirect('/login');
		}
		
	}

	public function create_artikal()
	{
		if($this->session->userdata('logged_in')) {
			$this->artikli->add($this->input->post('naziv'), $this->input->post('cijena'), $this->session->userdata('user')->id);
			redirect("/");
		} else {
			show_error();
		}
		
	}

	public function get_artikal($id) {
		if($this->session->userdata('logged_in')) {
		$artikal = $this->artikli->get_artikal($id);
		$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
        $this->load->view('artikal', ['artikal' => $artikal[0]]);
		$this->load->view('template/footer');
		} else {
			redirect('/login');
		}
	}

	public function edit_artikal($id) {
		if($this->session->userdata('logged_in')) {
			$artikal = $this->artikli->get_artikal($id);
			$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
			$this->load->view('edit_artikal', ['artikal' => $artikal[0]]);
			$this->load->view('template/footer');
		} else {
			show_error("Logirajte se u aplikaciju" ,403, $heading = 'Ups došlo je do pogreške!');
		}
		
	}

	public function update_artikal($id) {
		if($this->session->userdata('logged_in')) {
		$this->artikli->update_artikal($id, $this->input->post('naziv'), $this->input->post('cijena'));
		redirect('/artikal/'.$id);
		} else {
			show_error("Logirajte se u aplikaciju" ,403, $heading = 'Ups došlo je do pogreške!');
		}
	}
	public function delete_artikal($id) {
		if($this->session->userdata('logged_in')) {
		$this->artikli->delete_artikal($id);
		redirect('/');
		} else {
			show_error('Niste logirani u aplikaciji', 403, $heading = "Ups došlo je do pogreške");
		}
	}

}