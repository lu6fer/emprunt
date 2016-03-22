@extends('layout.html')
@section('title', 'Administration - Liste des blocs')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <h1 class="text-center">[{{$tank->number}}] {{$tank->brand}} - {{$tank->model}} - {{$tank->size}}</h1>
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
           data-row-style="stripped">
        <thead>
        <tr>
            <th data-sortable="true">Date inspection</th>
            <th data-sortable="true">Type</th>
            <th data-sortable="true">Prochaine inspection</th>
            <th data-sortable="true">Prochaine requalification</th>
            <th data-sortable="true">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tank->tivs as $index => $tiv)
            <tr>
                <td>{!! date('d/m/Y', strtotime($tiv->review_date)) !!}</td>
                <td>{{ $tiv->review->value }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection