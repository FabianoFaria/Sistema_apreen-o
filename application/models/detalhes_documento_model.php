<?php
class Detalhes_documento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* Carregar dados */
    public function load_Ipls($row_id)
    {
    	$lastDoct = $this->db->get_where('tbl_doct', array('ROW_ID' => $row_id));
    	return $lastDoct->result();
    }

    public function load_Addr($idRow)
    {
    	$endereco =	$this->db->get_where('tbl_addr', array('ROW_ID' => $idRow));
    	return $endereco->result();
    }

    public function load_Auto($idRow)
    {
    	$automoveis = $this->db->get_where('tbl_vehicle', array('ROW_ID' => $idRow));
    	return $automoveis->result();
    }

    public function load_Mercadoria($idRow)
    {

    	$mercadorias = $this->db->get_where('tbl_haul', array('ROW_ID' => $idRow));
    	return $mercadorias->result();
    }

    public function load_Contato($idRow)
    {
    	$envolvidos = $this->db->get_where('tbl_contact', array('ROW_ID' => $idRow));
    	return $envolvidos->result();
    }

    public function load_Armazem($idRow)
    {
		$locais = $this->db->get_where('tbl_wrs', array('ROW_ID' => $idRow));
    	return $locais->result();
    }
    public function load_anexos($idRow)
    {
        $anexos = $this->db->get_where('tbl_anexos', array('id_row' => $idRow));
        return $anexos->result();
    }

}