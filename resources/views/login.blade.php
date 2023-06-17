<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login- HRIS</title>
    <meta name="description" content="Arash Law">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
 

    <link rel="stylesheet" href="{{ asset('sufee/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sufee/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sufee/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('sufee/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sufee/vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ asset('sufee/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


    <style>
        .bg-dark{
            background-color: #080812 !important
        }

        .login-logo-img{
            max-width: 12vw;
        }

        .login-content{

        }

    </style>
</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="">
                        <img class="align-content login-logo-img" src="{{ asset('images/arashlaw-logo.png'); }}"  alt="">
                    </a>
                </div>
                
                <div class="login-form">

                    <form action="{{ route('login') }}" method="POST" id="login-form">

                        @csrf 
                        
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox" name="remember_me" value="1"> Remember Me
                            </label>
                                
                                <!-- <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label> -->


                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                             @if(isset($login_error))
                                <div class="text text-danger mt-2"> {{ $login_error }}  </div>
                            @endif

                            <!-- 
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div>
                             -->

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="{{ asset('sufee/vendors/jquery/dist/jquery.min.js') }}"></script>
    
    <script src="{{ asset('sufee/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('sufee/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/helper.js') }}"></script> 

    <script src="{{ asset('js/custom-form-submitter.js') }}"></script> 
    <script src="{{ asset('js/login.js') }}"></script> 

</body>


</html>
