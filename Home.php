<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Index');
        }
        
        public function inscription()
        {
            $id = $this->input->post('id');
            $nom = $this->input->post('nom');
            $email = $this->input->post('email');
            $password = $this->input->post('mdp');
            $confirmation = $this->input->post('confirmation');

            $data = array(
                'Utilisateur_id' => $id,
                'Nom' => $nom,
                'Email' => $email,
                'Mot_de_passe' => $password,
                'Confirmation' => $confirmation
            );
            $this->load->helper('url');
            $this->Index->save_inscription($data);
            $this->load->view('template/Inscription' , $data);
        }


        public function login()
        {
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $data = array(
                'User_id' => $id,
                'Email' => $email,
                'Mot_de_passe' => $password
            );
            $this->Index->save_login($data);
            $this->load->view('template/Inscription' , $data);
        }

        public function profil()
        {
            $id = $this->input->post('id');
            $genre = $this->input->post('genre');
            $taille = $this->input->post('taille');
            $poid = $this->input->post('poids');

            $data = array(
                'Profil_id' => $id,
                'Genre' => $genre,
                'Taille' => $taille,
                'Poids' => $poid,
            );
            $this->Index->save_profil($data);
            $this->load->view('template/ProfilUtilisateur' , $data);
        }    
    }
?>