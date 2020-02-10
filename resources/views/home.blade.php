<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>RStock</title>
</head>
<body>
    <div id="app-gateway">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col mr-auto">
                                <h1 class="mb-2"><span>RStock</span></h1>
                                <h3><span>Connexion</span></h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control flatcontrol" placeholder="Identifiant">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control flatcontrol" placeholder="Mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary flatbutton col-12">Se connecter</button>
                        <a href="{{ route('password.send') }}" class="fictive">Mot de passe oublié</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</html>