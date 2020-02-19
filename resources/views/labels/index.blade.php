@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Labels</h1>
            </div>
            <div class="col-12 mb-2">
                <a href="{{ route('labels.create') }}" class="btn flatbutton">Nouveau label</a>
            </div>
            <div class="col-12">
                @if(count($labels) > 0)
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Désignation</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach($labels as $label)
                            <tr>
                                <td>{{ $label->reference }}</td>
                                <td>{{ $label->designation }}</td>
                                <td class="text-right">
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm flatbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('labels.edit', $label) }}">Editer</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('labels.destroy', $label) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="Supprimer" class="dropdown-item btn text-danger">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>
                </div>
                @else
                <div class="flatnotification">Aucun label</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection