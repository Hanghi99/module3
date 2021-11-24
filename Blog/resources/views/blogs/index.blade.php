@extends('blogs.home');
@section('content')
<form action="" method="get">
    <input type="text" name="search" placeholder="Search">
    <!-- <input type="submit" value="Tìm kiếm" > -->
    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
</form>
<a href="{{ route('Blogs.create') }}" class="btn btn-success"><i class="fas fa-user-plus"></i></a>
@if (Session::has('success'))
<div class = "alert alert-success">{{session::get('success')}}</div>
@endif
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Content</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($blogs as $key => $blog)
    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $blog->name }}</td>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset('images/'.$blog->image) }}" alt="" style="width: 200px; height: 200px">
                            @else
                                {{'Chưa có ảnh'}}
                            @endif
                        </td>
                        <td>{{ $blog->content }}</td>
                        <td><a href="{{ route('Blogs.edit', $blog->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('Blogs.destroy', $blog->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection