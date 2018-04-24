<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Korisnik extends CI_Controller {

	private $user, $error;
	
	public function index()
	{

		if($this->session->userdata('logged_in')) {
			$artikli = $this->artikli->get_all();
			$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
			$this->load->view('home', ['artikli' => $artikli]);
			$this->load->view('template/footer');
		} else {
			redirect('/login');
		}
    }
	

    public function authenticate()
    {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[22]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[22]');
		$this->user = $this->korisnici->authentication($this->input->post('username'));
		if ($this->form_validation->run() == FALSE)
		{
			$this->login();
		}
		if (!empty($this->user) && password_verify($this->input->post('password'), $this->user->password))
		{
			$this->session->set_userdata(array('logged_in' => true, 'user' => $this->user));
			redirect('/');
			
		} else {
			$this->error = "Netocan username ili passsword!";
			$this->login();
		}
		
	}

	public function add_user()
	{
		
		if($this->session->userdata('logged_in') && $this->session->userdata('user')->rola === 'admin') {
		$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
		$this->load->view('add_user');
		$this->load->view('template/footer');
		} elseif ($this->session->userdata('user')->rola === 'korisnik') {
			show_error('Ne mozete dodavati nove korisnike bez administratorskih prava!!', 403, $heading = "Ups došlo je do pogreške");
		} else {
			redirect('/login');
		}
	}

	public function create_user()
	{
		if($this->session->userdata('logged_in') && $this->session->userdata('user')->rola === 'admin') {
		$this->korisnici->add($this->input->post('username'), $this->input->post('ime'), $this->input->post('prezime'), $this->input->post('email'), $this->input->post('password'));
		redirect('/korisnik/all');
		} elseif ($this->session->userdata('user')->rola === 'korisnik') {
			return "You need to logged in to see this page";
		} else {
			redirect('/login');
		}
		
	}
	public function get_korisnik($id) {
		if($this->session->userdata('logged_in') && $this->session->userdata('user')->rola === 'admin') {
			$korisnik = $this->korisnici->get_korisnik($id);
			$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
			$this->load->view('korisnik', ['korisnik' => $korisnik[0]]);
			$this->load->view('template/footer');
		} else {
			show_error('Ne mozete pregledavati korisnikove podatke bez administratorskih prava!!', 403, $heading = "Ups došlo je do pogreške");
		}
		
	}
	public function get_korisnici() {
		if($this->session->userdata('logged_in') && $this->session->userdata('user')->rola === "admin") {
		$korisnici = $this->korisnici->get_korisnike();
		$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
		$this->load->view('korisnici', ['korisnici' => $korisnici]);
		$this->load->view('template/footer');
		} else {
			show_error('Ne mozete pregledavati korisnikove podatke bez administratorskih prava!!', 403, $heading = "Ups došlo je do pogreške");
		}
	}
	public function edit_korisnik($id) {
		if($this->session->userdata('logged_in') && $this->session->userdata('user')->rola === "admin") {
		$korisnik = $this->korisnici->get_korisnik($id);
		$this->load->view('template/header', ['user' => $this->session->userdata('user')]);
		$this->load->view('edit_korisnik', ['korisnik' => $korisnik[0]]);
		$this->load->view('template/footer');
		} elseif (!empty($this->session->userdata('logged_in')) && $this->session->userdata('user')->rola === "korisnik") {
			show_error('Nije moguce promjeniti korisnikove podatke bez administratorskih prava!!', 403, $heading = "Ups došlo je do pogreške");
		} else {
			show_error('Niste logirani u aplikaciji', 403, $heading = "Ups došlo je do pogreške");
		}
	}

	public function delete_korisnik($id) {
		$korisnik = $this->korisnici->get_korisnik($id);
		if(!empty($korisnik) && $korisnik[0]->rola === "admin") {
			show_error('Nije moguce izbrisati administratora', 403, $heading = "Ups došlo je do pogreške");
		}

		if($this->session->userdata('logged_in') && $this->session->userdata('user')->rola === "admin") {
			$this->korisnici->delete($id);
			redirect('/korisnik/all');
		} else {
			show_error('Nije moguce promjeniti korisnikove podatke bez administratorskih prava!!', 403, $heading = "Ups došlo je do pogreške");
		}
		
	}
	
	public function update_korisnik($id) {
		if($this->session->userdata('logged_in') && $this->session->userdata('user')->rola === "admin") {
			$this->korisnici->update($id, $this->input->post('ime'),$this->input->post('prezime'), $this->input->post('username'), $this->input->post('email'), $this->input->post('password'));
			redirect('/korisnik/all');
		} else {
			show_error('Nije moguce promjeniti korisnikove podatke bez administratorskih prava!!', 403, $heading = "Ups došlo je do pogreške");
		}
		
	}

	public function login()
	{
		
		if($this->session->userdata('logged_in')) {
			redirect('/');
		} else {
			$this->load->view('template/header');
        	$this->load->view('login', ['error' => $this->error]);
			$this->load->view('template/footer');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('/login');
	}
}
