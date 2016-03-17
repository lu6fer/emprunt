@extends('layout.html')
@section('title', 'Administration - Liste des blocs')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="table-responsive">
        <a href="{!! url('admin/tank/add') !!}"
           class="btn btn-primary"
           id="toolbar"
           data-toggle="tooltip"
           data-placement="bottom"
           title="Ajouter un bloc">
            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
        </a>
        <table data-toggle="table"
               data-toolbar="#toolbar"
               data-toolbar-align="right"
               data-show-refresh="true"
               data-show-toggle="true"
               data-show-columns="true"
               data-search="true"
               data-search-on-enter-key="true"
               data-pagination="true"
               data-side-pagination="client"
               data-page-size="20"
               data-page-list="[10, 25, 50, 100, All]"
               data-show-export="true"
               data-row-style="stripped"
        >
            <thead>
            <tr>
                <th data-sortable="true">Numéro</th>
                <th data-sortable="true">Marque</th>
                <th data-sortable="true">Model</th>
                <th data-sortable="true">Taille</th>
                <th data-sortable="true">Etat</th>
                <th data-sortable="true">Propriètaire</th>
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
                    <td>{{$tank->tank_status->value}}</td>
                    <td>{{$tank->tank_owner->firstname}} {{$tank->tank_owner->lastname}}</td>
                    <td>
                        <input type="checkbox" id="borrowed"
                               name="borrowed"
                               @if (count($tank->users) != 0)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="borrowed">&nbsp;</label>
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
                        <form id="tank" name="tank" method="post" action="{{url('return/tank')}}">
                            @if (count($tank->users) != 0)
                            <input type="hidden" name="tank_id" value="{{$tank->id}}">
                            <input type="hidden" name="user_id" value="{{$tank->users[0]->id}}">
                            @endif
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                @if (count($tank->users) != 0)
                                <button class="btn btn-default fa-color-success"
                                        type="submit"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Rendre le bloc">
                                    <span class="fa fa-sign-out" aria-hidden="true"></span>
                                </button>
                                @endif
                                <a href="{!! url('admin/tank/edit/'.$tank->id) !!}"
                                   class="btn btn-default fa-color-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editer le bloc">
                                    <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                                </a>
                                <a href="{!! url('admin/tank/destroy/'.$tank->id) !!}"
                                   data-method="DELETE"
                                   data-csrf="{!! csrf_token() !!}"
                                   class="btn btn-default fa-color-danger rest"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Supprimer le bloc">
                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                </a>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection