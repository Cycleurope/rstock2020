@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    @if(Auth::user()->role == 'admin')
        @include('dashboard.admin')
    @elseif(Auth::user()->role == 'dealer')
        @include('dashboard.dealer')
    @elseif(Auth::user()->role == 'sales')
        @include('dashboard.sales')
    @endif
</div>
@endsection