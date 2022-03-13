@extends('layouts.app')

@section('content')
<h1>Категории изображений</h1>
<div class="container-page-categories">
    <div class="container-categories">
        <div class="title">
            <h2>Машины</h2>
        </div>
        <div>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('storage/img/categories/')}}/lamborgini.jpg" alt="Машины">
            </a>
        </div>
    </div>
    <div class="container-categories">
        <div class="title">
            <h2>Дома</h2>
        </div>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('storage/img/categories/')}}/lamborgini.jpg" alt="Дома">
        </a>
    </div>
</div>
@endsection