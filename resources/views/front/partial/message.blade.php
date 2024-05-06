@if ($errors->any())

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  @foreach ($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 
@endif

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <p>{{Session::get('success')}}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

@if(Session::has('serror'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <p>{{Session::get('serror')}}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif