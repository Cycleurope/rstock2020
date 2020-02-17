@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><span>Billboard</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('banners.create') }}" class="btn btn-sm flatbutton mb-5">Nouveau billboard</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if(count($banners) > 0)
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
                    @else
                    <div class="flatnotification">Auun billboard.</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection