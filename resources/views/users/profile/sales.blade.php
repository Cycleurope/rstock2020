@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div class="container px-5">
        <div class="row">
            <div class="col-12">
                <h1>Profil</h1>
            </div>
            <div class="col-12 mb-5">
                <h3>Mes informations</h3>
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
            <div class="col-12">
                <a href="{{ route('password.index') }}" class="btn flatbutton">Modifier mon mot de passe</a>
            </div>
        </div>
    </div>
</div>
@endsection