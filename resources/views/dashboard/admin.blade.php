@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Comptes Clients</h1>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('export.stock.all') }}" class="btn btn-primary text-white">Exporter tout le stock</a>
                    <a href="{{ route('export.dealers') }}" class="btn btn-success text-white">Exporter la liste des comptes</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assortiments Utilisateurs</h5>
                    <ul class="list-group list-group-flush">
                        @foreach($users_assortments as $ua)
                        <li class="list-group-item d-flex justify-content-between align-items-center"><span>
                            @component('components.assortment-admin')
                                @slot('name')
                                {{ $ua->ocascd }}
                                @endslot
                            @endcomponent
                            : </span>{{ $ua->total }}</span>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection