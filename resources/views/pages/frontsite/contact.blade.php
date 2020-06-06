@extends('layouts.frontsite')

@section('content')
<div class="contact-area section-padding-0-80">
    <div class="container">
        
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissable">
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissable">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissable">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <div class="row">
            <div class="col-12">
                <div class="contact-title">
                    <h2>Contact us</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="contact-form-area">
                    <form action="{{ route('message.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                            <div class="col-12 col-lg-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-12">
                                <textarea name="body" class="form-control" name="body" id="body" 
                                rows="5" placeholder="Message" maxlength="255" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn newspaper-btn mt-30 w-100" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <!-- Single Contact Information -->
                <div class="single-contact-information mb-30">
                    <h6>Alamat:</h6>
                    <p>Jl Nangka IV no 43D, Cipete Utara Kebayoran baru, <br>
                        Jakarta Selatan, DKI Jakarta, <br>
                        Daerah Khusus Ibukota Jakarta 12150</p>
                </div>
                <!-- Single Contact Information -->
                <div class="single-contact-information mb-30">
                    <h6>Phone:</h6>
                    <p>087883822006</p>
                </div>
                <!-- Single Contact Information -->
                <div class="single-contact-information mb-30">
                    <h6>Email:</h6>
                    <p>tkci.jakarta@gmail.com</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection