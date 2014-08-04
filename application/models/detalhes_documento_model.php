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
        $this->db->select('tbl_addr.ID_addr, tbl_addr.ROW_ID, tbl_addr.address, tbl_addr.nunber, tbl_addr.complement, tbl_addr.district, tbl_addr.city, tbl_addr.state, tbl_addr.zipcode, tbl_addr.country, tbl_estados.nome, tbl_cidades.nome as cidade_nome');
        $this->db->join('tbl_estados', 'tbl_estados.id = tbl_addr.state');
        $this->db->join('tbl_cidades', 'tbl_addr.city = tbl_cidades.id' );
        $this->db->where('ROW_ID', $idRow); 
    	$endereco =	$this->db->get('tbl_addr');

    	return $endereco->result();
    }

    public function load_Auto($idRow)
    {   
        $this->db->select('tbl_vehicle.ID_vehicle, tbl_vehicle.ROW_ID, tbl_vehicle.category, tbl_vehicle.model, tbl_vehicle.brand, tbl_vehicle.chassi, tbl_vehicle.renavan, tbl_vehicle.placa, tbl_estados.nome as nome_estado, tbl_cidades.nome as cidade_nome');
        $this->db->join('tbl_estados', 'tbl_estados.id = tbl_vehicle.state');
        $this->db->join('tbl_cidades', 'tbl_vehicle.city = tbl_cidades.id' );
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