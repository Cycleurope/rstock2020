@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h1 class="page-title">Comptes Clients</h1>
                </div>
            </div>
        </div>
        <div class="col-12">
            <a href="{{ route('export.stock') }}" class="btn flatbutton">Exporter tout le stock</a>
            <a href="{{ route('export.dealers') }}" class="btn flatbutton">Exporter la liste des comptes</a>
        </div>
    </div>
@endsection