@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
        <div class="row">
            <div class="col-12">
                <h1>Profil</h1>
            </div>
            <div class="col-8 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mes informations</h5>
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th>Identifiant</th>
                            <td>{{ Auth::user()->username }}</td>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Adresse - Ligne 1</th>
                            <td>{{ Auth::user()->address1 }}</td>
                        </tr>
                        <tr>
                            <th>Adresse - Ligne 2</th>
                            <td>{{ Auth::user()->address2 }}</td>
                        </tr>
                        <tr>
                            <th>Code Postal</th>
                            <td>{{ Auth::user()->postalcode }}</td>
                        </tr>
                        <tr>
                            <th>Ville</th>
                            <td>{{ Auth::user()->city }}</td>
                        </tr>
                        <tr>
                            <th>Téléphone</th>
                            <td>{{ Auth::user()->phone }}</td>
                        </tr>
                        <tr>
                            <th>Adresse e-mail</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mes assortiments</h5>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Catalogue</th>
                                    <th class="text-right">Jusqu'au</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->assortments as $a)
                                <tr>
                                    <td>
                                        @component('components.assortment')
                                            @slot('name')
                                            {{ $a->ocascd }}
                                            @endslot
                                        @endcomponent
                                    </td>
                                    <td class="text-right">{{ $a->octdat }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card"><div class="card-body">
                    <a href="{{ route('password.index') }}" class="btn btn-info">Modifier mon mot de passe</a>
                
                </div>
            </div>
        </div>
@endsection