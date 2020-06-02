@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Rechercher</h1>
            </div>
        </div>
        
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="accounts-finder"></div>
                </div>
            </div>
        </div>
    </div>
@endsection