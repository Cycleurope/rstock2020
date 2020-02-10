@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container-fluid">
            <div class="row px-5">
                <div class="mr-auto"><h1><span>Comptes Administrateurs</span></h1></div>
                <div class="ml-lg-auto mb-5"><a href="{{ route('users.create.role', 'admin') }}" class="btn flatbutton">Nouveau compte administrateur</a></div>
            </div>
            <div class="row px-5">
                <div class="col">
                    @if(count($users) > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Identifiant</th>
                                <th>Adresse e-mail</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="" class="flatbutton flatbutton-sm">Editer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="flatnotification">Aucun utilisateur enregistré.</div>
                    @endif
                </div>
            </div>
            <div class="row px-5">
                <div class="col">
                    <a href="dashboard.html" class="fictive">Retour au Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection