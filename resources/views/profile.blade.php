@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    @if(Auth::user()->role == 'admin')
        @include('profile.admin')
    @elseif(Auth::user()->role == 'dealer')
        @include('profile.dealer')
    @elseif(Auth::user()->role == 'sales')
        @include('profile.sales')
    @endif
</div>
@endsection