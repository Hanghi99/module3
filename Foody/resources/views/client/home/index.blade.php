@extends('layouts.client')

@section('content')

<div id="body">
            <div class="header">
                <div>
                    <h1>Foods</h1>
                </div>
            </div>
            <div>
                @foreach ($foods as $food)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src=" {{ asset('admin/images/'.$food->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$food->name}}</h5>
                        <p class="card-text">{{$food->price}}</p>
                        <a href="#" class="btn btn-primary">Mua</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endsection