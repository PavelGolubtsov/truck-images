@extends('layouts.app')

@section('content')
<h1>Ваш профиль</h1>
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
        <div class="container-left">
            <div>
                {{$userData->name}}
            </div>
            <div>
                {{$userData->email}}
            </div>
        </div>
</div>
@endsection