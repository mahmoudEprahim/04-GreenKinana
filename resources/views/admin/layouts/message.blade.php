@if (Session::has('message'))
    <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
@endif

@if ($errors->all())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
