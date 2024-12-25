<?php
include VIEWPATH.'admin/components/header.php';
include VIEWPATH.'admin/components/sidebar.php';  
?>


<div class="main-panel">
    <div class="content-wrapper">

        <div class="card card-body d-flex flex-row justify-content-between align-items-center">
            <h3>Category</h3>
            <button class="btn btn-primary btn-add-category">Add Category</button>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Category Name</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $category){?>
                                <tr class="category-row">
                                    <td><?= $category->id?></td>
                                    <td><?= $category->category_name?></td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-sm btn-dark btn-edit"
                                            data-id="<?= $category->id ?>">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger btn-delete"
                                            data-id="<?= $category->id; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->


    <!-- category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="category_form" id="category_form">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input class="form-control" name="name" id="name" require>
                        </div>
                        <div class="form-group">
                            <label for="">Parent Category <small>(optional)</small></label>
                            <select name="parent_category" id="parent_category" class="form-control">
                                <option value="Null">Select Parent category</option>
                                <?php foreach($categories as $category ) { ?>
                                <option value="<?= $category->id?>"><?= $category->category_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- category Modal :close -->

    <?php 
    include VIEWPATH .'admin/components/footer.php';
    ?>

    <script>
    $(document).ready(function() {
        $('#category_form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            console.log(formData)
            // Send AJAX request
            $.ajax({
                type: 'POST', // HTTP method
                url: '<?=base_url()?>admin/add-category', // URL to send the form data to
                data: formData, // Form data to be sent
                success: function(response) {
                    let res = JSON.parse(response)
                    if (res.status == 'success') {
                        swal(res.message, "", "success");
                        $('#categoryModal').modal('hide')
                    } else {
                        swal(res.message)
                        $('#categoryModal').modal('hide')
                    }
                    console.log("Form submitted successfully!", response);
                },
                error: function(xhr, status, error) {

                    console.error("An error occurred:", error);
                }

            })
        })

        $('.btn-edit').on('click', function(e) {
            e.preventDefault();
            const modalTitle = "Edit Category";
            const category_id = $(this).data('id')
            console.log(category_id);
            $.ajax({
                type: 'GET',
                url: '<?=base_url()?>get-category/' + category_id,
                success: function(response) {
                    let res = JSON.parse(response);
                    console.log(res);
                    let id = res.data[0].id;
                    let category_name = res.data[0].category_name;
                    let parent_id = res.data[0].parent_id;
                    $('#id').val(id);
                    $('#name').val(category_name);
                    $('#parent_category').val(parent_id);
                    $("#modalTitle").text(modalTitle);
                    $('#categoryModal').modal('show');
                },
                error: function() {
                    console.log(error);
                }

            })
        })

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var catId = $(this).data('id');
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
                            type: 'POST',
                            url: '<?= base_url("admin/delete-category") ?>',
                            data: {
                                id: catId,
                            },
                            success: function(response) {
                                var result = JSON.parse(response);
                                if (result.status === 'success') {
                                    swal(
                                        'Deleted!',
                                        'The category has been deleted.',
                                        'success'
                                    );
                                    // Optionally remove the category from the DOM
                                    $(this).closest('.category-row').remove();
                                } else {
                                    swal(
                                        'Error!',
                                        result.message,
                                        'error'
                                    );
                                }
                            },
                            error: function() {
                                swal(
                                    'Error!',
                                    'Something went wrong. Please try again later.',
                                    'error'
                                );
                            }
                        });
                    } else {
                        swal("Your template is safe!");
                    }
                });

        })

        $('.btn-add-category').on('click', function() {
            const modalTitle = "Add category";
            $('#id').val('');
            $('#name').val('');
            $('#parent_category').val('');
            $("#modalTitle").text(modalTitle);
            $('#categoryModal').modal('show');
        })


        // edit category  
        $('#edit_category_form').on('click', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            console.log(formData);
        })
    })
    </script>