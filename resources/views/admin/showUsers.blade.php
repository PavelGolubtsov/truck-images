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
                        <th>Почта</th>
                        <th>Картинка</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            <img style="height:60px;width:80px;"
                                src="{{asset('storage/img/userы/')}}/{{$user->picture}}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection