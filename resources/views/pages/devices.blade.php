@extends('layout.html')
@section('title', 'Materiels')
@section('content')
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#regulators" aria-controls="regulators" role="tab" data-toggle="tab">Détendeurs</a></li>
            <li role="presentation"><a href="#stabs" aria-controls="stabs" role="tab" data-toggle="tab">Stabs</a></li>
            <li role="presentation"><a href="#blocks" aria-controls="blocks" role="tab" data-toggle="tab">Blocs</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="regulators">
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
                                <th data-sortable="true">Marque</th>
                                <th data-sortable="true">Model</th>
                                <th data-sortable="true">Type</th>
                                <th data-sortable="true">Emprunté</th>
                                <th data-sortable="true">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($regulators as $regulator)
                            <tr class="clickable-row" data-href="{{url('regulator/' . $regulator->id)}}">
                                <td>{{$regulator->numero}}</td>
                                <td>{{$regulator->brand}}</td>
                                <td>{{$regulator->model}}</td>
                                <td>{{$regulator->type}}</td>
                                <td>
                                    <input title="borrow" type="checkbox" @if ($regulator->borrow == true) checked="" @endif disabled>
                                </td>
                                <td>
                                @if ($regulator->borrow == true)
                                    <a href="#"
                                       class="btn btn-default"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Rendre le détendeur">
                                        <span class="glyphicon glyphicon-log-out"></span>
                                    </a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="stabs">
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
                                <th data-sortable="true">Marque</th>
                                <th data-sortable="true">Model</th>
                                <th data-sortable="true">Taille</th>
                                <th data-sortable="true">Emprunté</th>
                                <th data-sortable="true">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($stabs as $stab)
                            <tr class="clickable-row" data-href="{{url('stab/' . $stab->id)}}">
                                <td>{{$stab->numero}}</td>
                                <td>{{$stab->brand}}</td>
                                <td>{{$stab->model}}</td>
                                <td>{{$stab->size}}</td>
                                <td>
                                    <input title="borrow" type="checkbox" @if ($stab->borrow == true) checked="" @endif disabled>
                                </td>
                                <td>
                                @if ($stab->borrow == true)
                                    <a href="#"
                                       class="btn btn-default"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Rendre la stab">
                                        <span class="glyphicon glyphicon-log-out"></span>
                                    </a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="blocks">
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
                                <th data-sortable="true">Marque</th>
                                <th data-sortable="true">Model</th>
                                <th data-sortable="true">Taille</th>
                                <th data-sortable="true">Emprunté</th>
                                <th data-sortable="true">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $block)
                            <tr class="clickable-row" data-href="{{url('block/' . $block->id)}}">
                                <td>{{$block->numero}}</td>
                                <td>{{$block->brand}}</td>
                                <td>{{$block->model}}</td>
                                <td>{{$block->size}}</td>
                                <td>
                                    <input title="borrow" type="checkbox" @if ($block->borrow == true) checked="" @endif disabled>
                                </td>
                                <td>
                                @if ($block->borrow == true)
                                    <a href="#"
                                       class="btn btn-default"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Rendre le bloc">
                                        <span class="glyphicon glyphicon-log-out"></span>
                                    </a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection