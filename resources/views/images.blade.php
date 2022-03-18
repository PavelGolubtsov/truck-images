@extends('layouts.app')

@section('styles')
<style>
    .container-categories{
            display: flex;
            justify-content: space-around;
        }
        .container-category{
            background-color: white;
            width: 400px;
            height: 400px;
            box-shadow: 2px 2px 4px 2px rgb(150 150 150 / 60%);
        }
        .container-category:hover{
            transform: translate(-1px, -1px) scale(1.001);
            box-shadow: 2px 2px 5px 2px rgb(150 150 150 / 40%);
        }
        .container-category a{
            color: black;
            text-decoration: none;
        }
        .category-name, .category-description{
            height: 30px;
            text-align: center;
            margin: 10px 0;
        }
</style>
@endsection

@section('content')
<h1>Изображения</h1>
<div class="container-categories">
    @foreach ($images as $image)
        <div class="container-category">
            <a href="/">
                <div class="category-name">{{$image->name}}</div>
                <div class="category-picture">
                    <img style="height:300px;width:400px;"
                        src="{{asset('storage/img/images/')}}/{{$image->picture}}">
                </div>
                <div class="category-description">{{$image->description}}</div>
            </a>
        </div>
    @endforeach
</div>
@endsection