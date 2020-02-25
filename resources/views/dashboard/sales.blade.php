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
            <a href="{{ route('export.stock') }}" class="btn btn-purple">Exporter tout le stock</a>
        </div>
    </div>
@endsection