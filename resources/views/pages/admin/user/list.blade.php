@extends('layout.html')
@section('title', 'Administration - Liste des utilisateurs')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="table-responsive">
        <a href="{!! url('admin/user/add') !!}"
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
        >
            <thead>
            <tr>
                <th data-sortable="true" rowspan="2" data-valign="middle">Prénom</th>
                <th data-sortable="true" rowspan="2" data-valign="middle">Nom</th>
                <th data-sortable="true" rowspan="2" data-valign="middle">Email</th>
                <th data-sortable="true" rowspan="2" data-valign="middle">Téléphone <br>
                    <small>fixe / mobile / Professionnel</small>
                </th>
                <th data-sortable="true" rowspan="2" data-valign="middle">Actif</th>
                <th data-sortable="true" colspan="3">Emprunt</th>
                <th data-sortable="true" rowspan="2" data-valign="middle">Actions</th>
            </tr>
            <tr>
                <th data-sortable="true">Bloc</th>
                <th data-sortable="true">Détendeur</th>
                <th data-sortable="true">Stab</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $users as $user)
                <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        {{$user->phone_fix}} /
                        {{$user->phone_mob}} /
                        {{$user->phone_work}}
                    </td>
                    <td>
                        <input type="checkbox" id="active"
                               name="active"
                               @if ($user->active == 1)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="active">&nbsp;</label>
                    </td>
                    <td>
                        <input type="checkbox" id="tank"
                               name="tank"
                               @if ($user->tank == 1)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="tank">&nbsp;</label>
                    </td>
                    <td>
                        <input type="checkbox" id="regulator"
                               name="regulator"
                               @if ($user->regulator == 1)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="regulator">&nbsp;</label>
                    </td>
                    <td>
                        <input type="checkbox" id="stab"
                               name="stab"
                               @if ($user->stab == 1)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="stab">&nbsp;</label>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            <a href="{!! url('admin/user/edit/'.$user->id) !!}"
                               class="btn btn-default fa-color-primary"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editer l'utilisateur">
                                <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                            </a>
                            <a href="{!! url('admin/user/destroy/'.$user->id) !!}"
                               data-method="DELETE"
                               data-csrf="{!! csrf_token() !!}"
                               class="btn btn-default fa-color-danger rest"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Supprimer l'utilisateur">
                                <span class="fa fa-trash" aria-hidden="true"></span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection