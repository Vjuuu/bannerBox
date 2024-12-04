<?php
include VIEWPATH .'./admin/components/header.php';
include VIEWPATH .'./admin/components/sidebar.php';
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
                                <?= form_open_multipart(base_url('index.php/admin/template/do_add_template')); ?>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="template Title" value="<?php echo set_value('title'); ?>" />
                                    <?php echo form_error('title')? '<span class="text-danger">'.form_error('title').'</span>': ""; ?>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <option>Offerc's</option>
                                        <option>Festival</option>
                                        <option>Birthday Wish</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="template_img">Browse Template</label>
                                    <input type="file" class="form-control" name="template_img" id="template_img"
                                        placeholder="template_img" onchange="loadFile(event)">
                                    <?php if(isset($error)){ echo '<span class="text-danger">'.$error.'</span>'; } ?>

                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
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

    <script>
     var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<?php include VIEWPATH .'./admin/components/footer.php';?>