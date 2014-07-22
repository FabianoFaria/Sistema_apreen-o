<?php
class Continuando_documento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* Carregar dados */

    public function load_doct($idRow)
    {

    	$queryDoct = $this->db->get_where('tbl_doct', array('ROW_ID' => $idRow));
    	return $queryDoct->result();
    }

    function load_estados()
    {
        $query = $this->db->get('tbl_estados');
        return $query->result();
    }

    public function load_endereco($idRow)
    {

        $queryDoct = $this->db->get_where('tbl_addr', array('ROW_ID' => $idRow));
        return $queryDoct->result();
    }


}