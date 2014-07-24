<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Continuando_documento extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model', 'user');
        $this->load->model('Novo_documento_model', 'documentoModel');
        $this->load->model('Continuando_documento_model', 'Cont_doct');
        $this->user->logged();
    }
    
    public function index() {

        
        
    }

    public function continueDoc($idRow)
    {
         $data['estados'] = $this->documentoModel->load_estados(); 
         $data['cidades'] = $this->documentoModel->load_cidades();
    	 $data['ROW_id'] = $idRow;
    	 $data['documento'] = $this->Cont_doct->load_doct($idRow);


    	//Data de libraryes

        $this->load->helper('form');
        $this->load->helper('url');
        
        //Load templates
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_documento_view', $data);
        $this->load->view('templates/footer');


    }

    public function Endereco($idRow)
    {
        $data['id_Row'] = $idRow;
        $data['ROW_id'] = $idRow;

        $data['estados'] = $this->documentoModel->load_estados(); 
        $data['cidades'] = $this->documentoModel->load_cidades();

        $data['endereco'] = $this->Cont_doct->load_endereco($idRow);
        $data['documento'] = $this->Cont_doct->load_doct($idRow);

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_endereco_view', $data);
        $this->load->view('templates/footer');
    }

    public function Mercadorias($idRow)
    {   
        $data['row_haul'] = null; //variavel setada para null em caso de nova mercadoria
        $data['id_Row'] = $idRow;
        $data['documento'] = $this->Cont_doct->load_doct($idRow);

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_mercadorias_view', $data);
        $this->load->view('templates/footer');
    }

    public function Detidos($idRow)
    {
        $data['row_contact'] = null;
        $data['id_Row'] = $idRow;
        $data['estados'] = $this->documentoModel->load_estados(); 
        $data['cidades'] = $this->documentoModel->load_cidades();
        $data['documento'] = $this->Cont_doct->load_doct($idRow);
        $data['endereco'] = $this->Cont_doct->load_endereco($idRow);

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('cadastro/cadastrar_Detidos_view', $data);
        $this->load->view('templates/footer');
    }

    public function Veiculos($idRow)
    {   
        $data['row_Auto'] = null; //Dado settado em null pois essa função é para cadastrar novo carro
        $data['id_Row'] = $idRow;
        $data['documento'] = $this->Cont_doct->load_doct($idRow);
        $data['estados'] = $this->documentoModel->load_estados(); 
        $data['cidades'] = $this->documentoModel->load_cidades();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_automoveis_view', $data);
        $this->load->view('templates/footer');
    }

    public function Depositos($idRow)
    {
        $data['row_local'] = null;
        $data['id_Row'] = $idRow;
        $data['endereco'] = $this->Cont_doct->load_endereco($idRow);
        $data['documento'] = $this->Cont_doct->load_doct($idRow);


        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_locais_view', $data);
        $this->load->view('templates/footer');
    }

    public function NotasAnexos($idRow)
    {
        $data['row_anexo'] = null;
        $data['id_Row'] = $idRow;
        $data['documento'] = $this->Cont_doct->load_doct($idRow);
       // $data['anexos'] = $this->Cont_doct->load_anexos($idRow);

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('cadastro/dados_nota_anexos_view', $data);
        $this->load->view('templates/footer');
    }



}