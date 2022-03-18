@extends('layouts.app')

@section('content')
<h1>Категории</h1>
<div class="container-admin">
    @include('admin.nav')
    <div class="page-admin">
        <div class="container-page">
            <table class="table table-border">
                <tbody>
                    <tr class="user-table">
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Имя владельца</th>
                        <th>Описание</th>
                        <th>Картинка</th>
                    </tr>
                    @foreach($categories as $category)
                        @php
                            $id = $category->id;
                        @endphp
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$categories->find($id)->user->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->picture}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection