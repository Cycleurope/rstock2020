@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><span>Comptes administrateurs</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('users.create') }}" class="btn btn-sm flatbutton mb-5">Nouveau compte</a>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Identifiant</th>
                                <th>Adresse e-mail</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $admin)
                            <tr>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->email }}</td>
                                <td class="text-right"><a href="">Consulter</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection