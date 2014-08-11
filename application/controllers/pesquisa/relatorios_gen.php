<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Relatorios_gen extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->user->logged();

       // $this->load->library('PHPJasperXML/class/PHPJasperXML');
       // $this->PHPJasperXML->xml_dismantle($xml);
       // $this->PHPJasperXML->outpage("I");  
    }
    
    public function index() {

        $this->load->view('templates/header');
        $this->load->view('pesquisa/pesquisar_documento_view');
        $this->load->view('templates/footer');
        
    }

    public function gera_relatorio()
    {

        echo "index carregada";

       

        $this->load->helper('mpdf');
 
        $html = "<html>";
        $html .= "<head></head>";
        $html .= "<body>Meu arquivo de teste</body>";
        $html .= "</html>";
 
        // Opcional: Também é possivel carregar uma view inteira...
        //$html = $this->load->view('uma_view_qualquer', null, true);
 
        pdf($html);

    }
}