@extends('layout.html')
@section('title', 'Administration - Liste des détendeurs')
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
               data-show-multi-sort="true"
               data-side-pagination="client"
               data-page-number="1"
               data-page-list="[10, 25, 50, 100, All]"
               data-pagination-first-text="Début"
               data-pagination-pre-text="Previous"
               data-pagination-next-text="Next"
               data-pagination-last-text="Last">
            <thead>
            <tr>
                <th data-sortable="true">Numéro</th>
                <th data-sortable="true">Marque</th>
                <th data-sortable="true">Model</th>
                <th data-sortable="true">Description</th>
                <th data-sortable="true">Etat</th>
                <th data-sortable="true">Propriètaire</th>
                <th data-sortable="true">Emprunté</th>
                <th data-sortable="true">Emprunteur</th>
                <th data-sortable="true">Date d'emprunt</th>
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
                    <td>{{$regulator->regulator_status->value}}</td>
                    <td>{{$regulator->regulator_owner->firstname}} {{$regulator->regulator_owner->lastname}}</td>
                    <td>
                        <input type="checkbox" id="borrowed"
                               name="borrowed"
                               @if (count($regulator->users) != 0)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="borrowed"></label>
                    </td>
                    <td>
                        @if (count($regulator->users) != 0)
                            {{$regulator->users[0]->firstname}} {{$regulator->users[0]->lastname}}
                        @endif
                    </td>
                    <td>
                        @if (count($regulator->users) != 0)
                            {{$regulator->users[0]->pivot->borrow_date}}
                        @endif
                    </td>
                    <td>
                        <form id="regulator" name="regulator" method="post" action="{{url('return/regulator')}}">
                            @if (count($regulator->users) != 0)
                                <input type="hidden" name="regulator_id" value="{{$regulator->id}}">
                                <input type="hidden" name="user_id" value="{{$regulator->users[0]->id}}">
                            @endif
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                @if (count($regulator->users) != 0)
                                    <button class="btn btn-default"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Rendre le détendeur">
                                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                                    </button>
                                @endif
                                <a href="{!! url('admin/regulator/edit/'.$regulator->id) !!}" class="btn btn-default"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editer le détendeur">
                                    <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                                </a>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection