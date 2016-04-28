@extends('layout.html')
@section('title', 'Administration - Historique des achats')
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
                <th data-sortable="true">Date d'achat</th>
                <th data-sortable="true">Prix d'achat</th>
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
                    @if($stab->buy != null)
                    <td>{{$stab->buy->date->format('d/m/Y')}}</td>
                    <td>{{$stab->buy->price}}&nbsp;&euro;</td>
                    @endif
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            <a href="{!! url('admin/stab/edit/'.$stab->id) !!}"
                               class="btn btn-default fa-color-primary"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editer la stab">
                                <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                            </a>
                            <a href="{!! url('admin/stab/destroy/'.$stab->id) !!}"
                               data-method="DELETE"
                               data-csrf="{!! csrf_token() !!}"
                               class="btn btn-default fa-color-danger rest"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Supprimer la stab">
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