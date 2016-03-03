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
                        <a class="btn btn-default" href="{{url('return/' . $user->id . '/stab/' . $stab->id)}}">
                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                        </a>
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
                        <a class="btn btn-default"  href="{{url('return/' . $user->id . '/regulator/' . $regulator->id)}}">
                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                        </a>
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
                        <a class="btn btn-default" href="{{url('return/' . $user->id . '/block/' . $block->id)}}">
                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            <!-- New Line -->
            <tr>
                <td>
                    <select>
                        <option value="blocks">Bloc</option>
                        <option value="regulator">Détendeur</option>
                        <option value="stab">Stab</option>
                    </select>
                </td>
                <td>
                    <input type="number">
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