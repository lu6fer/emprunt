@extends('layout.html')
@section('title', 'Administration - Liste des blocs')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
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
                <th data-sortable="true">Numéro</th>
                <th data-sortable="true">Marque</th>
                <th data-sortable="true">Model</th>
                <th data-sortable="true">Taille</th>
                <th data-sortable="true">Emprunté</th>
                <th data-sortable="true">Emprunteur</th>
                <th data-sortable="true">Date d'emprunt</th>
                <th data-sortable="true">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tanks as $tank)
                <tr>
                    <td>{{$tank->number}}</td>
                    <td>{{$tank->brand}}</td>
                    <td>{{$tank->model}}</td>
                    <td>{{$tank->size}}</td>
                    <td>
                        <input title="borrow" type="checkbox" @if (count($tank->users) != 0) checked="checked" @endif disabled>
                    </td>
                    <td>
                        @if (count($tank->users) != 0)
                            {{$tank->users[0]->firstname}} {{$tank->users[0]->lastname}}
                        @endif
                    </td>
                    <td>
                        @if (count($tank->users) != 0)
                            {{$tank->users[0]->pivot->borrow_date}}
                        @endif
                    </td>
                    <td>
                        @if (count($tank->users) != 0)
                            <form name="block" method="post" action="{{url('return/block')}}">
                                <input type="hidden" name="block_id" value="{{$tank->id}}">
                                <input type="hidden" name="user_id" value="{{$tank->users[0]->id}}">
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <button class="btn btn-default"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Rendre le bloc">
                                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                                    </button>
                                    <a href="{!! url('admin/tank/edit/'.$tank->id) !!}" class="btn btn-default"
                                       type="submit"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Editer le bloc">
                                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection