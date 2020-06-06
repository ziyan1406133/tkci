@extends('layouts.frontsite')

@section('head')
    {!! $map['js'] !!}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Sebaran Lokasi Cabang</h4>
            {!! $map['html'] !!}
        </div>
    </div>
</div>
<br><br><br><br>
@endsection