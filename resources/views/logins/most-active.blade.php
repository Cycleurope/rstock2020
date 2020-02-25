@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h1 class="page-title">Utilisateurs les plus actifs</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm" id="logins-table">
                    <thead>
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>CP</th>
                            <th>Ville</th>
                            <th>Rep</th>
                            <th>Connexions</th>
                            <th>Dernière Connexion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($logins as $log)
                    @if($log->user->role == "sales")
                    <tr class="table-pink">
                    @else
                    <tr>
                    @endif
                        <td>{{ $log->user->username }}</td>
                        <td>{{ $log->user->name }}</td>
                        <td>{{ $log->user->postalcode }}</td>
                        <td>{{ $log->user->city }}</td>
                        <td>{{ $log->user->resp }}</td>
                        <td>{{ $log->total }}</td>
                        <td>{{ $log->user->last_login_at }}</td>
                    </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection