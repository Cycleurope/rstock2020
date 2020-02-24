@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h1 class="page-title">Profil</h1>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-body">
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
                                    <td><span class="font-weight-bold">Adresse - Ligne 1</span></td>
                                    <td>{{ Auth::user()->address1 }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-bold">Adresse - Ligne 2</span></td>
                                    <td>{{ Auth::user()->address2 }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-bold">Code Postal</span></td>
                                    <td>{{ Auth::user()->postalcode }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-bold">Ville</span></td>
                                    <td>{{ Auth::user()->city }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-bold">Téléphone</span></td>
                                    <td>{{ Auth::user()->phone }}</td>
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
                <a href="{{ route('password.index') }}" class="btn btn-sm btn-success">Modifier mon mot de passe</a>
            </div>
        </div>
</div>
@endsection