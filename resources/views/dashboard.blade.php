@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    @if(Auth::user()->role == 'admin')
        @include('dashboard.admin')
    @elseif(Auth::user()->role == 'monitor')
        @include('dashboard.monitor')
    @elseif(Auth::user()->role == 'guest')
        @include('dashboard.guest')
    @elseif(Auth::user()->role == 'dealer')
        @include('dashboard.dealer')
    @endif
</div>
@endsection