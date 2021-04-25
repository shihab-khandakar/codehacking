
<x-admin-master>

@section('content')

<h1>Users</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="80px" src="{{$user->photo ? $user->photo->file : '/images/no_image.png'}}" alt=""></td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? "active" : "not active"}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
        <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @endsection

  </x-admin-master>