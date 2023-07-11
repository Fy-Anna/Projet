<?php
     defined('BASEPATH') OR exit('No direct script access allowed');
     class Index extends CI_Model
     {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function save_inscription($data)
        {
            $this->db->insert('inscription' , $data);
            return $this->db->insert_id();
        }
        public function save_login($data)
        {
            $this->db->insert('Login' , $data);
            return $this->db->insert_id();
        }
        public function save_profil($data)
        {
            $this->db->insert('Profil' , $data);
            return $this->db->insert_id();
        }
        public function get_regime($taille, $poids, $genre)
        {
            $this->db->select('*');
            $this->db->from('regime');
            $this->db->join('Profil', 'Profil.Taille = Regime.Taille');
            $this->db->join('Profil', 'Profil.Poids <= Regime.Poids_min AND Profil.Poids >= Regime.Poids_max');
            $this->db->where('regime.genre', $genre);
            $this->db->where('table1.taille', $taille);
            $this->db->where('table2.genre', $genre);

            $query = $this->db->get();
            return $query->result();
        }
}
?>
