<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Atualizar_documento extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Atualizar_documento_model', 'atualizar');
        $this->load->model('User_model', 'user');
        $this->user->logged();
    }
    
    public function index() {

        $data['last_docs'] = $this->atualizar->load_ultimos_Ipls();

        $this->load->view('templates/header');
        $this->load->view('login/atualizar_documento_view',$data);
        $this->load->view('templates/footer');
        
    }

    public function view($row_id)
    {
        echo $row_id;
        redirect('detalhes_documento/getTheRow/'.$row_id.'');
    }

    //Funções para atualizar os dados das tabelas...

    public function atualizaDoc()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');

         $validations = array(

        /* Validade dados da apreensão */

        array(
            'field' => 'qualificacao',
            'label' => 'qualificacao'
        ),
        array(
            'field' => 'unidade_seguranca',
            'label' => 'unidade_seguranca'
        ),
        array(
            'field' => 'dataOps',
            'label' => 'dataOps',
            'rules' => 'required'
        ),
        array(
            'field' => 'linkOps',
            'label' => 'linkOps',
            'rules' => 'required|min_length[5]'
        ),
        array(
            'field' => 'resumoOps',
            'label' => 'resumoOps',
            'rules' => 'required|min_length[3]'
        ),
        array(
            'field' => 'nomeOps',
            'label' => 'nomeOps',
            'rules' => 'required|min_length[3]|max_length[45]'
        ),
        array(
            'field' => 'destinoCarga',
            'label' => 'destinoCarga'
        )
    );

        $this->form_validation->set_rules($validations);
    if ($this->form_validation->run() == FALSE) {
       
        echo $row_id = $this->input->post('Row_id');
        redirect( base_url("/continuar_documento/continueDoc/".$row_id.""));
    } else {

        $dataEx = explode("/", $this->input->post('dataOps'));
        $month = $dataEx[0];
        $day = $dataEx[1];
        $year = $dataEx[2];
        $finalDate = $year."-".$month."-".$day;

        $data['ROW_ID'] = $this->input->post('Row_id');
        $data['IPL'] = $this->input->post('IPLValue');
        $data['qualification'] = $this->input->post('qualificacao');
        $data['security_unit'] = $this->input->post('unidade_seguranca');
        $data['arrest_date'] = $finalDate;
        $data['link_arrest'] = $this->input->post('linkOps');
        $data['summary'] = $this->input->post('resumoOps');
        $data['operation'] = $this->input->post('nomeOps');
        $data['arrest_destination'] = $this->input->post('destinoCarga');
    
        $update = null;

        $update = $this->atualizar->atualiza_doct($data);

        if($update == true)
        {
            redirect('/detalhes_documento/getTheRow/'.$this->input->post('Row_id').'');
        }

    }


    }

    public function atualizaAddr()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');

         $validations = array(

                array(
                'field' => 'pais_apr',
                'label' => 'pais_apr',
                'rules' => 'required|min_length[3]|max_length[45]'
                ),
                array(
                'field' => 'estado_apr',
                'label' => 'estado_apr'
            
                ),
                array(
                'field' => 'cidade_apr',
                'label' => 'cidade_apr'

                ),
            array(
                'field' => 'endereco',
                'label' => 'endereco',
                'rules' => 'trim|required'
                ),
            array(
                'field' => 'numero_addr',
                'label' => 'numero_addr'
                ),
            array(
                'field' => 'complemento',
                'label' => 'complemento'
                ),
            array(
                'field' => 'bairro',
                'label' => 'bairro'
                ),
            array(
                'field' => 'CEP',
                'label' => 'CEP'
                )

            );

        $this->form_validation->set_rules($validations);

        if ($this->form_validation->run() == FALSE) {
       
        echo $row_id = $this->input->post('Row_id');
        redirect( base_url("/continuar_documento/continueDoc/".$row_id.""));
        } else { 
       //  $row->ROW_ID;
         $dataAdr['Adr_ID'] = $this->input->post('Addr_id');          
         $dataAdr['ROW_ID'] = $this->input->post('Row_id');
         $dataAdr['address'] = $this->input->post('endereco');
         $dataAdr['nunber'] = $this->input->post('numero_addr');
         $dataAdr['complement'] = $this->input->post('complemento');
         $dataAdr['district'] = $this->input->post('bairro');
         $dataAdr['country'] = $this->input->post('pais_apr');
         $dataAdr['city'] = $this->input->post('cidade_apr');
         $dataAdr['state'] = $this->input->post('estado_apr');
         $dataAdr['zipcode'] = $this->input->post('CEP');

        $Row_adr = false;
        $Row_adr = $this->atualizar->atualiza_addr($dataAdr);

        if($Row_adr != false)
        {
            redirect('/detalhes_documento/getTheRow/'.$this->input->post('Row_id').'');
        }

       }
    }


    public function Atualizar_veiculo()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');

         $validations = array(

                array(
                'field' => 'cat_veiculo',
                'label' => 'cat_veiculo',
                ),
                array(
                'field' => 'mod_veiculo',
                'label' => 'mod_veiculo'
            
                ),
                array(
                'field' => 'mark_veiculo',
                'label' => 'mark_veiculo'

                ),
            array(
                'field' => 'chassi',
                'label' => 'chassi',
                'rules' => 'trim|required'
                ),
            array(
                'field' => 'renavan',
                'label' => 'renavan'
                ),
            array(
                'field' => 'placa_n',
                'label' => 'placa_n'
                ),
            array(
                'field' => 'estado',
                'label' => 'estado'
                ),
            array(
                'field' => 'cidade',
                'label' => 'cidade'
                )

            );

        $this->form_validation->set_rules($validations);

        if ($this->form_validation->run() == FALSE) {
       
        echo $row_id = $this->input->post('row_id');
        redirect( base_url("/continuar_documento/Veiculos/".$row_id.""));
        } else { 
       //  $row->ROW_ID;
         $dataAuto['ID_auto'] = $this->input->post('');
         $dataAuto['ROW_ID'] = $this->input->post('row_id');  
         $dataAuto['category'] = $this->input->post('cat_veiculo');          
         $dataAuto['model'] = $this->input->post('mod_veiculo');
         $dataAuto['brand'] = $this->input->post('mark_veiculo');
         $dataAuto['chassi'] = $this->input->post('chassi');
         $dataAuto['renavan'] = $this->input->post('renavan');
         $dataAuto['placa'] = $this->input->post('placa_n');
         $dataAuto['city'] = $this->input->post('cidade');
         $dataAuto['state'] = $this->input->post('estado');

        $Row_auto = null;
        $Row_auto = $this->documentoModel->cadastrar_veiculo($dataAuto);

        if($Row_auto != false)
        {
            redirect('/detalhes_documento/getTheRow/'.$this->input->post('row_id').'');
        }

       }
    }

}