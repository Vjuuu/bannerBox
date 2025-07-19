<?php
include VIEWPATH .'./Admin/Components/Header.php';
include VIEWPATH .'./Admin/Components/Sidebar.php';
?>


<div class="main-panel">
    <div class="content-wrapper">

        <div class="row justify-content-center">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Add Template</h4>
                                <p class="card-description">
                                    Basic form layout
                                </p>
                                <form id="addTemplateForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Template Title">
                                        <span class="text-danger" id="error_title"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">-- Select Category --</option>
                                            <?php foreach($categories as $category) { ?>
                                            <option value="<?= $category->id ?>"><?= $category->category_name; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger" id="error_category"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="template_img">Browse Template</label>
                                        <input type="file" name="template_img" id="template_img"
                                            class="form-control-file">
                                        <span class="text-danger" id="error_image"></span>
                                        <img id="preview" style="max-width:200px;margin-top:10px;" />
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img src="" alt="" id="output" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->


    <?php include VIEWPATH .'./Admin/Components/Footer.php';?>
    <script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src); // free memory
        }
    };

    $('#template_img').on('change', function(e) {
        loadFile(e);
    });

    $('#addTemplateForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: '<?= base_url("index.php/admin/template/do_add_template"); ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 'error') {
                    // Show validation errors
                    $('#error_title').text(response.errors.title ?? '');
                    $('#error_category').text(response.errors.category ?? '');
                    $('#error_image').text(response.errors.template_img ?? '');
                } else if (response.status == 'success') {
                    alert('Poster added success.')
                    $('#addTemplateForm')[0].reset();
                    $('#output').attr('src', '');
                }
            }
        });
    });
    </script>