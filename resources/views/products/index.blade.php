@extends('layouts.app')
@section('content')
<div id="app" class="py-2">
    @include('partials/notifications-panel')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Recherche</h1>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table id="dealers-table" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Code Produit</th>
                                <th>Designation</th>
                                <th>Marque</th>
                                <th>Motoriation</th>
                                <th>Capacité</th>
                                <th>Hauteur</th>
                                <th>Coloris</th>
                                <th>Statut</th>
                                <th>Stock net</th>
                                <th>Famille</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            @if($p->mbstat == 50)
                                <tr class="table-warning">
                            @elseif($p->mbaval > 0)
                                <tr class="table-success">
                            @else
                                <tr class="text-danger">
                            @endif
                                <td>{{ $p->mmitno }}</td>
                                <td>
                                    @if($p->type == "frame")
                                    <span class="flatbadge bg-primary text-light">FRAME KIT</span>
                                    @endif
                                    {{ $p->mmitds }}
                                </td>
                                <td>{{ $p->mmitcl }}</td>
                                <td>{{ $p->mmspe1 }}</td>
                                <td>{{ $p->mmspe2 }}</td>
                                <td>{{ $p->size }}</td>
                                <td>{{ $p->mmspe3 }}</td>
                                <td>{!! $p->statusBadge() !!}</td>
                                <td>{{ $p->mbaval }}</td>
                                <td>
                                @if($p->family != null)
                                {{ $p->family->name }}
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection