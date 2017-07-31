@if(Session::has('success'))


    <div class="alert alert-success">
        <strong>Success!</strong> {{Session::get('success')}}
    </div>
@endif


@if(count($errors)>0)

    <div class="alert alert-danger">
        <strong>Errors!</strong>

        <ul>
            <li>
                @foreach($errors->all() as $error)

                    {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif