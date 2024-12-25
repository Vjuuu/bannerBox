<?php 
class Category_model extends CI_Model 
{
    
    public function get_categories($id = null)
    {
          if($id)
          {
            $query = $this->db->from('tbl_category')->where('id',$id)->get();
          }
          else
          {
            $query = $this->db->from('tbl_category')->where('status',1)->get();
          }
          return $query->result();
    }

    public function  get_parent_category() 
    {
        $query = $this->db->form('tbl_category')->where('parent_id IS NOT NULL')->get();
        return $query->result();
    }
    public function add_category($data)
    {
        return $this->db->insert('tbl_category',$data);
    }
    public function update_category($data,$id)
    {
         $this->db->where('id',$id);
         $query = $this->db->update('tbl_category',$data);
         return $query;
    }
    public function delete_category($id)
    {
       $this->db->where('id',$id);
       $data['status'] = 0;
       $query = $this->db->update('tbl_category',$data);
       return $query;
    }
    
   
}
?>


