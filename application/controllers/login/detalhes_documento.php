<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detalhes_documento extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model', 'user');
        $this->load->model('Novo_documento_model', 'documentoModel');
        $this->load->model('Detalhes_documento_model', 'DetalhesModel');
        $this->user->logged();
    }
    
    public function index($idRow) {

        $data['Ultimo_documento'] = $this->DetalhesModel->load_Ipls($idRow);
        $data['endereco'] =  $this->DetalhesModel->load_Addr($idRow);
        $data['automoveis'] =  $this->DetalhesModel->load_Auto($idRow);
        $data['mercadorias'] =  $this->DetalhesModel->load_Mercadoria($idRow);
        $data['envolvidos'] =  $this->DetalhesModel->load_Contato($idRow);
        $data['locais'] =  $this->DetalhesModel->load_Armazem($idRow);
        $data['anexos'] = $this->DetalhesModel->load_anexos($idRow);

        //Data de libraryes

        $this->load->helper('form');
        
        //Load templates
        $this->load->view('templates/header');
        $this->load->view('login/detalhes_documento_view', $data);
        $this->load->view('templates/footer');
        
    }

    public function getTheRow($row_id)
    {
        $this->index($row_id);
    }

}