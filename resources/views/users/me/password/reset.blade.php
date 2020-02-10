@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mr-auto"><h1><span>Réinitialiser mon mot de passe</span></h1></div>
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
                    <a href="{{ route('profile') }}" class="fictive">Mon Profil</a> | <a href="{{ route('dashboard') }}" class="fictive">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection