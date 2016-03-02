@extends('layout.html')
@section('title', 'Utilisateurs')
@section('content')
    <div class="table-responsive">
        <table data-class="table table-hover table-striped"
               data-toggle="table"
               data-flat="true"
               data-search="true"
               data-show-columns="true"
               data-show-multi-sort="true">
            <thead>
            <tr>
                <th data-sortable="true">Id</th>
                <th data-sortable="true">Prénom</th>
                <th data-sortable="true">Nom</th>
                <th data-sortable="true">email</th>
                <th data-sortable="true">Actif</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="clickable-row" data-href="{{url('borrow/' . $user->id)}}">
                    <td>{{$user->id}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td><input type="checkbox" checked="@if ($user->active == true) checked @endif" disabled></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection