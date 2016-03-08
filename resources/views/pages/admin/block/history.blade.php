@extends('layout.html')
@section('title', 'Administration - Historique des emprunts')
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
                <th data-sortable="true">Information</th>
                <th data-sortable="true">Emprunteur</th>
                <th data-sortable="true">Date d'emprunt</th>
                <th data-sortable="true">Date de retour</th>
                <th data-sortable="true">Durée de l'emprunt</th>
                <th data-sortable="true">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($history as $block)
                <tr>
                    <td>{{$block->device_number}}</td>
                    <td>{{$block->device_description}}</td>
                    <td>{{$block->user}}</td>
                    <td>{!! date('d/m/Y', strtotime($block->borrow_date)) !!}</td>
                    <td>{!! date('d/m/Y', strtotime($block->return_date)) !!}</td>
                    <td>{{$block->duration}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection