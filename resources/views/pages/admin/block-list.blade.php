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
            @foreach($blocks as $block)
                <tr>
                    <td>{{$block->number}}</td>
                    <td>{{$block->brand}}</td>
                    <td>{{$block->model}}</td>
                    <td>{{$block->size}}</td>
                    <td>
                        <input title="borrow" type="checkbox" @if (count($block->users) != 0) checked="checked" @endif disabled>
                    </td>
                    <td>
                        @if (count($block->users) != 0)
                            {{$block->users[0]->firstname}} {{$block->users[0]->lastname}}
                        @endif
                    </td>
                    <td>
                        @if (count($block->users) != 0)
                            {{$block->users[0]->pivot->borrow_date}}
                        @endif
                    </td>
                    <td>
                        @if (count($block->users) != 0)
                            <form name="block" method="post" action="{{url('return/block')}}">
                                <input type="hidden" name="block_id" value="{{$block->id}}">
                                <input type="hidden" name="user_id" value="{{$block->users[0]->id}}">
                                {{ csrf_field() }}
                                <button class="btn btn-default"
                                        type="submit"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Rendre le bloc">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection