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

    //Comandos para carregar dados de apenas um unico registro

    public function load_single_auto($id_auto)
    {
        $auto = $this->db->get_where('tbl_vehicle', array('ID_vehicle' => $id_auto));
        return $auto->result();
    }

    public function load_single_Haul($id_haul)
    {
        $haul = $this->db->get_where('tbl_haul', array('ID_HAUL' => $id_haul));
        return $haul->result();
    }

    public function load_single_contato($id_Contato)
    {
        $haul = $this->db->get_where('tbl_contact', array('ID_contact' => $id_Contato));
        return $haul->result();
    }

    public function load_single_wrs($id_wrs)
    {
        $wrs = $this->db->get_where('tbl_wrs', array('ID_wrs' => $id_wrs));
        return $wrs->result();
    }

    public function load_single_anexo($id_anexo)
    {
        $wrs = $this->db->get_where('tbl_anexos', array('ID_anexos' => $id_anexo));
        return $wrs->result();
    }

}