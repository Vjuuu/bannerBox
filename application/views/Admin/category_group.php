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
                            <div class="col-md-12">
                                <h4 class="card-title"></h4>
                                <p class="card-description">
                                    Basic form layout
                                </p>
                                <!-- check is template available or not  -->
                                <?php foreach ($grouped_data as $category_name => $templates): ?>
                                <h3><?php echo $category_name; ?></h3>
                                <div class="row">
                                    <?php foreach ($templates as $template): ?>
                                    <div class="col-md-2 mb-4">
                                        <img src="<?=$template['template_thumbnail']?>" alt="" class="img-fluid">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endforeach; ?>
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