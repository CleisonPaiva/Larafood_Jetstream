@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $erro)
            <ul>
                <li>{{$erro}}</li>
            </ul>
        @endforeach
    </div>
@endif

@if(session('message'))
    <div class="alert alert-default-success">
 {{session('message')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-default-danger">
        {{session('error')}}
    </div>
@endif
