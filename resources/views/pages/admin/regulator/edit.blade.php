@extends('layout.html')
@section('title', 'Administration - Edition')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="tank_edit"
                  action="{!! url('admin/regulator/store') !!}"
                  method="post"
                  class="form-horizontal">
                <!-- Number -->
                <div class="form-group {!! $errors->has('number') ? 'has-error' :'' !!}">
                    <label for="number" class="col-sm-2 control-label">Numéro</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control"
                               name="number" id="number"
                               placeholder="Numéro"
                               value="{!! old('number') ? old('number') : $regulator->number !!}"
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
                               value="{!! old('brand') ? old('brand') : $regulator->brand !!}"
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
                               value="{!! old('model') ? old('model') : $regulator->model !!}"
                               aria-describedby="model_error">
                        <span id="model_error" class="help-block">
                            {!! $errors->first('model') !!}
                        </span>
                    </div>
                </div>
                <!-- Type -->
                <div class="form-group {!! $errors->has('type') ? 'has-error' :'' !!}">
                    <label for="type" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="type"
                               id="type" placeholder="Description"
                               value="{!! old('type') ? old('type') : $regulator->type !!}"
                               aria-describedby="type_error">
                        <span id="type_error" class="help-block">
                            {!! $errors->first('type') !!}
                        </span>
                    </div>
                </div>
                <!-- 1st stage serial number -->
                <div class="form-group {!! $errors->has('sn_stage_1') ? 'has-error' :'' !!}">
                    <label for="sn_stage_1" class="col-sm-2 control-label">N° série 1er étage</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="sn_stage_1" id="sn_stage_1"
                               placeholder="1er étage"
                               value="{!! old('sn_stage_1') ? old('sn_stage_1') : $regulator->sn_stage_1 !!}"
                               aria-describedby="sn_stage_1_error">
                        <span id="sn_stage_1_error" class="help-block">
                            {!! $errors->first('sn_stage_1') !!}
                        </span>
                    </div>
                </div>
                <!-- 2nd stage serial number -->
                <div class="form-group {!! $errors->has('sn_stage_2') ? 'has-error' :'' !!}">
                    <label for="sn_cylinder" class="col-sm-2 control-label">N° série 2ème étage</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="sn_stage_2" id="sn_stage_2"
                               placeholder="2ème étage"
                               value="{!! old('sn_stage_2') ? old('sn_stage_2') : $regulator->sn_stage_2 !!}"
                               aria-describedby="sn_stage_2_error">
                        <span id="sn_stage_2_error" class="help-block">
                            {!! $errors->first('sn_stage_2') !!}
                        </span>
                    </div>
                </div>
                <!-- Octopus serial number -->
                <div class="form-group {!! $errors->has('sn_stage_octo') ? 'has-error' :'' !!}">
                    <label for="sn_stage_octo" class="col-sm-2 control-label">N° série octopus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="sn_stage_octo" id="sn_stage_octo"
                               placeholder="N° série octopus"
                               value="{!! old('test_pressure') ? old('test_pressure') : $regulator->sn_stage_octo !!}"
                               aria-describedby="sn_stage_octo_error">
                        <span id="sn_stage_octo_error" class="help-block">
                            {!! $errors->first('sn_stage_octo') !!}
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
                               value="{!! old('usage') ? old('usage') : $regulator->usage !!}"
                               aria-describedby="usage_error">
                        <span id="usage_error" class="help-block">
                            {!! $errors->first('usage') !!}
                        </span>
                    </div>
                </div>
                <!-- Owner -->
                <div class="form-group {!! $errors->has('owner') ? 'has-error' :'' !!}">
                    <label for="owner" class="col-sm-2 control-label">Propriètaire</label>
                    <div class="col-sm-10">
                        <select title="tank" name="owner"
                                id="owner" aria-describedby="owner_error"
                                class="form-control">
                            @foreach($users as $user)
                                <option value="{{$user->id}}"
                                        @if($user->id == $regulator->regulator_owner->id)
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
                    <label for="status" class="col-sm-2 control-label">Propriètaire</label>
                    <div class="col-sm-10">
                        <select title="tank" name="status"
                                id="status" aria-describedby="status_error"
                                class="form-control">
                            @foreach($statuses as $status)
                                <option value="{{$user->id}}"
                                        @if($status->id == $regulator->regulator_status->id)
                                        selected="selected"
                                        @endif
                                        name="owner"
                                        id="owner">
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
                               @if ($regulator->borrowable)
                               checked="checked"
                               @endif
                               aria-describedby="borrowable_error">
                        <label for="borrowable">Empruntable</label>
                        <span id="borrowable_error" class="help-block">
                            {!! $errors->first('borrowable') !!}
                        </span>
                    </div>
                </div>
                <!-- ID -->
                <input type="hidden" name="id" id="id" value="{{$regulator->id}}">
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