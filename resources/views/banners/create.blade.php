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

            <form action="{{ route('banners.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control flatcontrol" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="content">Message</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="summernote-field"></textarea>

                        </div>

                        <input type="submit" value="Valider" class="btn btn-sm flatbutton col">
                    </div>
                </div>
                <a href="{{ route('banners.index') }}" class="fictive">Retour</a>
            </form>

        </div>
    </div>
</div>
@endsection