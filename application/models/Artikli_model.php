<?php

class Artikli_model extends CI_Model {

    public $username;
    public $email;
    public $ime;
    public $prezime;
    public $rola;
    public $password;


    

    public function add($naziv, $cijena, $korisnik_id)
    {
        $sql = "INSERT INTO artikli (naziv, cijena, korisnik_id, dodano) VALUES (".$this->db->escape($naziv).", ".$this->db->escape($cijena).", ".$this->db->escape($korisnik_id).", ".$this->db->escape(date('Y-m-d H:i:s')).")";
        $this->db->query($sql);
    }   

    public function get_all() {
        $query = $this->db->get("artikli");
        return $query->result();
    }

    public function get_artikal($id) {
        $this->db->select('artikli.id, artikli.naziv, artikli.dodano, artikli.cijena, korisnici.username');
        $this->db->from('artikli');
        $this->db->join('korisnici', 'artikli.korisnik_id = korisnici.id');
        $this->db->where('artikli.id', $id);
        $query = $this->db->get();
        return $query->result();
    }   

    public function update_artikal($id, $naziv, $cijena) {
        $data = array(
            'naziv' => $naziv,
            'cijena' => $cijena
        );
        $this->db->where('id', $id);
        $this->db->update('artikli', $data);
    }

    public function delete_artikal($id) {
        $this->db->delete('artikli', array('id' => $id));
    }

}