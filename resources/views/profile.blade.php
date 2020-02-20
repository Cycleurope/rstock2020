@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    @if(Auth::user()->role == 'admin')
        @include('users.profile.admin')
    @elseif(Auth::user()->role == 'dealer')
        @include('users.profile.dealer')
    @elseif(Auth::user()->role == 'sales')
        @include('users.profile.sales')
    @endif
</div>
@endsection