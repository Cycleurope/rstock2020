@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div id="content-panel" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><span>Nouveau compte administrateur</span></h1>
                </div>
            </div>
            <form action="" class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Identifiant</label>
                        <input type="text" class="form-control flatcontrol">
                    </div>
                    <div class="form-group">
                        <label for="">Adresse e-mail</label>
                        <input type="text" class="form-control flatcontrol">
                    </div>
                    <input type="submit" value="Valider" class="btn flatbutton col">
                </div>
            </form>
            <a href="{{ route('users.index') }}" class="fictive">Retour</a>
        </div>
    </div>
</div>
@endsection