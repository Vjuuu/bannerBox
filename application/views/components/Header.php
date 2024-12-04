<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home page</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


    <!-- sweet alert cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <!-- last production version of the plugin, possible to replace with some earlier version (ex. 3.17.0) & if available will be requested -->
     <script src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-image-editor/latest/filerobot-image-editor.min.js"></script>

<body>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">Status247</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Add
                                    Business</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Privacy Police</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Offerc's</a>
                                    <a class="dropdown-item" href="#">Festival</a>
                                    <a class="dropdown-item" href="#">Birthday</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </header>

        <!-- add business details modale -->

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <form  id="formData">
                        <input type="text" name="user_id" id="user_id" value="<?=$user_data['id']?>" class="d-none">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Business Name</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lable>Business Name</label>
                                            <input type="text" name="b_name" class="form-control" id="b_name" value="<?=$user_data['b_name']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lable>Mobile No</label>
                                            <input type="text" name="mobile_no" class="form-control" id="mobile_no" value="<?=$user_data['mobile']?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <lable>Email Id</label>
                                            <input type="email" name="email" class="form-control" id="email" value="<?=$user_data['email']?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <lable>Address</label>
                                            <textarea name="address" id="address" cols="30" rows="3"
                                                class="form-control"><?=$user_data['address']?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        

        <script>
        // A $( document ).ready() block.
        $( document ).ready(function() {
            $('#formData').on('submit',function(e){
                e.preventDefault();
                var formdata = $('#formData').serialize();
                $.ajax({
                    url: "<?=base_url('add-business-data')?>",
                    type: "POST",
                    data: formdata,
                    dataType: 'json',
                    success: function(response) {
                      if(response.status == 200)
                      {
                        Swal.fire(
                        'Good job!',
                        'Your Business Details Is Updated',
                        'success'
                        )
                         $('#exampleModal').modal('hide');
                      }
                      else
                      {
                        alert('error');
                      }
                    }
                });
            })
        });

          
        </script>