@if($errors->all())
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Danger!</strong>
        @foreach ($errors->all() as $message)
            <li>{{$message}}</li>
        @endforeach
    </div>
@endif