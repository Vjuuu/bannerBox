<?php
include VIEWPATH .'./Admin/Components/Header.php';
include VIEWPATH .'./Admin/Components/Sidebar.php';
?>

<style>
.banner-view {
    border: 1px solid #adadad;
    box-shadow: 0px 0px 5px #0000004f !important;
    display: block;
    position: relative;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Template</h4>
                        <a href="<?=base_url()?>admin/add_canvas_template" class="btn btn-sm btn-primary">Add New</a>
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
                                                <td><img src="<?=$template->template_thumbnail?>"
                                                        style="height:100px;width:100px;"></td>
                                                <td><?= $template->template_name?></td>
                                                <td><?= $template->category?></td>
                                                <td class="text-right">
                                                    <a href="" class="btn btn-sm btn-dark">Edit</a>
                                                    <a href="<?= base_url()?>admin/delete-canvas-template/<?=$template->id; ?>"
                                                        class="btn btn-sm btn-danger">Delete</a>
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
                            <div class="col-md-3 col-xl-2 mb-4 banner-cell">

                                <div class="card border position-relative">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light position-absolute rounded-circle p-0 "
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"
                                            style="margin-top:10px;right:10px;height:30px !important;width:30px !important;box-shadow:0px 0px 5px black !important">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="<?= base_url()?>admin/view-canvas-template/<?=$template->id; ?>">View</a>
                                            <a class="dropdown-item"
                                                href="<?= base_url()?>admin/view-canvas-template/<?=$template->id; ?>">Edit</a>
                                            <a class="dropdown-item text-danger btn-delete" href=""
                                                data-id="<?=$template->id; ?>">Delete</a>
                                        </div>
                                    </div>
                                    <img src="<?=$template->template_thumbnail?>" alt="" class="img-fluid">
                                </div>
                                <!-- <a href="" class="banner-view"> -->
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

    <?php include VIEWPATH .'./Admin/Components/Footer.php';?>
    <script>
    $(document).ready(function() {
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var templateId = $(this).data('id');
            var templateCard = $(this).closest('.banner-cell')

            swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "<?=base_url()?>admin/delete-template/" + templateId,
                            type: "POST",
                            success: function(data) {
                                swal("Deleted!", "The template has been deleted.",
                                    "success");
                                    templateCard.remove();
                            },
                            error: function() {
                                swal("Error!",
                                    "An error occurred while deleting the template.",
                                    "error");
                            }
                        });
                    } else {
                        swal("Your template is safe!");
                    }
                });




        })
    })
    </script>