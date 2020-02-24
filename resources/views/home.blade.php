<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>RStock - Cycleurope France</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="{{ asset("adminto/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("adminto/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("adminto/assets/css/app.css") }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="index.html">
                                <span><img src="assets/images/logo-light.png" alt="" height="22"></span>
                            </a>
                        </div>
                        <img src="{{ asset('adminto/assets/images/logo-light.png') }}" alt="" width="100%" class="mb-4 px-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Connexion</h4>
                                </div>

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="username">Identifiant / Adresse e-mail</label>
                                        <input class="form-control" type="text" id="username" required="" name="username" placeholder="Identifiant">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Mot de passe</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Mot de passe">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Se connecter </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>