@if(Session::has('message'))
    <div class="row">
        <div class="col py-2">
            <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message') }}</div>
        </div>
    </div>
@endif