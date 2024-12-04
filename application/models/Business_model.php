<?php 


class Business_model extends CI_Model 
{
	
    public function add_business($data)
    {
        return $this->db->insert('business_data',$data);
    }
    public function UpdateBusinessData($id,$data)
    {
        $this->db->where('id',$id);
        $query = $this->db->update('tbl_user',$data);
        return $query;

    }
	
}


?>


