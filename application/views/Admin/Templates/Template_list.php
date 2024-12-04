<?php
include VIEWPATH .'./admin/components/header.php';
include VIEWPATH .'./admin/components/sidebar.php';
?>


<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Template</h4>
                            
                            <a href="<?=base_url()?>add_canvas_template" class="btn btn-sm btn-primary">Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-none">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Banner</th>
                                                <th>Category</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach( $templates as $template ){?>
                                            <tr>
                                                <td><img src="<?=$template->template_thumbnail?>" style="height:100px;width:100px;"></td>
                                                <td><?= $template->template_name?></td>
                                                <td><?= $template->category?></td>
                                                <td class="text-right">
                                                    <a
                                                        href="" class="btn btn-sm btn-dark">Edit</a>
                                                    <a
                                                        href="<?= base_url()?>admin/delete-canvas-template/<?=$template->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                       <?php foreach($templates as $template) { ?>
                        <div class="col-md-3 mb-4">
                            <a href="<?= base_url()?>admin/view-canvas-template/<?=$template->id; ?>">
                                <img src="<?=$template->template_thumbnail?>" alt="" class="img-fluid">
                            </a>
                        </div>
                       <?php }?>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <?php include VIEWPATH .'./admin/components/footer.php';?>
    <script>
    let table = new DataTable('#template_table');
    </script>