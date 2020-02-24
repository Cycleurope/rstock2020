@extends('layouts.app')
@section('content')
    @include('partials/notifications-panel')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h1 class="page-title">Editer le label</h1>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('labels.update', $label) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group"><label for="reference">Référence</label><input id="reference" name="reference" type="text" class="form-control flatcontrol" value="{{ $label->reference }}" disabled></div>
                        <div class="form-group"><label for="designation">Designation</label><input id="designation" name="designation" type="text" class="form-control flatcontrol" value="{{ $label->designation }}"></div>
                        <input type="submit" value="Update" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
            <a href="{{ route('labels.index') }}" class="btn btn-sm btn-secondary">Retour</a>

        </div>
    </div>
@endsection