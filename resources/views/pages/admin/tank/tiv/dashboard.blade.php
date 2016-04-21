@extends('layout.html')
@section('title', 'Administration - T.I.V')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
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
           data-row-style="tivRowStyle">
        <thead>
        <tr>
            <th data-sortable="true">Bloc</th>
            <th data-sortable="true">Propriétaire</th>
            <th data-sortable="true">Date prochaine inspection</th>
            <th data-sortable="true">Date prochaine requalification</th>
            <th data-sortable="true">Date dernière inspection</th>
            <th data-sortable="true">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tivs as $tiv)
        <tr>
            <td>[{{$tiv->tank->number}}] {{$tiv->tank->brand}} - {{$tiv->tank->model}} - {{$tiv->tank->size}}</td>
            <td>{{$tiv->tank->owner->firstname}} {{$tiv->tank->owner->lastname}}</td>
            <td>{!! date("d/m/Y", strtotime("+1 years", strtotime($tiv->review_date))) !!}</td>
            <td>@if(isset($tiv->next_test_date)){{$tiv->next_test_date->format('d/m/Y')}}@endif</td>
            <td>{{$tiv->review_date->format('d/m/Y')}}</td>
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
                    @if ($tiv->review_status->id != '88' || $tiv->decision->id != 96)
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
    <script>
    </script>
@endsection