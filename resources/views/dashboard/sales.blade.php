@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
       <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Dashboard</h1>
            </div>
        </div>
        <div class="col-12">
            <a href="{{ route('export.stock.all') }}" class="btn btn-primary text-white">Exporter tout le stock</a>
                    <a href="{{ route('export.dealers') }}" class="btn btn-success text-white">Exporter la liste des comptes</a>
        </div>
    </div>
@endsection