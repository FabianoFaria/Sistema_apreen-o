<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Atualizar_documento extends CI_Controller {
    
    function __construct() {
        parent::__construct();
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
}