<x-admin-master>
@section('content')

    <h1>Create Posts</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method'=>'post' , 'action'=>'App\Http\Controllers\AdminPostsController@store', 'files'=>true]) !!}

            @csrf

            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id','Category') !!}
                {!! Form::select('category_id',array(1=>'PHP',0=>'JavaScript'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                
                {!! Form::file('photo_id') !!}
            </div>
            <div class="form-group">
                {!! Form::label('body','Description') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
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