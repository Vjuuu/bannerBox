<?php

$this->load->view('admin/components/header');
$this->load->view('admin/components/sidebar');


?>


<div class="main-panel">
    <div class="content-wrapper">
        <form id="editTemplateForm" enctype="multipart/form-data">
            <div class="mb-4 d-flex justify-content-between">
                <div>
                    <button class="btn btn-outline-light" onclick="history.back()" type="button">Back</button>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                    <input type="hidden" name="id" value="<?= $result->id ?>">
                                    <input type="hidden" name="existing_image" value="<?= $result->template_url ?>">

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="<?= $result->template_name ?>" />
                                        <span class="text-danger" id="error_title"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">-- Select Category --</option>
                                            <?php foreach($categories as $category) { ?>
                                            <option value="<?= $category->id ?>"
                                                <?= $category->id == $result->category ? 'selected' : '' ?>>
                                                <?= $category->category_name; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger" id="error_category"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="template_img">Browse Template</label>
                                        <input type="file" class="form-control" name="template_img" id="template_img"
                                            onchange="loadFile(event)">
                                        <span class="text-danger" id="error_image"></span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img src="<?= base_url().'assets/templates/'.$result->template_url; ?>" alt=""
                                class="img-fluid img-thumbnail" id="output">
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <?php 
    
    $this->load->view('admin/components/footer');
    
    ?>

    <script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src); // free memory
    }
};

// AJAX submit
$('#editTemplateForm').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: '<?= base_url("index.php/admin/template/edit_template"); ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response){
            if(response.status == 'error'){
                $('#error_title').text(response.errors.title ?? '');
                $('#error_category').text(response.errors.category ?? '');
                $('#error_image').text(response.errors.template_img ?? '');
            } else if(response.status == 'success'){
                alert(response.message);
                window.location.href = response.redirect;
            }
        }
    });
});
</script>