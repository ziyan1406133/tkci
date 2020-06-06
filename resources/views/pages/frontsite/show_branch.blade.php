@extends('layouts.frontsite')

@section('head')
    {!! $map['js'] !!}
@endsection

@section('content')
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb text-center">
                                <a href="#"><img src="{{ asset($branch->image) }}" style="height: 300px"></a>
                            </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>{{ $branch->branch_name }}</h6>
                            </a>
                            <p>
                                {!! $branch->description !!}
                            </p>
                            <hr>
                            <p>
                                Ketua : {{ $branch->chairman_name }}
                            </p>
                            <h6>Alamat Cabang :</h6>
                            <p>
                                {{ $branch->address ? $branch->address.', ' : '' }}Kec. {{ $branch->kecamatan->nama }},
                                {{ $branch->kabupaten->nama }},
                                {{ $branch->provinsi->nama }}
                            </p>
                            <h6>
                                Kontak Cabang :
                            </h6>
                            <p>
                                @if ($branch->email)
                                    E-Mail : {{ $branch->email }} <br>
                                @endif
                                @if ($branch->phone)
                                    No. Telp : {{ $branch->phone }} <br>
                                @endif
                                @if ($branch->facebook)
                                    Facebook : 
                                    <a href="http://facebook.com/{{ $branch->facebook }}" target="_blank">
                                        {{ '@'.$branch->facebook }} <br>
                                    </a>
                                @endif
                                @if ($branch->twitter)
                                    Twitter : 
                                    <a href="http://twitter.com/{{ $branch->twitter }}" target="_blank">
                                        {{ '@'.$branch->twitter }} <br>
                                    </a>
                                @endif
                                @if ($branch->instagram)
                                    Instagram : 
                                    <a href="http://instagram.com/{{ $branch->instagram }}" target="_blank">
                                        {{ '@'.$branch->instagram }} <br>
                                    </a>
                                @endif
                            </p>
                            @if ($sortirDonasi)
                                <h6>
                                    Daftar Donasi :
                                </h6>
                                <div id="accordion">
                                    @foreach ($sortirDonasi as $item)
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" 
                                                    data-target="#collapseOne_{{ $item[0]['year'] }}" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $item[0]['year'] }}
                                                    </button>
                                                </h5>
                                            </div>
                                        
                                            <div id="collapseOne_{{ $item[0]['year'] }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Donatur</th>
                                                                <th>Nominal</th>
                                                            </tr>
                                                            @foreach ($item as $i)
                                                                <tr>
                                                                    {{-- <td>{{ $i['date'] }}</td> --}}
                                                                    <td>{{ date_format(date_create($i['date']), 'd M Y') }}</td>
                                                                    <td>{{ $i['donator'] }}</td>
                                                                    <td>Rp. {{ number_format(floatval($i['nominal']),0,',','.') }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Belum ada donasi.</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">
                    @auth
                        <div class="mb-2 text-center">
                            <a href="{{route('cabang.edit', $branch->id)}}" class="btn btn-md btn-primary">
                                Edit Cabang
                            </a>
                            <a href="#" class="btn btn-md btn-info"
                                data-toggle="modal" data-target="#deleteBranch_{{$branch->id}}"
                                >Hapus Cabang
                            </a>
                        </div>
                    @endauth
                    <div class="mb-3">
                        {!! $map['html'] !!}
                    </div>
                    
                    @include('layouts.partial.frontsite.random_article')

                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.backsite.branch.modal.delete')
@endsection