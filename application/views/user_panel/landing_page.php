<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="<?=base_url().'assets/css/style.css'?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- bootstrap icon CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="wrapper">
        <!-- navbar:open  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?=base_url().'assets/images/logo/app-logo.png'?>" alt="" class="app-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto  ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Content Us</a>
                        </li>

                    </ul>
                    <div class="d-flex ms-auto">

                        <button class="btn btn-outline-primary px-4" type="submit" data-bs-toggle="modal"
                            data-bs-target="#signupModal">Get Started</button>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navbar:close  -->

        <!-- page :open  -->
        <div class="page-container landing-page ">
            
            <div class="header-section container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <div>
                            <span class="sub-title">Instantly Share Your Story,</span>
                            <h2 class="title">One Click, One Poster</h2>
                            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam error
                                nostrum quas voluptatum ab quis non dignissimos eaque eligendi. Alias eligendi numquam
                                quidem at dolorum sapiente velit soluta laboriosam? Obcaecati!</p>
                                <button class="btn btn-outline-primary px-4" type="submit" data-bs-toggle="modal" data-bs-target="#signupModal">Get Started</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="gallary-image-container">
                            <img src="<?=base_url().'assets/images/project_img/gallary.png';?>" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page :close  -->


    </div>


    <!-- sign-up-modal :open -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0 bg-dark">
                    <div class="close-btn position-relative">
                        <button type="button" class="cs-close-btn position-absolute top-0 start-100 translate-middle " data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-circle-fill"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="modal-image-container bg-white" >
                                <img src="<?=base_url().'assets/images/project_img/gallary.png'?>" alt="" class="modal-image">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center ">
                            <button class="btn btn-light" id="btn_signup">
                                <i class="bi bi-google me-2"></i>Signup With Google A/c
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sign-up-modal :close -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
   var signupModal = new bootstrap.Modal(document.getElementById('signupModal'))

   var appLoader = () =>
   { 
    signupModal.hide()
    $('.page-container').append(`<div class="app-loader "> <img src="<?=base_url().'assets/images/project_img/app-loader.gif';?>" alt=""></div>`);
     setTimeout(() => {
        window.location.href="<?=base_url().'dashboard'?>";
        
     }, 5000);


                        
   }


   $('#btn_signup').on('click',function()
   {
     appLoader();
   })
</script>
</body>

</html>