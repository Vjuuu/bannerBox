<?php 

class Canvas_template_model extends CI_Model
{
    
    public function add_template($data)
    {
       $query =  $this->db->insert('canvas_templates',$data);
       return $query;
    }

    public function get_template($id = false)
    {
        if($id)
        {
            $this->db->where('id',$id);
            $query = $this->db->get('canvas_templates');
        }
        else
        {
            $this->db->select('id , template_name , template_thumbnail');
            $query = $this->db->get('canvas_templates');
        }
        
        return $query->result();
    }
    public function update_template($id,$data)
    {
        
        // Ensure $id and $data are provided
        if (empty($id) || empty($data)) {
            return false; // Return false if data is missing
        }
    
        // Apply condition and update data
        $this->db->where('id', $id);
        $result = $this->db->update('canvas_templates', $data);
    
        // Return the status of the update query
        return $result;
        

    }

    public function delete_template($id)
    {
          if(empty($id))
          {
            return false;
          }
          else
          {
            $this->db->where('id',$id);
            $query = $this->db->delete('canvas_templates');
            return $query;
          }
    }

    
}

?>