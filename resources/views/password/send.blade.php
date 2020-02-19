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
    <div id="app-gateway" class="py-5">
        @include('partials/notifications-panel')
        <div id="content-panel" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="mr-auto">
                            <h1 class="mb-2"><span>RStock</span></h1>
                            <h3><span>Réinitialiser mon mot de passe</span></h3>
                        </div>
                    </div>
                </div>
                    <form action="{{ route('password.send.new') }}" method="POST">
                    @csrf
        
                    <div class="row">
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Adresse e-mail de contact</label>
                                <input type="email"  name="email" class="form-control flatcontrol">
                            </div>
                            <input type="submit" class="btn flatbutton col" value="Envoyer un nouveau mot de passe">
                        </div>
                    </div>
                </form>
    
                <div class="row ">
                    <div class="col">
                        <a href="{{ route('home') }}" class="fictive">Connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>