@extends('layout.html')
@section('title', 'Administration - Edition')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    {!! dd($tank->owner) !!}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="tank_edit"
                  url="{!! url('admin/tank/edit/'.$tank->id) !!}"
                  method="post"
                  class="form-horizontal">
                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label">Numéro</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="number" id="number" placeholder="Numéro" value="{{$tank->number}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand" class="col-sm-2 control-label">Marque</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="brand" id="brand" placeholder="Marque" value="{{$tank->brand}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="model" class="col-sm-2 control-label">Modèle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="model" id="model" placeholder="Modèle" value="{{$tank->model}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="size" class="col-sm-2 control-label">Taille</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="size" id="size" placeholder="Taille" value="{{$tank->size}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sn_valve" class="col-sm-2 control-label">Numéro de serie - robinet</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sn_valve" id="sn_valve" placeholder="Robinet" value="{{$tank->sn_valve}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sn_cylinder" class="col-sm-2 control-label">Numéro de série - fût</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sn_valve" id="sn_valve" placeholder="Fût" value="{{$tank->sn_valve}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="limit_pressure" class="col-sm-2 control-label">Taille</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="limit_pressure" id="limit_pressure" placeholder="Taille" value="{{$tank->limit_pressure}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="size" class="col-sm-2 control-label">Préssion de test</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="size" id="size" placeholder="Préssion de test" value="{{$tank->size}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="usage" class="col-sm-2 control-label">Gaz</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="usage" id="usage" placeholder="Gaz" value="{{$tank->usage}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="owner" class="col-sm-2 control-label">Propriétaire</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="owner" id="owner" placeholder="Propriétaire" value="{{$tank->owner}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="checkbox" id="borrowable" name="borrowable" @if (count($tank->borrowable)) checked="checked" @endif>
                        <label for="borrowable">Empruntable</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection