<?php

$this->load->view('admin/components/header');
$this->load->view('admin/components/sidebar');  
?>


<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>All templates</h4>
                        <a href="<?=base_url()?>/admin/add-template" class="btn btn-sm btn-primary">Add New</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-body">
         <div class="row">
            <?php
                $templates = array_reverse($templates);
               foreach($templates as $items)
               {
                echo '<div class="col-md-3 col-sm-6 col-lg-2 mb-4">
                          <a href="'.base_url().'admin/view-template/'.$items->id.'" >
                           <img src="'.base_url().'assets/templates/thumbs/'.$items->template_thumbnail.'" class="img-thumbnail " >
                         </a>
                      </div> 
                    ';
               }
            ?>
        </div>
         </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <?php 
    
    $this->load->view('Admin/Components/Footer');
    
    ?>