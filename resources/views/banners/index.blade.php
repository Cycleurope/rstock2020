@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col">
            <h1><span>Billboards</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('banners.create') }}" class="btn btn-sm btn-purple mb-2">Nouveau billboard</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if(count($banners) > 0)
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Pub. Start</th>
                                <th>Pub Stop</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                            <tr>
                                <td>{{ $banner->title }}</td>
                                <td>{!! $banner->content !!}</td>
                                <td>Aperiam, odio.</td>
                                <td>Quis, quaerat?</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('banners.edit', $banner) }}">Editer</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('banners.destroy', $banner) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="submit" class="dropdown-item text-danger btn" value="Delete" onclick="return confirm('Voulez-vous réellement supprimer ce billboard ?')"/>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="alert alert-primary">Aucun billboard.</div>
            @endif
        </div>
    </div>
@endsection