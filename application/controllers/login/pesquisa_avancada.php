<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesquisa_avancada extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->model('User_model', 'user');
        $this->load->model('Novo_documento_model', 'documentoModel');
        $this->load->model('Atualizar_documento_model', 'atualizarDoct');
        $this->user->logged();
    }


} //Fim do controller