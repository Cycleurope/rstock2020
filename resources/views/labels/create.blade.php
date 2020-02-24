@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Nouveau Label</h1>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('labels.store') }}" method="POST">
                        @csrf
                        <div class="form-group"><label for="reference">Référence</label><input id="reference" name="reference" type="text" class="form-control flatcontrol"></div>
                        <div class="form-group"><label for="designation">Designation</label><input id="designation" name="designation" type="text" class="form-control flatcontrol"></div>
                        <input type="submit" value="Valider" class="btn btn-success col">
                    </form>
                </div>
            </div>
            <a href="{{ route('labels.index') }}" class="btn btn-sm btn-secondary">Retour</a>

        </div>
    </div>
@endsection