@if (\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger text-center">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
@endif

@if (\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success text-center">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
@endif
{{--@if ($errors->all())--}}
{{--    @foreach($errors->all() as $error)--}}
{{--    <div class="alert alert-danger text-center">{{ $error }}</div>--}}
{{--    @endforeach--}}
{{--@endif--}}
