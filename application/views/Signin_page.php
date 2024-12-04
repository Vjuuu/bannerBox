<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
                            <h1>Welcome Back :)</h1>
                            <p>to keep connected with us please login with your personal information by email addredd
                                and password 🔔</p>

                            <form id="loginForm">

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control " id="email" name="email"
                                        placeholder="name@example.com" autocomplate="off">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" autocomplete="off">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Remember Me
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- boostrap 5 js cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function()
        {
            var email = $('#email');
            var password = $('#password');

           $('#loginForm').on('submit',function(e)
           {
              e.preventDefault();
              if(email.val() == '')
              {
                email.addClass('is-invalid')
                return false;
              }
              else if(password.val()=='')
              {
                email.removeClass('is-invalid');
                password.addClass('is-invalid');
              }
              else
              {
                $.ajax({
                    url:'<?=base_url().'user_auth/user_login'?>',
                    type:'POST',
                    data:$('#formLogin').serialize(),
                    success:function(response)
                    {
                        console.log(response);
                    },
                    error:function(error)
                    {
                        console.log(error.message);
                    }
                })
              }




           })
        })
    </script>
</body>

</html>