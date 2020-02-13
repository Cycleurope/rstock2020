@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mr-auto"><h1><span>Modifier mon mot de passe</span></h1></div>
                </div>
            </div>
            <form action="{{ route('password.store') }}" method="POST">
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
                        <label for="">Mot de passe actuel</label>
                        <input type="password"  name="current_password" class="form-control flatcontrol" autocomplete="current-password">
                        <a href="{{ route('password.reset') }}" class="fictive">Je ne me souviens plus de mon mot de passe.</a>
                    </div>
                    <div class="form-group">
                        <label for="">Nouveau mot de passe</label>
                        <input type="password" name="new_password" class="form-control flatcontrol" autocomplete="current-password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmation du nouveau mot de passe</label>
                        <input type="password" name="new_confirm_password" class="form-control flatcontrol">
                    </div>
                    <input type="submit" class="btn flatbutton col" value="Confirmer le nouveau mot de passe">
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