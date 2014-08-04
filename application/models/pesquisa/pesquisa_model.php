<?php
class Pesquisa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* Carregar dados */
    function load_docs_ajx($value) /* carrega os documentos para o formulario de buscas avancadas*/
    {	

    	$this->db->select('*');
    	$this->db->like('IPL', $value);
        $query = $this->db->get('tbl_doct');
        return $query->result();
    }

 }

?>