@extends('layout.html')
@section('title', 'Materiels')
@section('content')
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#blocks" aria-controls="blocks" role="tab" data-toggle="tab">Blocs</a></li>
            <li role="presentation"><a href="#regulators" aria-controls="regulators" role="tab" data-toggle="tab">Détendeurs</a></li>
            <li role="presentation"><a href="#stabs" aria-controls="stabs" role="tab" data-toggle="tab">Stabs</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade   in active" id="blocks">
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
                        @foreach($tanks as $tank)
                            <tr>
                                <td>{{$tank->number}}</td>
                                <td>{{$tank->brand}}</td>
                                <td>{{$tank->model}}</td>
                                <td>{{$tank->size}}</td>
                                <td>
                                    <div class="form-group login-group-checkbox">
                                        <input type="checkbox"
                                               id="borrowed"
                                               name="borrowed"
                                               @if (count($tank->users) != 0) checked="checked" @endif
                                               disabled>
                                        <label for="borrowed">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    @if (count($tank->users) != 0)
                                        <form name="block" method="post" action="{{url('return/tank')}}">
                                            <input type="hidden" name="tank_id" value="{{$tank->id}}">
                                            <input type="hidden" name="user_id" value="{{$tank->users[0]->id}}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-default btn-sm"
                                                    type="submit"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Rendre le bloc">
                                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="regulators">
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
                            <tr>
                                <td>{{$regulator->number}}</td>
                                <td>{{$regulator->brand}}</td>
                                <td>{{$regulator->model}}</td>
                                <td>{{$regulator->type}}</td>
                                <td>
                                    <input title="borrow" type="checkbox" @if (count($regulator->users) != 0) checked="checked" @endif disabled>
                                </td>
                                <td>
                                @if (count($regulator->users) != 0)
                                    <form name="regulator" method="post" action="{{url('return/regulator')}}">
                                        <input type="hidden" name="regulator_id" value="{{$regulator->id}}">
                                        <input type="hidden" name="user_id" value="{{$regulator->users[0]->id}}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-default btn-sm"
                                                type="submit"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Rendre le détendeur">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                        </button>
                                    </form>
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
                            <tr>
                                <td>{{$stab->number}}</td>
                                <td>{{$stab->brand}}</td>
                                <td>{{$stab->model}}</td>
                                <td>{{$stab->size}}</td>
                                <td>
                                    <input title="borrow" type="checkbox" @if (count($stab->users) != 0) checked="checked" @endif disabled>
                                </td>
                                <td>
                                @if (count($stab->users) != 0)
                                    <form name="stab" method="post" action="{{url('return/stab')}}">
                                        <input type="hidden" name="stab_id" value="{{$stab->id}}">
                                        <input type="hidden" name="user_id" value="{{$stab->users[0]->id}}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-default btn-sm"
                                                type="submit"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Rendre la stab">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                        </button>
                                    </form>
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
