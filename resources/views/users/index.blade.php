@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col">
                    <h1><span>Comptes Clients</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-sm" id="dealers-table">
                        <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Identifiant</th>
                                <th>Nom</th>
                                <th>CP</th>
                                <th>Ville</th>
                                <th>Assortiments</th>
                                <th>Rep</th>
                                <th>M3Pin</th>
                                <th>Last Update</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{!! $user->activeBadge() !!}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->postalcode }}</td>
                        <td> {{ $user->city }}</td>
                        <td>
                            @foreach($user->assortments as $a)
                            {!! $a->assortmentBadge() !!}
                            @endforeach
                        </td>
                        <td>{{ $user->resp }}</td>
                        <td>{!! $user->hasM3Pin !! }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><a href="{{ route('users.show', $user->username) }}" class="">Consulter</a></td>
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