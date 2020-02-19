@extends('layouts.app')
@section('content')
<div id="app" class="py-5">
    @include('partials/notifications-panel')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Labels</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('labels.store') }}" method="POST">
                    @csrf
                    <div class="form-group"><label for="reference">Référence</label><input id="reference" name="reference" type="text" class="form-control flatcontrol"></div>
                    <div class="form-group"><label for="designation">Designation</label><input id="designation" name="designation" type="text" class="form-control flatcontrol"></div>
                    <input type="submit" value="Valider" class="btn flatbutton col">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection