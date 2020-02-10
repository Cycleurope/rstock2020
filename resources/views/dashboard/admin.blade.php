@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><span>Dashboard Administrateur</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td><span class="font-weight-bold">Vélos en circulation</span></td>
                                <td>{{ $releases->count() }}</td>
                                <td><span class="font-weight-bold">{{ number_format($releases->count()/$serials->count() * 100, 2, '.', ',') }} %</span></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">sur</span></td>
                                <td>{{ $serials->count() }}</td>
                                <td></td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection