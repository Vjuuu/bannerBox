


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" />
</head>

<body>
<?php 
   $login_error =  $this->session->flashdata('error');
?> 
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
      

        <div class="row w-100 mx-0">

          <div class="col-lg-4 mx-auto">
            <?php echo $login_error ? '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <i class="mdi mdi-alert"></i>
                 '.$login_error.'
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            
            : "";  ?>
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo base_url();?>assets/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <form class="pt-3" action="<?php echo base_url('index.php/admin/admin/do_login'); ?>" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" value="<?php echo set_value('email'); ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
                
              </form>
            </div>
<?php

$str = 'email1234';
echo base64_encode($str);

?>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>assets/js/template.js"></script>
  <script src="<?php echo base_url();?>assets/js/settings.js"></script>
  <script src="<?php echo base_url();?>assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>





  


    