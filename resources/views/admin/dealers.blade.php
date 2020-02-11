@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1><span>Dealers</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{ $dealers->links() }}
                    <table class="table table-sm" id="dealers-table">
                    @foreach($dealers as $dealer)
                    <tr>
                        <td>{{ $dealer->username }}</td>
                        <td>{{ $dealer->name }}</td>
                        <td>{{ $dealer->postalcode }}</td>
                        <td> {{ $dealer->city }}</td>
                        <td>
                            @foreach($dealer->assortments as $a)
                            <span class="badge flatbadge flatbadge-blue">{{ $a->ocascd }}</span>
                            @endforeach
                        </td>
                        <td><a href="" class="">Consulter</a></td>
                    </tr>
                    @endforeach
                    </table>
                    {{ $dealers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection