@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Editer</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Identifiant</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                            <label for="">Adresse e-mail</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nouveau mot de passe</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <input type="hidden" name="role" value="sales">
                        {{ method_field('PUT') }}
                        <input type="submit" value="Valider" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 py-2">
            <a href="" class="btn btn-info">Désactiver ce compte</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('users.sales') }}" class="btn btn-sm btn-dark">Retour</a>
        </div>
    </div>

@endsection