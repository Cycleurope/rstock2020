@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <h1><span>Tableau de bord</span></h1>
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
        </div>
    </div>
</div>
@endsection