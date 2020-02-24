@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h1 class="page-title">Labels - Importer</h1>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('labels.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"><label for="file">Fichier</label><input id="file" name="file" type="file" class="form-control flatcontrol"></div>
                            <input type="submit" value="Importer" class="btn btn-success col">
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection