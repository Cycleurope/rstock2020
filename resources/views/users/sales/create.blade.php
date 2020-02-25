@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Nouveau Compte Commercial</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Identifiant</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="">Adresse e-mail</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Mot de passe provisoire</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <input type="hidden" name="role" value="sales">
                        <input type="submit" value="Valider" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
            <a href="{{ route('users.sales') }}" class="btn btn-sm btn-dark">Retour</a>
        </div>
    </div>

@endsection