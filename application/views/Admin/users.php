<?php
include VIEWPATH.'admin/components/header.php';
include VIEWPATH.'admin/components/sidebar.php';  
?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card card-body d-flex flex-row justify-content-between align-items-center">
            <h3>Users</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Mobile No</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $srNo = 0; 
                                   foreach($users as $user){
                                    $srNo = $srNo + 1;
                                ?>
                                <tr class="category-row">
                                    <td><?= $srNo; ?></td>
                                    <td><?= $user->username?></td>
                                    <td><?=$user->b_name;?></td>
                                    <td><?=$user->mobile;?></td>
                                    <td><?=$user->address;?></td>
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


    <?php 
    include VIEWPATH .'admin/components/footer.php';
    ?>

    <script>

    </script>