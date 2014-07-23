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

    public function atualizar_auto($row_id, $row_Auto)
    {

        $data['row_Auto'] = $row_Auto;
        $data['id_Row'] = $row_id;
        $data['automoveis'] =  $this->DetalhesModel->load_single_auto($row_Auto);

        //load templates
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_automoveis_view', $data);
        $this->load->view('templates/footer');
    }

    public function atualizar_mercadoria($row_id, $row_Haul)
    {

        $data['row_haul'] = $row_Haul;
        $data['id_Row'] = $row_id;
        $data['mercadoria'] =  $this->DetalhesModel->load_single_Haul($row_Haul);

        //load templates
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_mercadorias_view', $data);
        $this->load->view('templates/footer');
    }

    public function atualizar_contato($row_id, $row_contact)
    {

        $data['row_contact'] = $row_contact;
        $data['id_Row'] = $row_id;
        $data['contato'] =  $this->DetalhesModel->load_single_contato($row_contact);

        //load templates
        $this->load->view('templates/header');
        $this->load->view('cadastro/cadastrar_Detidos_view', $data);
        $this->load->view('templates/footer');
    }



}