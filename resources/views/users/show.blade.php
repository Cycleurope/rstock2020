@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1><span>{{ $dealer->username }}</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
            </div>
        </div>
    </div>
</div>
@endsection