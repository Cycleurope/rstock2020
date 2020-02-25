@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Modifier mon mot de passe</h1>
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
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info">
                            <span class="font-weight-bold">Attention : </span>Le mot de passe utilisé sur cette application est indépendant et n'a aucune correspondance avec les autres mots de passe utilisés sur les autres applications de Cycleurope.
                        </div>
                        <div class="form-group">
                            <label for="">Mot de passe actuel</label>
                            <input type="password"  name="current_password" class="form-control flatcontrol" autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <label for="">Nouveau mot de passe</label>
                            <input type="password" name="new_password" class="form-control flatcontrol" autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirmation du nouveau mot de passe</label>
                            <input type="password" name="new_confirm_password" class="form-control flatcontrol">
                        </div>
                        <input type="submit" class="btn btn-success col" value="Confirmer le nouveau mot de passe">
                    </div>
                </div>
            </div>
        </div>
    </form>

        <div class="row ">
            <div class="col">
                <a href="{{ route('profile') }}" class="btn btn-sm btn-dark">Mon Profil</a> | <a href="{{ route('dashboard') }}" class="btn btn-sm btn-dark">Dashboard</a>
            </div>
        </div>
@endsection