@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h1 class="page-title">Comptes Clients</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
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
                                    <td>{!! $user->hasM3Pin() !!}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td><a href="{{ route('users.show', $user->username) }}" class="btn btn-purple btn-sm width-sm">Consulter</a></td>
                                </tr>
                                @endforeach
                            </tbody>
        
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection