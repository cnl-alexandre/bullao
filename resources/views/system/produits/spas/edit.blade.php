@extends('layouts.backoffice')

@section('pageTitle', 'Accessoires Bullao | '.env('APP_NAME'))

@section('content')


<form action="" method="post" enctype="multipart/form-data" id="uploadSpas">
{{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">

        </div>
    </div>
</form>

@endsection
