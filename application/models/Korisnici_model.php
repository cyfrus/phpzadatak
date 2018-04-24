<?php

class Korisnici_model extends CI_Model {



    public function authentication($username)
    {
        $query = $this->db->get_where('korisnici', array('username' => $username), 1);
        if(!empty($query->result()))
        return $query->result()[0];
    }

    public function add($username, $ime, $prezime, $email, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO korisnici (username, ime, prezime, email, rola, password) VALUES (".$this->db->escape($username).", ".$this->db->escape($ime).", ".$this->db->escape($prezime).", ".$this->db->escape($email).", 'korisnik', ".$this->db->escape($password_hash).")";
        $this->db->query($sql);
    }

    public function get_korisnike() {
        $query = $this->db->get("korisnici");
        return $query->result();
    }

    public function get_korisnik($id) {
        $this->db->where('id', $id); 
        $query = $this->db->get('korisnici');
        return $query->result();
    }
    
    public function update($id, $ime, $prezime, $username, $email, $password) {
        $korisnik = array(
            'ime' => $ime,
            'prezime' => $prezime,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );
    $this->db->where('id', $id);
    $this->db->update('korisnici', $korisnik); 
    }

    public function delete($id) {
        $this->db->delete('korisnici', array('id' => $id));  
    }

}