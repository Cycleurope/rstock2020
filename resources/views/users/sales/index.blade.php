@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Comptes Commerciaux</h1>
                <a href="{{ route('users.sales.create') }}" class="btn btn-success">Nouveau compte commercial</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 py-2">
            <div class="card">
                <div class="card-body">
                    @if(count($sales) > 0)
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Identifiant</th>
                                <th>Adresse e-mail</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $s)
                            <tr>
                                <th>{{ $s->name }}</th>
                                <td>{{ $s->username }}</td>
                                <td>{{ $s->email }}</td>
                                <td>
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm flatbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('users.sales.edit', $s) }}">Editer</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('users.destroy', $s) }}" method="POST">
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
                    @else
                    <div class="alert alert-info">Aucun compte commercial.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection