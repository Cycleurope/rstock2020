@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Importer des mots de passe M3</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('passwords.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group"><label for="file">Fichier</label><input id="file" name="file" type="file" class="form-control flatcontrol"></div>
                    <input type="submit" value="Importer" class="btn flatbutton col">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection