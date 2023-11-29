@if(!empty(session('success')))
    <div class="alert alert-success alert-dismissible" role="alert">
        <h5><i class="icon fas fa-check"></i> Successfully!</h5>
        {{ session('success') }}
    </div>
@endif

@if(!empty(session('error')))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <h5><i class="icon fas fa-exclamation-triangle"></i> Attention!</h5>
        {{ session('error') }}
    </div>
@endif

