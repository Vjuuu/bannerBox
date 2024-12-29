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

            public function category_group($category_id = null)
        {
            $this->db->select('tbl_category.id as category_id, tbl_category.category_name, canvas_templates.id as template_id, canvas_templates.template_thumbnail');
            $this->db->from('canvas_templates');
            $this->db->join('tbl_category', 'tbl_category.id = canvas_templates.category', 'right'); // Inner Join

            if (!is_null($category_id)) {
                $this->db->where('tbl_category.id', $category_id);
            }

            $this->db->order_by('tbl_category.order_index', 'DESC'); // Default sorting by category ID

            $query = $this->db->get();
           
            if ($query) {
              $result = $query->result_array();
              
              // Group templates by category
              $grouped_data = [];
              foreach ($result as $row) {
                if (!empty($row['template_id'])) { // Ignore rows without a template
                  $category_name = $row['category_name'];
                  $category_id = $row['category_id'];
  
                  if (!isset($grouped_data[$category_name])) {
                      $grouped_data[$category_name] = [
                        'category_id' => $category_id, // Include category ID
                        'templates' => []
                    ];
                      
                  }
  
                  $grouped_data[$category_name]['templates'][] = [
                    'template_id' => $row['template_id'],
                    'template_thumbnail' => $row['template_thumbnail']
                ];
              }
              }
      
              return $grouped_data;
          }
      
          return [];
        }

            
          
        }
?>