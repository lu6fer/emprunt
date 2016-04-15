@extends('layout.html')
@section('title', 'Administration - Liste des blocs')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    {{--{!! dd($tank) !!}--}}
    <h1 class="text-center">[{{$tank->number}}] {{$tank->brand}} - {{$tank->model}} - {{$tank->size}}</h1>
    <a href="{!! url('admin/tank/tiv/add/'.$tank->id) !!}"
       class="btn btn-primary"
       id="toolbar"
       data-toggle="tooltip"
       data-placement="bottom"
       title="Ajouter une inspection">
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
           data-row-style="stripped">
        <thead>
        <tr>
            <th data-sortable="true">Date inspection</th>
            <th data-sortable="true">Type</th>
            <th data-sortable="true">Statut</th>
            <th data-sortable="true">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tank->tivs as $index => $tiv)
            <tr>
                <td>{{ $tiv->review_date->format('d/m/Y') }}</td>
                <td>{{ $tiv->review->value }}</td>
                <td>{{ $tiv->review_status->value }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <a href="{!! url('admin/tank/tiv/detail/'.$tiv->id) !!}"
                           data-method="GET"
                           data-csrf="{!! csrf_token() !!}"
                           class="btn btn-default rest"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Détails">
                            <span class="fa fa-info" aria-hidden="true"></span>
                        </a>
                        @if ($tiv->review_status->id != '88')
                        <a href="{!! url('admin/tank/tiv/edit/'.$tiv->id) !!}"
                           class="btn btn-default fa-color-primary rest"
                           data-method="GET"
                           data-csrf="{!! csrf_token() !!}"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Editer">
                            <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                        </a>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection