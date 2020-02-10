@extends('layouts.app')
@section('content')
@include('partials/notifications-panel')
<div id="content-panel" class="py-5">
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col"><h1><span>Nouveau compte</span></h1></div>
        </div>
        <div class="row px-5">
            <div class="col-6">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username"></label>
                        <input name="username" id="username" type="text" class="form-control flatcontrol" placeholder="Identifiant">
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input name="email" id="email" type="text" class="form-control flatcontrol" placeholder="Adresse e-mail">
                    </div>
                    <div class="form-group">
                        <label for="password"></label>
                        <input name="password" id="password" type="text" class="form-control flatcontrol" placeholder="Mot de passe provisoire">
                    </div>
                    <hr>
                    <h3>Informations complémentaires</h3>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control flatcontrol" placeholder="Nom du client">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" id="address" class="form-control flatcontrol" placeholder="Adresse">
                    </div>
                    <div class="form-group">
                        <input type="text" name="postalcode" id="postalcode" class="form-control flatcontrol" placeholder="Code Postal">
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" id="city" class="form-control flatcontrol" placeholder="Ville">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" class="form-control flatcontrol" placeholder="Téléphone">
                    </div>

                    <input type="hidden" name="role" value="{{ $role }}">
                    <input type="submit" value="Valider" class="btn flatbutton">
                </form>
            </div>
        </div>
        <div class="row px-5">
            <div class="col">
                <a href="dashboard.html" class="fictive">Retour à la liste des comptes.</a>
            </div>
        </div>
    </div>
</div>
@endsection