@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class='text-center'>Xem danh mục {{$categories->name}}</h1>

    <div class="container">

        <table class="table table-striped">
            <thead>

              <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Trạng thái </th>

                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">{{$categories->id}}</th>
                    <td>{{$categories->name}}</td>
                    <td>{{$categories->status}}</td>

                </tr>


            </tbody>
        </table>
    </div>
@endsection