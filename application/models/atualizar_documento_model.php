<?php
class Atualizar_documento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* Carregar dados */

    public function doct_count()
    {
        return $this->db->count_all("tbl_doct");
    }

    public function fetch_docs($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_doct");

        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function load_todos_Ipls()
    {
        $lastDoct = $this->db->get('tbl_doct');
        return $lastDoct->result();
    }

    public function load_ultimos_Ipls()
    {

    	//$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $this->db->limit(10);
    	$lastDoct = $this->db->get('tbl_doct');
    	return $lastDoct->result();
    }

    function load_estados()
    {
        $query = $this->db->get('tbl_estados');
        return $query->result();
    }

    /* Atualizar dados */

    public function atualiza_doct($data)
    {
       // echo $data['ROW_ID'];

        $doct= array(
            'qualification' => $data['qualification'] ,
            'security_unit' => $data['security_unit'] ,
            'arrest_date' =>    $data['arrest_date'] ,
            'link_arrest' =>    $data['link_arrest'] , 
            'summary' =>        $data['summary'] , 
            'operation' => $data['operation'] , 
            'arrest_destination' => $data['arrest_destination'] 
            );

        $this->db->where('ROW_ID', $data['ROW_ID']);
        $this->db->update('tbl_doct', $data);
        
        return true;
    }

    public function atualiza_addr($data)
    {
       // echo $data['ROW_ID'];

        $id_adr = $data['Adr_ID'];

        $doct= array(
            'address' => $data['address'] ,
            'nunber' => $data['nunber'] ,
            'complement' =>    $data['complement'] ,
            'district' =>    $data['district'] , 
            'city' => $data['city'] , 
            'state' => $data['state'] ,
            'zipcode' => $data['zipcode'],
            'country' =>        $data['country']
            );

        $this->db->where('ID_addr', $id_adr);
        $this->db->update('tbl_addr', $doct);
        
        return true;
    }

}

       