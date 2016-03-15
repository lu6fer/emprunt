@extends('layout.html')
@section('title', 'Administration - Historique des emprunts')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="table-responsive">
        <table data-toggle="table"
               data-show-refresh="true"
               data-show-toggle="true"
               data-show-columns="true"
               data-search="true"
               data-search-on-enter-key="true"
               data-pagination="true"
               data-side-pagination="client"
               data-page-size="20"
               data-page-list="[10, 25, 50, 100, All]"
               data-show-export="true">
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
            @foreach($history as $stab)
                <tr>
                    <td>{{$stab->device_number}}</td>
                    <td>{{$stab->device_description}}</td>
                    <td>{{$stab->user}}</td>
                    <td>{!! date('d/m/Y', strtotime($stab->borrow_date)) !!}</td>
                    <td>{!! date('d/m/Y', strtotime($stab->return_date)) !!}</td>
                    <td>{{$stab->duration}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection