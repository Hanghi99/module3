@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Quản lý danh mục</h1>

<div class="card mb-4">
@if (Session::has('success'))
            <div class="alert alert-success">{{session::get('success')}}</div>
            @endif
    <div class="card-body">
    <a href="{{route('categories.create')}}" class="btn btn-success"><i class="fas fa-plus-square"></i></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->status}}</td>
                    <td>
                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary"><i class="fas fa-eye-slash"></i></i></a>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{route('categories.destroy',$category->id)}}" method="post" Style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection