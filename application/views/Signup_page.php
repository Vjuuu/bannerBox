<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- bootstrap 5 cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    .wrapper {
        height: 100vh;
        width: 100%;
    }

    .logo {
        height: 40px;
        width: auto;
    }

    .page-container {
        height: calc(100% - 70px);
        width: 100%;
    }
    </style>
</head>

<body>


    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid px-2 px-md-5">
                <a class="navbar-brand" href="<?=base_url()?>"><img
                        src="http://localhost/poster-app/assets/images/logo.svg" alt="" class="logo"></a>
            </div>
        </nav>

        <div class="page-container d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 ">
                        <img src="<?=base_url().'assets/images/project_img/login-bg.png'?>" alt="" class="img-fluid"
                            style="height:400px">
                    </div>
                    <div class="col-md-5">
                        <div class="box">
                            <h1>Welcome :)</h1>
                            <p>Unlock a World of Possibilities - Join Us Today! 🚀</p>

                            <form id="registrationForm">

                                <div class="form-floating mb-3">
                                    <input type="name" class="form-control " id="name" name="name" placeholder="Name"
                                        autocomplete="off">
                                    <label for="name">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control " id="email" name="email"
                                        placeholder="name@example.com" autocomplete="off">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" autocomplete="off">
                                    <label for="password">Password</label>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-md px-4" id="btn_signUp">
                                        Sign Up
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div id="response">

         </div>
        <div class="position-absolute top-0 end-0 p-3" style="z-index: 11">
            <div id="toastContainer"></div>
        </div>

    </div>





    <!-- boostrap 5 js cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

       

        // Example usage:
        showToast('info Massage...!', 100000);// Display the toast for 5 seconds
    })
    </script>

    <script>
    $(document).ready(function() {
        var name = $('#name');
        var email = $('#email');
        var password = $('#password');
        $('#registrationForm').on('submit', function(e) {
            e.preventDefault();
            if (name.val() == '') {
                name.addClass('is-invalid');
                showToast('bg-danger','Enter Your Name', 1500);
                return false;
            } else if (email.val() == '') {
                name.removeClass('is-invalid');
                email.addClass('is-invalid');
                showToast('bg-danger','Enter Your email Id', 1500);
                return false;
            } else if (password.val() == '') {
                email.removeClass('is-invalid');
                password.addClass('is-invalid');
                showToast('bg-danger','Enter Your passord', 1500);
                return false;
            } else {



                $.ajax({
                    url: '<?=base_url()."user_auth/userRagistration" ?>',
                    type: 'POST',
                    data: $('#registrationForm').serialize(),
                    success: function(response) {
                        var toastsVariant = response.status == 'error' ? 'bg-danger' : 'bg-success';
                        showToast(toastsVariant,response.message, 1500)
                        if(response.status == 'success')
                        {
                            window.location.href = '<?=base_url().'login'?>'
                        }
                        
                        
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })

                   

            }

             // toast js 
                    // Function to create and display a toast
                    function showToast(variant,message, delay) {
                        var toastContainer = document.getElementById('toastContainer');
                        var toast = document.createElement('div');
                        toast.className = 'toast align-items-center text-white '+variant+' border-0 mt-3';
                        toast.innerHTML = `<div class="d-flex"><div class="toast-body ">${message}</div>
                                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        
                                            `;
                        var options = {
                            autohide: true,
                            delay: delay || 3000 // Set the delay in milliseconds (3 seconds by default)
                        };

                        var bootstrapToast = new bootstrap.Toast(toast, options);
                        toastContainer.appendChild(toast);

                        // Show the toast
                        bootstrapToast.show();
                    }
        })

        

    })
    </script>

</body>

</html>