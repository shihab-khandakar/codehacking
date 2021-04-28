
<x-admin-master>

@section('content')

<h1>All Posts</h1>



<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td><img height="80px" src="{{$post->photo ? $post->photo->file : '/images/no_image.png'}}" alt=""></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category_id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
        <td>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @endsection

  </x-admin-master>