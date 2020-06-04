@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> 
            $error
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">     
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> 
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif