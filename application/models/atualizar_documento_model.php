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

    public function atualiza_auto($data)
    {
       // echo $data['ROW_ID'];

        $id_auto = $data['ID_vehicle'];

        $auto= array(
            'category' => $data['category'],
            'model' => $data['model'],
            'brand' => $data['brand'],
            'chassi' => $data['chassi'],
            'renavan' => $data['renavan'],
            'placa' => $data['placa'],
            'city' => $data['city'],
            'state' => $data['state']           

            );

        $this->db->where('ID_vehicle', $id_auto);
        $this->db->update('tbl_vehicle', $auto);
        
        return true;
    }

    public function atualiza_merc($data)
    {
       // echo $data['ROW_ID'];

        $id_haul = $data['ID_HAUL'];

        $merc= array(
            'product' => $data['product'],
            'unit' => $data['unit'],
            'qty' => $data['qty'],
            'brand' => $data['brand'],
            'tabacalera' => $data['tabacalera']        

            );

        $this->db->where('ID_HAUL', $id_haul);
        $this->db->update('tbl_haul', $merc);
        
        return true;
    }


    public function atualiza_contact($data)
    {
       // echo $data['ROW_ID'];

        $id_contact = $data['ID_contact'];

        $contact= array(
            'name' => $data['name'],
            'CPF' => $data['CPF'],
            'rg' => $data['rg'],
            'passport' => $data['passport'],
            'father' => $data['father'],
            'mother' => $data['mother'],
            'birth_dt' => $data['birth_dt'],
            'birth_city' => $data['birth_city'],
            'birth_state' => $data['birth_state'],
            'birth_country' => $data['birth_country']        

            );

        $this->db->where('ID_contact', $id_contact);
        $this->db->update('tbl_contact', $contact);
        
        return true;
    }


    public function atualiza_wrs($data)
    {
       // echo $data['ROW_ID'];

        $id_wrs = $data['ID_wrs'];

        $contact= array(
            'product' => $data['product'],
            'unit' => $data['unit'],
            'qty' => $data['qty'],
            'tabacalera' => $data['tabacalera']
            );

        $this->db->where('ID_wrs', $id_wrs);
        $this->db->update('tbl_wrs', $contact);
        
        return true;
    }

   
     public function atualiza_anexo($data)
    {
       // echo $data['ROW_ID'];

        $id_anx = $data['ID_anexos'];

        $anexos = array(
            'nome_arquivo' => $data['nome_arquivo'],
            'location' => $data['location']
            );

        $this->db->where('ID_anexos', $id_anx);
        $this->db->update('tbl_anexos', $anexos);
        
        return true;
    }

   
}

       