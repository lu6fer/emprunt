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
            <!-- Stabs -->
            @foreach($user->stabs as $stab)
                <tr>
                    <td>Stab</td>
                    <td>{{$stab->numero}}</td>
                    <td>{{$stab->brand}} - {{$stab->model}} - {{$stab->size}}</td>
                    <td>{!! date('d/m/Y', strtotime($stab->pivot->created_at)) !!}</td>
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
                    <td>{{$regulator->numero}}</td>
                    <td>{{$regulator->brand}} - {{$regulator->model}} - {{$regulator->type}}</td>
                    <td>{!! date('d/m/Y', strtotime($regulator->pivot->create_at)) !!} {!! dd($regulator->pivot->create_at) !!}</td>
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
            <!-- Blocks -->
            @foreach($user->blocks as $block)
                <tr>
                    <td>Bloc</td>
                    <td>{{$block->numero}}</td>
                    <td>{{$block->brand}} - {{$block->model}} - {{$block->size}}</td>
                    <td>{!! date('d/m/Y', strtotime($block->pivot->create_at)) !!}</td>
                    <td>{{ $block->pivot->duration }}</td>
                    <td>
                        <form name="block" method="post" action="{{url('return/block')}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="block_id" value="{{$block->id}}">
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
            <!-- New Line -->
                <tr class="new-borrow">
                    <td>
                        <form id="device" name="device" method="post" action="{{url('borrow/device')}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            {!! csrf_field() !!}
                        </form>
                        <select form="device" title="types" id="types" name="type" class="device">
                            <option value="block">Bloc</option>
                            <option value="regulator">Détendeur</option>
                            <option value="stab">Stab</option>
                        </select>
                    </td>
                    <td>
                        <div id="stab" class="device">
                            <select form="device" title="stabs" name="stab_id">
                                @foreach($stabs as $stab)
                                    <option value="{{$stab->id}}">[{{$stab->numero}}] {{$stab->brand}} - {{$stab->model}} - {{$stab->size}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="regulator" class="device">
                            <select form="device" title="regulator" name="regulator_id">
                                @foreach($regulators as $regulator)
                                    <option value="{{$regulator->id}}">[{{$regulator->numero}}] {{$regulator->brand}} - {{$regulator->model}} - {{$regulator->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="block" class="device">
                            <select form="device" title="block" name="block_id">
                                @foreach($blocks as $block)
                                    <option value="{{$block->id}}">[{{$block->numero}}] {{$block->brand}} - {{$block->model}} - {{$block->size}}</option>
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
