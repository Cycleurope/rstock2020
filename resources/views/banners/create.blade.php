@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
            <div class="row">
                <div class="col">
                    <h1><span>Billboard</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                
                                        <input type="submit" value="Valider" class="btn btn-sm btn-success btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('banners.index') }}" class="btn btn-sm btn-dark">Retour</a>

                </div>
            </div>
@endsection