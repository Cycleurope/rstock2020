@if(Session::has('message'))
<div class="container-fluid">
    <div class="row">
        <div class="col px-5">
            <div class="flatnotification flatnotification-{{ Session::get('class') }}">{{ Session::get('message') }}</div>
        </div>
    </div>
</div>
@endif