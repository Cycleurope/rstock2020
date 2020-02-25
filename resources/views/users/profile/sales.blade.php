@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h1 class="page-title">Mon Profil</h1>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Mes informations</h3>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="font-weight-bold">Identifiant</span></td>
                                    <td>{{ Auth::user()->username }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-bold">Nom</span></td>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-bold">E-mail</span></td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a href="{{ route('password.index') }}" class="btn btn-purple">Modifier mon mot de passe</a>
            </div>
        </div>
@endsection