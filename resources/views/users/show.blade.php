@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <h1><span>{{ $dealer->username }} - {{ $dealer->name }}</span></h1>
                    {!! $dealer->activeBadge() !!}
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <h3>Informations</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Adresse : {{ $dealer->address1 }} - {{ $dealer->address2 }}</li>
                        <li class="list-group-item">CP / Ville : {{ $dealer->postalcode }} {{ $dealer->city }}</li>
                        <li class="list-group-item">Adresse e-mail : {{ $dealer->email }}</li>
                        <li class="list-group-item">Téléphone : {{ $dealer->phone }}</li>
                    </ul>
                </div>
            </div>
            @if(($dealer->active == 0) &&($dealer->password == null))
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
                    <input type="submit" class="btn flatbutton col" value="Activer le compte">
                </div>
            </form>
            @endif
            @if($dealer->active == 1)
            <div class="row">
                <div class="col-12">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm flatbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
</div>
@endsection