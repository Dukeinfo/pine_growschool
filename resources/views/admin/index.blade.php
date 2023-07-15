<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pinegrove School - Sign In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Pinegrove School" name="description" />
        <meta content="Pinegrove School" name="keywords" />
        <meta content="Pinegrove School" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin_assets/images/faviconn.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin_assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admin_assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="account-pages pt-sm-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to admin.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('admin_assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">

                                    <div class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('admin_assets/images/crest.png')}}" alt="" class="" height="65">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" action="#">
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
            
                                        

                                        <div class="mt-4 text-center">
                                            <a href="#" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
         <script src="{{asset('public/admin_assets/libs')}}/jquery/jquery.min.js"></script>
        <script src="{{asset('public/admin_assets/libs')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('public/admin_assets/libs')}}/metismenu/metisMenu.min.js"></script>
        <script src="{{asset('public/admin_assets/libs')}}/simplebar/simplebar.min.js"></script>
        <script src="{{asset('public/admin_assets/libs')}}/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="{{asset('public/admin_assets/js')}}/app.js"></script>
    </body>
</html>