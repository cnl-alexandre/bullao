@if(Session::has('success'))
    <div class="alert alert-success alert-block">
        {!! Session::get('success') !!}
    </div>
    {{ Session::forget('success') }}
@endif
@if(Session::has('error'))
    <div class="alert alert-danger alert-block">
        {!! Session::get('error') !!}
    </div>
    {{ Session::forget('error') }}
@endif
@if(Session::has('warning'))
    <div class="alert alert-warning alert-block">
        {!! Session::get('warning') !!}
    </div>
    {{ Session::forget('warning') }}
@endif
@if(Session::has('info'))
    <div class="alert alert-info alert-block">
        {!! Session::get('info') !!}
    </div>
    {{ Session::forget('info') }}
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif
