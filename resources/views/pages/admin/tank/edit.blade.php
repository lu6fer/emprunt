@extends('layout.html')
@section('title', 'Administration - Edition')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="tank_edit"
                  action="{!! url('admin/tank/store') !!}"
                  method="post"
                  class="form-horizontal">
                <fieldset>
                    <legend>Déscription</legend>
                    <!-- Number -->
                    <div class="form-group {!! $errors->has('number') ? 'has-error' :'' !!}">
                        <label for="number" class="col-sm-2 control-label">Numéro</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control"
                                   name="number" id="number"
                                   placeholder="Numéro"
                                   value="{!! old('number') ? old('number') : $tank->number !!}"
                                   aria-describedby="number_error">
                        <span id="number_error" class="help-block">
                            {!! $errors->first('number') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Brand -->
                    <div class="form-group {!! $errors->has('brand') ? 'has-error' :'' !!}">
                        <label for="brand" class="col-sm-2 control-label">Marque</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="brand" id="brand"
                                   placeholder="Marque"
                                   value="{!! old('brand') ? old('brand') : $tank->brand !!}"
                                   aria-describedby="brand_error">
                        <span id="brand_error" class="help-block">
                            {!! $errors->first('brand') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Model -->
                    <div class="form-group {!! $errors->has('model') ? 'has-error' :'' !!}">
                        <label for="model" class="col-sm-2 control-label">Modèle</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="model" id="model"
                                   placeholder="Modèle"
                                   value="{!! old('model') ? old('model') : $tank->model !!}"
                                   aria-describedby="model_error">
                        <span id="model_error" class="help-block">
                            {!! $errors->first('model') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Size -->
                    <div class="form-group {!! $errors->has('size') ? 'has-error' :'' !!}">
                        <label for="size" class="col-sm-2 control-label">Taille</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="size"
                                   id="size" placeholder="Taille"
                                   value="{!! old('size') ? old('size') : $tank->size !!}"
                                   aria-describedby="size_error">
                        <span id="size_error" class="help-block">
                            {!! $errors->first('size') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Achat</legend>
                    <!-- buy[maker] -->
                    <div class="form-group {!! $errors->has('buy[maker]') ? 'has-error' :'' !!}">
                        <label for="buy[maker]" class="col-sm-2 control-label">Fabriquant</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="buy[maker]"
                                   id="buy[maker]" placeholder="Fabriquant"
                                   value="{!! old('buy[maker]') ? old('buy[maker]') : $tank->buy->maker !!}"
                                   aria-describedby="size_error">
                        <span id="size_error" class="help-block">
                            {!! $errors->first('buy.maker') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>T.I.V</legend>
                    <!-- Valve serial number -->
                    <div class="form-group {!! $errors->has('sn_valve') ? 'has-error' :'' !!}">
                        <label for="sn_valve" class="col-sm-2 control-label">N° série robineterie</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="sn_valve" id="sn_valve"
                                   placeholder="Robinet"
                                   value="{!! old('sn_valve') ? old('sn_valve') : $tank->sn_valve !!}"
                                   aria-describedby="sn_valve_error">
                        <span id="sn_valve_error" class="help-block">
                            {!! $errors->first('sn_valve') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Cylinder serial number -->
                    <div class="form-group {!! $errors->has('sn_cylinder') ? 'has-error' :'' !!}">
                        <label for="sn_cylinder" class="col-sm-2 control-label">N° série fût</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="sn_cylinder" id="sn_cylinder"
                                   placeholder="Fût"
                                   value="{!! old('sn_cylinder') ? old('sn_cylinder') : $tank->sn_cylinder !!}"
                                   aria-describedby="sn_cylinder_error">
                        <span id="sn_cylinder_error" class="help-block">
                            {!! $errors->first('sn_cylinder') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Test pressure -->
                    <div class="form-group {!! $errors->has('test_pressure') ? 'has-error' :'' !!}">
                        <label for="test_pressure" class="col-sm-2 control-label">Pression d'éssai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="test_pressure" id="test_pressure"
                                   placeholder="Préssion d'éssai"
                                   value="{!! old('test_pressure') ? old('test_pressure') : $tank->test_pressure !!}"
                                   aria-describedby="test_pressure_error">
                        <span id="test_pressure_error" class="help-block">
                            {!! $errors->first('test_pressure') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Operating pressure -->
                    <div class="form-group {!! $errors->has('operating_pressure') ? 'has-error' :'' !!}">
                        <label for="operating_pressure" class="col-sm-2 control-label">Pression de service</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="operating_pressure" id="operating_pressure"
                                   placeholder="Préssion de service"
                                   value="{!! old('operating_pressure') ? old('operating_pressure') : $tank->operating_pressure !!}"
                                   aria-describedby="operating_pressure_error">
                        <span id="operating_pressure_error" class="help-block">
                            {!! $errors->first('operating_pressure') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Usage -->
                    <div class="form-group {!! $errors->has('usage') ? 'has-error' :'' !!}">
                        <label for="usage" class="col-sm-2 control-label">Utilisation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="usage" id="usage"
                                   placeholder="Utilisation"
                                   value="{!! old('usage') ? old('usage') : $tank->usage !!}"
                                   aria-describedby="usage_error">
                        <span id="usage_error" class="help-block">
                            {!! $errors->first('usage') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Informations</legend>
                    <!-- Owner -->
                    <div class="form-group {!! $errors->has('owner') ? 'has-error' :'' !!}">
                        <label for="owner" class="col-sm-2 control-label">Propriètaire</label>
                        <div class="col-sm-10">
                            <select name="owner_id" id="owner_id"
                                    aria-describedby="owner_error"
                                    class="form-control">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}"
                                            @if($user->id == $tank->owner->id)
                                            selected="selected"
                                            @endif
                                            name="owner"
                                            id="owner">
                                        {{$user->firstname}} {{$user->lastname}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="owner_error" class="help-block">
                            {!! $errors->first('owner') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="form-group {!! $errors->has('status') ? 'has-error' :'' !!}">
                        <label for="status" class="col-sm-2 control-label">Statut</label>
                        <div class="col-sm-10">
                            <select name="status_id" id="status_id"
                                    aria-describedby="status_error"
                                    class="form-control">
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}"
                                            @if($status->id == $tank->status->id)
                                            selected="selected"
                                            @endif>
                                        {{$status->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="status_error" class="help-block">
                            {!! $errors->first('status') !!}
                        </span>
                        </div>
                    </div>
                    <!-- Borrowable -->
                    <div class="form-group {!! $errors->has('borrowable') ? 'has-error' :'' !!}">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="checkbox" id="borrowable"
                                   name="borrowable"
                                   @if ($tank->borrowable)
                                   checked="checked"
                                   @endif
                                   aria-describedby="borrowable_error">
                            <label for="borrowable">Empruntable</label>
                        <span id="borrowable_error" class="help-block">
                            {!! $errors->first('borrowable') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <!-- ID -->
                <input type="hidden" name="id" id="id" value="{{$tank->id}}">
                <!-- CSRF -->
                {!! csrf_field() !!}
                <!-- Submit -->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection