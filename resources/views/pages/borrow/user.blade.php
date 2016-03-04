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
                    <td>{!! date('d/m/Y', strtotime($stab->pivot->borrow)) !!}</td>
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
                    <td>{!! date('d/m/Y', strtotime($regulator->pivot->borrow)) !!}</td>
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
                                    title="Rendre la stab">
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
                    <td>{!! date('d/m/Y', strtotime($block->pivot->borrow)) !!}</td>
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
                                    title="Rendre la stab">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- New Line -->
            <tr class="new-borrow">
                <td>
                    <form name="types">
                        <select title="types" id="types">
                            <option value="blocks">Bloc</option>
                            <option value="regulators">Détendeur</option>
                            <option value="stabs">Stab</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form name="stabs" id="stabs" class="device">
                        <select title="stabs">
                            @foreach($stabs as $stab)
                                <option value="{{$stab->id}}">[{{$stab->numero}}] {{$stab->brand}} - {{$stab->model}} - {{$stab->size}}</option>
                            @endforeach
                        </select>
                    </form>
                    <form name="regulators" id="regulators" class="device">
                        <select title="stabs">
                            @foreach($regulators as $regulator)
                                <option value="{{$regulator->id}}">[{{$regulator->numero}}] {{$regulator->brand}} - {{$regulator->model}} - {{$regulator->type}}</option>
                            @endforeach
                        </select>
                    </form>
                    <form name="blocks" id="blocks" class="device">
                        <select title="block">
                            @foreach($blocks as $block)
                                <option value="{{$block->id}}">[{{$block->numero}}] {{$block->brand}} - {{$block->model}} - {{$block->size}}</option>
                            @endforeach
                        </select>
                    </form>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a class="btn btn-default" href="">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
