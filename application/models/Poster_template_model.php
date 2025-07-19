<?php 

class Poster_template_model extends CI_Model
{
    
    // ✅ Get ALL templates
    public function get_all_templates() {
        $this->db->select('id, template_name, category, template_url, template_thumbnail');
        $this->db->from('poster_template');
        $this->db->order_by('id', 'DESC'); // latest first (optional)
        $query = $this->db->get();
        return $query->result(); // returns array of objects
    }

    // ✅ Get template by ID
    public function get_template_by_id($id) {
        $this->db->select('id, template_name, category, template_url, template_thumbnail');
        $this->db->from('poster_template');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row(); // single object
    }

    // ✅ Optional: Get templates by category
    public function get_templates_by_category($category) {
        $this->db->select('id, template_name, category, template_url, template_thumbnail');
        $this->db->from('poster_template');
        $this->db->where('category', $category);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }
    
}

?>