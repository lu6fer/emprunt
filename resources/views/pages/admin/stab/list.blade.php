@extends('layout.html')
@section('title', 'Administration - Liste des stabs')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="table-responsive">
        <a href="{!! url('admin/stab/add') !!}"
           class="btn btn-primary"
           id="toolbar"
           data-toggle="tooltip"
           data-placement="bottom"
           title="Ajouter une stab">
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
            @foreach($stabs as $stab)
                <tr>
                    <td>{{$stab->number}}</td>
                    <td>{{$stab->brand}}</td>
                    <td>{{$stab->model}}</td>
                    <td>{{$stab->size}}</td>
                    <td>{{$stab->status->value}}</td>
                    <td>{{$stab->owner->firstname}} {{$stab->owner->lastname}}</td>
                    <td>
                        <input type="checkbox" id="borrowed"
                               name="borrowed"
                               @if (count($stab->users) != 0)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="borrowed">&nbsp;</label>
                    </td>
                    <td>
                        @if (count($stab->users) != 0)
                            {{$stab->users[0]->firstname}} {{$stab->users[0]->lastname}}
                        @endif
                    </td>
                    <td>
                        @if (count($stab->users) != 0)
                            {{$stab->users[0]->pivot->borrow_date}}
                        @endif
                    </td>
                    <td>
                        <form id="tank" name="tank" method="post" action="{{url('return/stab')}}">
                            @if (count($stab->users) != 0)
                                <input type="hidden" name="stab_id" value="{{$stab->id}}">
                                <input type="hidden" name="user_id" value="{{$stab->users[0]->id}}">
                            @endif
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                @if (count($stab->users) != 0)
                                    <button class="btn btn-default fa-color-success"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Rendre la stab">
                                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                                    </button>
                                @endif
                                <a href="{!! url('admin/stab/edit/'.$stab->id) !!}"
                                   class="btn btn-default fa-color-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editer la stab">
                                    <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                                </a>
                                <a href="{!! url('admin/stab/destroy/'.$stab->id) !!}"
                                   data-method="delete"
                                   data-csrf="{!! csrf_token() !!}"
                                   class="btn btn-default fa-color-danger rest"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Supprimer la stab">
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