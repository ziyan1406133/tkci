@extends('layouts.backsite')



@section('head')
    {!! $map['js'] !!}
@endsection

@section('content')
    <h4 class="mb-4">Sebaran Lokasi Cabang</h4>
    {!! $map['html'] !!}
@endsection