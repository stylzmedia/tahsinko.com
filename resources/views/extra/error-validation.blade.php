@foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert" style="margin-top: 75px;">{{$error}}</div>
@endforeach
