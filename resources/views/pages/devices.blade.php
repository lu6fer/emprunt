@extends('layout.html')
@section('title', 'Materiels')
@section('content')

    <h1>Détendeurs</h1>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Marque</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Actif</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devices['regulators'] as $regulator)
                    <tr>
                        <th>{{$regulator->numero}}</th>
                        <th>{{$regulator->brand}}</th>
                        <th>{{$regulator->model}}</th>
                        <th>{{$regulator->type}}</th>
                        <th><input type="checkbox" checked="@if ($regulator->active == true) checked @endif" disabled></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h1>Stabs</h1>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Numéro</th>
                <th>Marque</th>
                <th>Model</th>
                <th>Taille</th>
                <th>Actif</th>
            </tr>
            </thead>
            <tbody>
            @foreach($devices['stabs'] as $regulator)
                <tr>
                    <th>{{$regulator->numero}}</th>
                    <th>{{$regulator->brand}}</th>
                    <th>{{$regulator->model}}</th>
                    <th>{{$regulator->size}}</th>
                    <th><input type="checkbox" checked="@if ($regulator->active == true) checked @endif" disabled></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <h1>Bloc</h1>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Numéro</th>
                <th>Marque</th>
                <th>Model</th>
                <th>Taille</th>
                <th>Actif</th>
            </tr>
            </thead>
            <tbody>
            @foreach($devices['blocks'] as $regulator)
                <tr>
                    <th>{{$regulator->numero}}</th>
                    <th>{{$regulator->brand}}</th>
                    <th>{{$regulator->model}}</th>
                    <th>{{$regulator->size}}</th>
                    <th><input type="checkbox" checked="@if ($regulator->active == true) checked @endif" disabled></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection