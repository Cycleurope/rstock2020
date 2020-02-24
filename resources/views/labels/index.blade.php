@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h1 class="page-title">Labels</h1>
                </div>
            </div>
            <div class="col-12 mb-2">
                <a href="{{ route('labels.create') }}" class="btn btn-success">Nouveau label</a>
            </div>
            <div class="col-12">
                @if(count($labels) > 0)
                <div class="card">
                    <div class="card-body">
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
                    </div>
                </div>
                @else
                <div class="flatnotification">Aucun label</div>
                @endif
            </div>
        </div>
@endsection