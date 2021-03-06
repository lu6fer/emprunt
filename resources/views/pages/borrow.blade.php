@extends('layout.html')
@section('title', $user->firstname.' '.$user->lastname)
@section('content')
    <h1>{{$user->firstname}} {{$user->lastname}}</h1>
    <div class="table-responsive">
        <table data-class="table table-hover table-striped"
               data-toggle="table"
               data-flat="true"
               data-search="true"
               data-show-columns="true"
               data-show-multi-sort="true">
            <thead>
            <tr>
                <th data-sortable="true">Type</th>
                <th data-sortable="true">Numéro</th>
                <th data-sortable="true">Information</th>
                <th data-sortable="true">Date emprunt</th>
                <th data-sortable="true">Jours d'emprunt</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <!-- Tanks -->
            @foreach($user->tanks as $tank)
            <tr>
                <td>Bloc</td>
                <td>{{$tank->number}}</td>
                <td>{{$tank->brand}} - {{$tank->model}} - {{$tank->size}}</td>
                <td>{!! date('d/m/Y', strtotime($tank->pivot->borrow_date)) !!}</td>
                <td>{{ $tank->pivot->duration }}</td>
                <td>
                    <form name="block" method="post" action="{{url('return/tank')}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="hidden" name="block_id" value="{{$tank->id}}">
                        {{ csrf_field() }}
                        <button class="btn btn-default"
                                type="submit"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Rendre le bloc">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <!-- Stabs -->
            @foreach($user->stabs as $stab)
                <tr>
                    <td>Stab</td>
                    <td>{{$stab->number}}</td>
                    <td>{{$stab->brand}} - {{$stab->model}} - {{$stab->size}}</td>
                    <td>{!! date('d/m/Y', strtotime($stab->pivot->borrow_date)) !!}</td>
                    <td>{{ $stab->pivot->duration }}</td>
                    <td>
                        <form name="stab" method="post" action="{{url('return/stab')}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="stab_id" value="{{$stab->id}}">
                            {{ csrf_field() }}
                            <button class="btn btn-default"
                                    type="submit"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Rendre la stab">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- Regulators -->
            @foreach($user->regulators as $regulator)
                <tr>
                    <td>Détendeur</td>
                    <td>{{$regulator->number}}</td>
                    <td>{{$regulator->brand}} - {{$regulator->model}} - {{$regulator->type}}</td>
                    <td>{!! date('d/m/Y', strtotime($regulator->pivot->borrow_date)) !!}</td>
                    <td>{{ $regulator->pivot->duration }}</td>
                    <td>
                        <form name="regulator" method="post" action="{{url('return/regulator')}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="regulator_id" value="{{$regulator->id}}">
                            {{ csrf_field() }}
                            <button class="btn btn-default"
                                    type="submit"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Rendre le détendeur">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- New Line -->
                <tr class="new-borrow">
                    <td>
                        <form id="device" name="device" method="post" action="{{url('borrow/device')}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            {!! csrf_field() !!}
                        </form>
                        <select form="device" title="types" id="types" name="type" class="device">
                            @if($user->tank)<option value="tank">Bloc</option>@endif
                            @if($user->regulator)<option value="regulator">Détendeur</option>@endif
                            @if($user->stab)<option value="stab">Stab</option>@endif
                        </select>
                    </td>
                    <td>
                        <div id="stab" class="device">
                            <select form="device" title="stabs" name="stab_id">
                                @foreach($stabs as $stab)
                                    <option value="{{$stab->id}}">[{{$stab->number}}] {{$stab->brand}} - {{$stab->model}} - {{$stab->size}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="regulator" class="device">
                            <select form="device" title="regulator" name="regulator_id">
                                @foreach($regulators as $regulator)
                                    <option value="{{$regulator->id}}">[{{$regulator->number}}] {{$regulator->brand}} - {{$regulator->model}} - {{$regulator->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="tank" class="device">
                            <select form="device" title="tank" name="tank_id">
                                @foreach($tanks as $tank)
                                    <option value="{{$tank->id}}">[{{$tank->number}}] {{$tank->brand}} - {{$tank->model}} - {{$tank->size}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="btn btn-default" form="device"
                                type="submit"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Emprunter">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
@endsection
