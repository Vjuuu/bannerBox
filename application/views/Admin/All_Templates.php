
<?php

$this->load->view('admin/components/header');
$this->load->view('admin/components/sidebar');  
?>


<div class="main-panel">
    <div class="content-wrapper">
    
       <div class="row">
            <?php
                $templates = array_reverse($templates);
               foreach($templates as $items)
               {
                echo '<div class="col-md-3 mb-4">
                          <a href="'.base_url().'admin/view-template/'.$items->id.'" >
                         <img src="'.base_url().'assets/templates/'.$items->template_img.'" class="img-fluid " >
                         </a>
                      </div> 
                    ';
               }
            ?>
       </div>
       
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <?php 
    
    $this->load->view('admin/components/footer');
    
    ?>