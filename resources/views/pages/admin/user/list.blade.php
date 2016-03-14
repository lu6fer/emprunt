@extends('layout.html')
@section('title', 'Administration - Liste des blocs')
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
                <th data-sortable="true">Taille</th>
                <th data-sortable="true">Etat</th>
                <th data-sortable="true">Propriètaire</th>
                <th data-sortable="true">Emprunté</th>
                <th data-sortable="true">Emprunteur</th>
                <th data-sortable="true">Date d'emprunt</th>
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
                    <td>{{$tank->tank_status->value}}</td>
                    <td>{{$tank->tank_owner->firstname}} {{$tank->tank_owner->lastname}}</td>
                    <td>
                        <input type="checkbox" id="borrowed"
                               name="borrowed"
                               @if (count($tank->users) != 0)
                               checked="checked"
                               @endif
                               disabled>
                        <label for="borrowed"></label>
                    </td>
                    <td>
                        @if (count($tank->users) != 0)
                            {{$tank->users[0]->firstname}} {{$tank->users[0]->lastname}}
                        @endif
                    </td>
                    <td>
                        @if (count($tank->users) != 0)
                            {{$tank->users[0]->pivot->borrow_date}}
                        @endif
                    </td>
                    <td>
                        @if (count($tank->users) != 0)
                        <form id="block" name="block" method="post" action="{{url('return/tank')}}">
                            <input type="hidden" name="block_id" value="{{$tank->id}}">
                            <input type="hidden" name="user_id" value="{{$tank->users[0]->id}}">
                            {{ csrf_field() }}
                        </form>
                        @endif
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            @if (count($tank->users) != 0)
                            <button class="btn btn-default" form="block"
                                    type="submit"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Rendre le bloc">
                                <span class="fa fa-sign-out" aria-hidden="true"></span>
                            </button>
                            @endif
                            <a href="{!! url('admin/tank/edit/'.$tank->id) !!}" class="btn btn-default"
                               type="submit"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editer le bloc">
                                <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection