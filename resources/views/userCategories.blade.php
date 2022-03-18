@extends('layouts.app')

@section('content')
<h1>Ваши категории</h1>
<div class="container-page">
    <div class="container-page-link">
        <a href="{{ route('showUserProfile') }}">Профиль</a>
    </div>
</div>
<div class="container-page">
    <div class="container-page-link">
        <a href="{{ route('showUserCategories') }}">Категории изображений</a>
    </div>
</div>
<div class="container-page">
    <div class="container-page-link">
        <a href="{{ route('showUserImages') }}">Ваши изображения</a>
    </div>
</div>
<div class="container-page">
    @foreach ($categories as $category)
        <div class="container-left">
            <div>
                {{$category->name}}
            </div>
            <div>
                {{$category->description}}
            </div>
            <div>
                {{$category->user_id}}
            </div>
            <div>
                <img
                    style="height:100px;width:200px;margin-bottom: 10px;"
                    src="{{asset('storage/img/categories/')}}/{{$category->picture}}"
                >
            </div>
        </div>
    @endforeach
</div>
@endsection