@extends('layouts.app')

@section('content')
<h1>Ваши изображения</h1>
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
<div>
    <p>Размер ваших изображений {{$sizeUserImages}} байт.</p>
</div>
<div class="container-page">
    <table class="table table-border">
        <tbody>
            <tr class="user-table">
                <th>ID</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>ID категории</th>
                <th>Размер</th>
                <th>Изображение</th>
            </tr>
        @foreach ($images as $image)
            <tr>
                <td>{{$image->id}}</td>
                <td>{{$image->name}}</td>
                <td>{{$image->description}}</td>
                <td>{{$image->category_id}}</td>
                <td>{{$image->size}} байт</td>
                <td>
                    <img
                        style="height:60px;width:80px;"
                        src="{{asset('storage/img/images/')}}/{{$image->picture}}">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection