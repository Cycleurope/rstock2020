@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><span>Tableau de bord</span></h1>
                </div>
                <div class="col-12">
                    <a href="{{ route('export.stock') }}" class="btn flatbutton">Exporter tout le stock</a>
                    <a href="{{ route('export.dealers') }}" class="btn flatbutton">Exporter la liste des comptes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection