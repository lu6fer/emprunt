@extends('layout.html')
@section('title', 'Administration - Edition')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    {{--'number' => '626',
    'borrowable' => false,
    'brand' => 'Vieux plongeur',
    'model' => 'mono - 2 sorties',
    'size'  => '13.5l',
    'sn_valve' => '2003',
    'sn_cylinder' => '67606',
    'limit_presure' => '348',
    'use_presure' => '232',
    'usage' => 'Air',
    'owner'--}}
    <form name="tank_edit"
          url="{!! url('admin/tank/edit/'.$tank->id) !!}"
          method="post"
          class="form-horizontal">
        <label for="number" class="col-sm-2 control-label">Numéro</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="number" id="number" placeholder="Numéro" value="{{$tank->number}}">
        </div>
        <label for="brand" class="col-sm-2 control-label">Marque</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="brand" id="brand" placeholder="Marque" value="{{$tank->brand}}">
        </div>
        <label for="model" class="col-sm-2 control-label">Modèle</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="model" id="model" placeholder="Modèle" value="{{$tank->model}}">
        </div>
        <label for="size" class="col-sm-2 control-label">Taille</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="size" id="size" placeholder="Taille" value="{{$tank->size}}">
        </div>
    </form>
@endsection