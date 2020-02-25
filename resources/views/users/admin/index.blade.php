@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Comptes Administrateurs</h1>
                <a href="{{ route('users.admins.create') }}" class="btn btn-success">Nouveau compte administrateur</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 py-2">
            <div class="card">
                <div class="card-body">
                    @if(count($admins) > 0)
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Identifiant</th>
                                <th>Adresse e-mail</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $a)
                            <tr>
                                <th>{{ $a->name }}</th>
                                <td>{{ $a->username }}</td>
                                <td>{{ $a->email }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">Aucun compte administrateur.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection