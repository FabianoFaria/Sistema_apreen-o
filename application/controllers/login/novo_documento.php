<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Novo_documento extends CI_Controller {
    
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
    
    public function index() {

        $data['estados'] = $this->documentoModel->load_estados(); 
        $data['cidades'] = $this->documentoModel->load_cidades();
        $data['IPL'] = $this->geraIPL();  

        //Data de libraryes

        $this->load->helper('form');
        
        //Load templates
        $this->load->view('templates/header');
        $this->load->view('login/novo_documento_view', $data);
        $this->load->view('templates/footer');
        
    }

    public function geraIPL()
    {
        $dateNow = date("Y");
        $dayNow = date("d");
        $hourNow = date("H");
        $minNow = date("i");

        $randomN = rand(0, 999);

        $stringDate = $randomN."".$minNow."/".$dateNow;

        return $stringDate;
    }

    public function echou()
    {
        echo "nanana";
    }

    public function cadastrarProtocolo() {
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<span>', '</span>');
    $validations = array(

        /* Validade dados da apreensão */

        array(
            'field' => 'Ipl_manual',
            'label' => 'Ipl_manual'
        ),
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
        ),

        /* valida endereço da ocorrencia... */

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
        $this->index();
    } else {

        $dataEx = explode("/", $this->input->post('dataOps'));
        $month = $dataEx[0];
        $day = $dataEx[1];
        $year = $dataEx[2];
        $finalDate = $year."-".$month."-".$day;

        $data['IPL'] = $this->input->post('Ipl_manual');
        $data['qualification'] = $this->input->post('qualificacao');
        $data['security_unit'] = $this->input->post('unidade_seguranca');
        $data['arrest_date'] = $finalDate;
        $data['link_arrest'] = $this->input->post('linkOps');
        $data['summary'] = $this->input->post('resumoOps');
        $data['operation'] = $this->input->post('nomeOps');
        $data['arrest_destination'] = $this->input->post('destinoCarga');
    
        $Row_id = null;

        $Row_id = $this->documentoModel->cadastrar_doc($data);

        if ($Row_id != null) {
          
            //Salvar o registro do documento na tabela main

            $Novo_main = null;

            $rowOBJ = $Row_id[0]; //Objeto para recuperar o id do documento

            //var_dump($rowOBJ);

          // die();

            //Salvar o documento na tabela MAIN

            $row_main['ROW_ID'] = $rowOBJ->ROW_ID; 
            $row_main['parent_TBL'] = 'tbl_doct';
            $row_main['parent_id'] = $rowOBJ->ROW_ID;
            $row_main['CHILD_ID'] = null;
            $row_main['CHILD_TBL'] = null;

           $Novo_main = $this->documentoModel->cadastrar_main($row_main); 

                   
                    $dataAdr['ROW_ID'] =  $rowOBJ->ROW_ID;
                    $dataAdr['address'] = $this->input->post('endereco');
                    $dataAdr['nunber'] = $this->input->post('numero_addr');
                    $dataAdr['complement'] = $this->input->post('complemento');
                    $dataAdr['district'] = $this->input->post('bairro');
                    $dataAdr['country'] = $this->input->post('pais_apr');
                    $dataAdr['city'] = $this->input->post('cidade_apr');
                    $dataAdr['state'] = $this->input->post('estado_apr');
                    $dataAdr['zipcode'] = $this->input->post('CEP');

                    $Row_adr = null;
                    $Row_adr = $this->documentoModel->cadastrar_endereco($dataAdr);

                    $AdrOBJ = $Row_adr[0]; //Objeto para recuperar o id do endereço...

                    //var_dump($Row_adr);

                   // die();

                    if($Row_adr != null)
                    {
                            $param = $rowOBJ->ROW_ID; //Salvar o endereço na tabela main

                            $Novo_main = null;

                            $row_main['ROW_ID'] = $rowOBJ->ROW_ID;
                            $row_main['parent_TBL'] = 'tbl_doct';
                            $row_main['parent_id'] = $rowOBJ->ROW_ID;
                            $row_main['CHILD_ID'] = $AdrOBJ->ID_addr;
                            $row_main['CHILD_TBL'] = 'tbl_addr';

                            $Novo_main = $this->documentoModel->cadastrar_main($row_main);

                            redirect('detalhes_documento/index/'.$param.'');
                    }

        } else {
            log_message('error', 'Erro no cadastro...');
        }
    }
    }


     public function cadatrar_veiculo()
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
         $dataAuto['ID_vehicle'] = $this->input->post('id_auto');
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
        if($this->input->post('id_auto') != null)
        {   
            $Row_auto = $this->atualizarDoct->atualiza_auto($dataAuto);
        } else
        {
            $Row_auto = $this->documentoModel->cadastrar_veiculo($dataAuto);

            $rowOBJ = $Row_auto[0];

            $param = $rowOBJ->ID_vehicle; //Salvar o endereço na tabela main

                            $Novo_main = null;

                            $row_main['ROW_ID'] = $this->input->post('row_id');
                            $row_main['parent_TBL'] = 'tbl_doct';
                            $row_main['parent_id'] = $this->input->post('row_id');
                            $row_main['CHILD_ID'] = $param;
                            $row_main['CHILD_TBL'] = 'tbl_vehicle';

                            $Novo_main = $this->documentoModel->cadastrar_main($row_main);
        }


        if($Row_auto != false)
        {
            redirect('/detalhes_documento/getTheRow/'.$this->input->post('row_id').'');
        }

       }
    }

     public function cadastrar_mercadoria()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');


         $validations = array(

                array(
                'field' => 'produto',
                'label' => 'produto'
                ),
                array(
                'field' => 'medida',
                'label' => 'medida'
                ),
                array(
                'field' => 'quantidade',
                'label' => 'quantidade',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'marca',
                'label' => 'marca',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'tabacalera',
                'label' => 'tabacalera'
                )

            );

          $this->form_validation->set_rules($validations);

          if ($this->form_validation->run() == FALSE) {
       
            echo $row_id = $this->input->post('row_id');
            redirect( base_url("/index.php/continuar_documento/Mercadorias/".$row_id.""));
            } else { 
           //  $row->ROW_ID;
             $dataMercadoria['ID_HAUL'] = $this->input->post('id_haul');
             $dataMercadoria['ROW_ID'] = $this->input->post('row_id');  
             $dataMercadoria['product'] = $this->input->post('produto');          
             $dataMercadoria['unit'] = $this->input->post('medida');
             $dataMercadoria['qty'] = $this->input->post('quantidade');
             $dataMercadoria['brand'] = $this->input->post('marca');
             $dataMercadoria['tabacalera'] = $this->input->post('tabacalera');

            $Row_haul = 0;

            if($this->input->post('id_haul') != null)
            {   
                 $Row_haul = $this->atualizarDoct->atualiza_merc($dataMercadoria);
            } 
                else
            {
                $Row_haul = $this->documentoModel->cadastrar_mercadoria($dataMercadoria);

                $rowOBJ = $Row_haul[0];

                $param = $rowOBJ->ID_HAUL; //Salvar o endereço na tabela main

                            $Novo_main = null;

                            $row_main['ROW_ID'] = $this->input->post('row_id');
                            $row_main['parent_TBL'] = 'tbl_doct';
                            $row_main['parent_id'] = $this->input->post('row_id');
                            $row_main['CHILD_ID'] = $param;
                            $row_main['CHILD_TBL'] = 'tbl_haul';

                            $Novo_main = $this->documentoModel->cadastrar_main($row_main);

            }
            if($Row_haul != 0)
                {
                    redirect('/detalhes_documento/getTheRow/'.$this->input->post('row_id').'');
                }
        }

    }

     public function cadastrar_envolvido()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        $validations = array(

                array(
                'field' => 'nomeD',
                'label' => 'nomeD',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'CPF',
                'label' => 'CPF',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'rg',
                'label' => 'rg',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'passaporte',
                'label' => 'passaporte'
                ),
                array(
                'field' => 'nome_pai',
                'label' => 'nome_pai'

                ),
                array(
                'field' => 'nome_mae',
                'label' => 'nome_mae'
                ),
                 array(
                'field' => 'nascimento',
                'label' => 'nascimento',
                'rules' => 'trim|required'
                ),
                  array(
                'field' => 'estado_nascimento',
                'label' => 'estado_nascimento',
                'rules' => 'trim|required'
                ),
                   array(
                'field' => 'pais_nascimento',
                'label' => 'pais_nascimento',
                'rules' => 'trim|required'
                )
            );

          $this->form_validation->set_rules($validations);

          if ($this->form_validation->run() == FALSE) {
       
            echo $row_id = $this->input->post('row_id');
            redirect( base_url("/index.php/continuar_documento/Detidos/".$row_id.""));
            } else { 
           //  $row->ROW_ID;
            $dataEx = explode("/", $this->input->post('nascimento'));
            $month = $dataEx[0];
            $day = $dataEx[1];
            $year = $dataEx[2];
            $finalDate = $year."-".$month."-".$day;


             $dataEnvolvido['ID_contact'] = $this->input->post('contact_id');
             $dataEnvolvido['ROW_ID'] = $this->input->post('row_id');  
             $dataEnvolvido['name'] = $this->input->post('nomeD');          
             $dataEnvolvido['CPF'] = $this->input->post('CPF');
             $dataEnvolvido['rg'] = $this->input->post('rg');
             $dataEnvolvido['passport'] = $this->input->post('passaporte');
             $dataEnvolvido['father'] = $this->input->post('nome_pai');
             $dataEnvolvido['mother'] = $this->input->post('nome_mae');
             $dataEnvolvido['birth_dt'] = $finalDate;
             $dataEnvolvido['birth_city'] = $this->input->post('cidade_nascimento');
             $dataEnvolvido['birth_state'] = $this->input->post('estado_nascimento');
             $dataEnvolvido['birth_country'] = $this->input->post('pais_nascimento');

            $Row_Deti = 0;
             if($this->input->post('contact_id') != null)
            {   
                $Row_Deti = $this->atualizarDoct->atualiza_contact($dataEnvolvido);
            } 
                else
            {
                $Row_Deti = $this->documentoModel->cadastrar_envolvido($dataEnvolvido);

                $rowOBJ = $Row_Deti[0];

                $param = $rowOBJ->ID_contact; //Salvar o detido na tabela main

                            $Novo_main = null;

                            $row_main['ROW_ID'] = $this->input->post('row_id');
                            $row_main['parent_TBL'] = 'tbl_doct';
                            $row_main['parent_id'] = $this->input->post('row_id');
                            $row_main['CHILD_ID'] = $param;
                            $row_main['CHILD_TBL'] = 'tbl_contact';

                            $Novo_main = $this->documentoModel->cadastrar_main($row_main);

            }
              if($Row_Deti != 0)
                {
                    redirect('/detalhes_documento/getTheRow/'.$this->input->post('row_id').'');
                }

           }
    }   //Fim da funcao


     public function cadastrar_deposito()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        $validations = array(

                array(
                'field' => 'produto',
                'label' => 'produto',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'medida',
                'label' => 'medida',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'quantidade',
                'label' => 'quantidade',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'tabacalera',
                'label' => 'tabacalera',
                'rules' => 'trim|required'
                )
            );

        $this->form_validation->set_rules($validations);

          if ($this->form_validation->run() == FALSE) {
       
            echo $row_id = $this->input->post('row_id');
            redirect( base_url("/index.php/continuar_documento/Depositos/".$row_id.""));
            } else { 
                $dataDeposito['ID_wrs'] = $this->input->post('id_local');
                $dataDeposito['ROW_ID'] = $this->input->post('row_id');  
                $dataDeposito['product'] = $this->input->post('produto');          
                $dataDeposito['unit'] = $this->input->post('medida');
                $dataDeposito['qty'] = $this->input->post('quantidade');          
                $dataDeposito['tabacalera'] = $this->input->post('tabacalera');

            $Row_Depo = 0;

             if($this->input->post('id_local') != null)
            {   
                $Row_Depo = $this->atualizarDoct->atualiza_wrs($dataDeposito);
            } 
                else
            {
                $Row_Depo = $this->documentoModel->cadastrar_depodito($dataDeposito);

                $rowOBJ = $Row_Depo[0];

                $param = $rowOBJ->ID_wrs; //Salvar o wrs na tabela main

                            $Novo_main = null;

                            $row_main['ROW_ID'] = $this->input->post('row_id');
                            $row_main['parent_TBL'] = 'tbl_doct';
                            $row_main['parent_id'] = $this->input->post('row_id');
                            $row_main['CHILD_ID'] = $param;
                            $row_main['CHILD_TBL'] = 'tbl_wrs';

                            $Novo_main = $this->documentoModel->cadastrar_main($row_main);


            }

              if($Row_Depo != 0)
                {
                    redirect('/detalhes_documento/getTheRow/'.$this->input->post('row_id').'');
                }
            }

    } //Fim da funcao

    public function cadastrar_anexo_arquivo()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        
        $validations = array(

                array(
                'field' => 'file_name',
                'label' => 'file_name',
                'rules' => 'trim|required'
                )
            );

        $row_id = $this->input->post('row_id');

         $this->form_validation->set_rules($validations);

          if ($this->form_validation->run() == FALSE) {
       
            echo $row_id = $this->input->post('row_id');
            redirect( base_url("/index.php/continuar_documento/NotasAnexos/".$row_id.""));
            } 
            else 
            {

                  $file_to_upload = $this->input->post('file_send');

               // 'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/files/",
               //           'upload_url'      => base_url()."files/",

                $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads";
                $config['upload_url'] = base_url()."/uploads";
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size'] = '100000';
                $config['encrypt_name'] = true;

                $this->upload->initialize($config);

                $this->load->library('upload', $this->config);
                if($this->upload->do_upload('file_send'))
                {
                    echo "file upload success";

                    $data_upload = $this->upload->data();

                    $dataAnexo['ID_anexos'] = $this->input->post('ID_anexo');
                    $dataAnexo['id_row'] = $this->input->post('row_id');  
                    $dataAnexo['nome_arquivo'] = $this->input->post('file_name');          
                    $dataAnexo['location'] = $data_upload['file_name'];


                    $Row_File = 0;
                     if($this->input->post('ID_anexo') != null)
                    {   
                        $Row_File = $this->atualizarDoct->atualiza_anexo($dataAnexo);
                    } 
                    else
                    {
                        $Row_File = $this->documentoModel->cadastrar_anexos($dataAnexo);

                        $rowOBJ = $Row_File[0];

                        $param = $rowOBJ->ID_anexos; //Salvar o wrs na tabela main

                            $Novo_main = null;

                            $row_main['ROW_ID'] = $this->input->post('row_id');
                            $row_main['parent_TBL'] = 'tbl_doct';
                            $row_main['parent_id'] = $this->input->post('row_id');
                            $row_main['CHILD_ID'] = $param;
                            $row_main['CHILD_TBL'] = 'tbl_anexos';

                            $Novo_main = $this->documentoModel->cadastrar_main($row_main);

                        
                    }

                    if($Row_File != 0)
                    {
                        redirect('/detalhes_documento/getTheRow/'.$this->input->post('row_id').'');
                    }


                }
                else
                {
                    echo "file upload failed";

                    redirect( base_url("/index.php/continuar_documento/NotasAnexos/".$row_id.""));

                     echo display_errors();
                }

            }

    }// Fim da funcão...

    public function chamaCidade($id)
    {

        $type = $this->input->post('type');

        $list_cidades = $this->documentoModel->load_cidades_ajx($id); 

        $dataCidades = array();


        foreach ($list_cidades as $cidades) {
            $dataCidades = $cidades;

            echo "<option value='".$cidades->id."'>".$cidades->nome."</option>";
        }
        
        return $dataCidades;       

    }
}