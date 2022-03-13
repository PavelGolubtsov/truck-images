@extends('layouts.app')

@section('content')
<h1>Главная</h1>
<div class="container-page">
    <div class="container-page-link">
        <a href="{{ url('/categories') }}">Категории изображений</a>
    </div>
</div>
<div class="container-page">
    @foreach ($images as $image)
        <div class="container-left">
            <div>
                {{$image->name}}
            </div>
            <div>
                {{$image->description}}
            </div>
            <div>
                <img
                    style="height:60px;width:80px;"
                    src="{{asset('storage/img/images/')}}/{{$image->picture}}"
                >
            </div>
        </div>
    @endforeach
</div>
@endsection
