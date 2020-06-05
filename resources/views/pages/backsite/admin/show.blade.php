@extends('layouts.backsite')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Profile Card</div>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="mx-auto d-block" src="{{ asset($admin->image) }}" width="100px" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1">{{ $admin->name }}</h5>
                    </div>
                    <div class="text-sm-center">
                        {{ $admin->role }}
                    </div>
                    {!! (($admin->facebook !== null) || ($admin->twitter !== null) || ($admin->instagram !== null)) ? '<hr>' : '' !!}
                    <div class="card-text text-sm-center">
                        @if ($admin->facebook !== null)
                            <a href="http://facebook.com/{{ $admin->facebook }}" 
                                class="btn-lg btn-empty" target="_blank">
                            <span class="zmdi zmdi-facebook"></span>
                            </a>
                        @endif
                        @if ($admin->twitter !== null)
                            <a href="http://twitter.com/{{ $admin->twitter }}" 
                                class="btn-lg btn-empty text-info" target="_blank">
                            <span class="zmdi zmdi-twitter"></span>
                            </a>
                        @endif
                        @if ($admin->instagram !== null)
                            <a href="http://instagram.com/{{ $admin->instagram }}" 
                                class="btn-lg btn-empty text-instagram" target="_blank">
                            <span class="zmdi zmdi-instagram"></span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (($admin->role == 'Super Admin') || (Auth::user()->id == $admin->id))
                        <div class="pull-right">
                            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-md btn-primary" 
                                title="Edit Akun">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        </div>
                    @endif
                    <div class="card-title">Info Akun</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless table-responsive">
                                <tr>
                                    <td>E-Mail</td>
                                    <td>: {{ $admin->email }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless table-responsive">
                                <tr>
                                    <td>Username</td>
                                    <td>: {{ $admin->username }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-borderless table-responsive">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td colspan="2">: {{ $admin->name }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Artikel</td>
                                    <td>: {{ count($admin->published_articles) }}</td>
                                    <td>
                                        @if (count($admin->published_articles) > 0)
                                            <a href="{{ route('admins.article', $admin->username) }}" 
                                                class="btn btn-sm btn-info"> Lihat Artikel
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <div class="p-2">
                                <p>Bio :</p>
                                <p>
                                    {{ $admin->bio }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection