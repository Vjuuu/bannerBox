
<?php

$this->load->view('admin/components/header');
$this->load->view('admin/components/sidebar');


?>


<div class="main-panel">
    <div class="content-wrapper">
    <?= form_open_multipart(base_url('index.php/admin/template/edit_template')); ?>
    <div class="mb-4 d-flex justify-content-between">
        <div>
            <button class="btn btn-outline-light" onclick="history.back()" type="button">Back</button>
        </div>
       <div>
        <a href="<?php echo base_url().'index.php/admin/delete-template/'.$result->id; ?>" class="btn btn-danger">Delete</a>
       <button class="btn btn-primary" type="submit">
            Save Changes 
        </button>
       </div>
    </div>
    <div class="card">
        <div class="card-body">
        
            <div class="row">
                <div class="col-md-6">
                    <img src="<?=base_url().'assets/templates/'.$result->template_img; ?>" alt="" class="img-fluid" id="output">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <div class="form-group d-none">
                            <label for="title">Template ID</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="template Title" value="<?php echo $result->id ?>" />
                            <input type="hidden" value="<?=$result->template_img;?>" name="existing_image" >
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="template Title" value="<?php echo $result->title ?>" />
                            <?php echo form_error('title')? '<span class="text-danger">'.form_error('title').'</span>': ""; ?>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" >
                                <?php  $cat= $result->category; ?>
                                <option <?php if($cat == "Offerc's") { echo "selected='selected'" ;}?> >Offerc's</option>
                                <option <?php if($cat == "Festival") { echo "selected='selected'" ;}?> >Festival</option>
                                <option <?php if($cat == "Birthday Wish") { echo "selected='selected'" ;}?>>Birthday Wish</option>

                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="template_img">Browse Template</label>
                            <input type="file" class="form-control" name="template_img" id="template_img" placeholder="template_img"  onchange="loadFile(event)">
                            <?php if(isset($error)){ echo '<span class="text-danger">'.$error.'</span>'; } ?>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
        </form> 
    </div>
       
<script>
     var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <?php 
    
    $this->load->view('admin/components/footer');
    
    ?>