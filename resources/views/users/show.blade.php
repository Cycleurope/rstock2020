@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Profil</h1>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $dealer->username }}<br />{{ $dealer->name }}</h1>
                    {!! $dealer->activeBadge() !!}
                    <hr>
                    <h5 class="card-title">Informations</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Adresse : {{ $dealer->address1 }} - {{ $dealer->address2 }}</li>
                        <li class="list-group-item">CP / Ville : {{ $dealer->postalcode }} {{ $dealer->city }}</li>
                        <li class="list-group-item">Adresse e-mail : {{ $dealer->email }}</li>
                        <li class="list-group-item">Téléphone : {{ $dealer->phone }}</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assortiments</h5>
                    @foreach($dealer->assortments as $a)
                    <li class="list-group-item"><span class="font-weight-bold">{{ $a->ocascd }}</span> jusqu'au <span class="font-weight-bold">{{ $a->octdat }}</span></li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-4">
            @if(($dealer->active == 0) &&($dealer->password == null))
            <div class="card">
                <div class="card-body">
                    <h3>Activation du compte</h3>
                    <form action="{{ route('users.activate', $dealer) }}" method="POST">
                        @csrf
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Mot de passe</label>
                                <input type="password" name="password" class="form-control flatcontrol" autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirmation du mot de passe</label>
                                <input type="password" name="confirm_password" class="form-control flatcontrol">
                            </div>
                            <input type="submit" class="btn btn-success col" value="Activer le compte">
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if($dealer->active == 1)
            <div class="card">
                <div class="card-body">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Désactiver le compte
                        </button>
                        <div class="dropdown-menu">
                            <form action="{{ route('users.desactivate', $dealer) }}" method="POST">
                                @csrf
                                <input type="submit" value="Confirmer la desactivation du compte." class="dropdown-item btn text-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Retour</a>
        </div>
    </div>
@endsection