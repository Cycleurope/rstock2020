@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-5">
            @foreach($banners as $banner)
            <div class="flatnotification py-4 mb-2">
                <h2 class="mb-3">{{ $banner->title }}</h2>
                <div>{!! $banner->content !!}</div>
            </div>
            @endforeach
        </div>
    </div>
@endsection