@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><span>Dashboard Administrateur</span></h1>
                </div>
                <div class="col-12">
                    <a href="{{ route('export.stock') }}" class="btn flatbutton">Exporter tout le stock</a>
                    <a href="{{ route('export.dealers') }}" class="btn flatbutton">Exporter la liste des comptes</a>
                </div>
                <div class="col-12">
                    <h2>Assortiments Utilisateurs</h2>
                    <ul class="list-group list-group-flush">
                        @foreach($users_assortments as $ua)
                        <li class="list-group-item d-flex justify-content-between align-items-center"><span><span class="font-weight-bold">{{ $ua->ocascd }} : </span>{{ $ua->total }}</span><a href="" class="btn flatbutton btn-sm">Exporter</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection