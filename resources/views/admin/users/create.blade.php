<x-admin-master>
@section('content')

    <h1>Create User</h1>

<div class="row">
    <div class="col-sm-6">
                {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminUsersController@store','files'=>true]) !!}

            @csrf


            <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name']) !!}
            </div>
            <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
            </div>
            <div class="form-group">
            {!! Form::label('role_id','Role') !!}
            {!! Form::select('role_id',[''=>'Choose Option'] + $roles ,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active',array(1=>'active',0=>'not active'),0,['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password']) !!}
            </div>
            <div class="form-group"> 
            {!! Form::file('file') !!}
            </div>
            <div>
            {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}



           @include('includes.form_errors')


    </div>
</div>

@endsection
</x-admin-master>