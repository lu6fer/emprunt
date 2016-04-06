@extends('layout.html')
@section('title', 'Administration - Edition')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="tank_add"
                  action="{!! url('admin/tank/create') !!}"
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
                                   value="{!! old('number') !!}"
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
                                   value="{!! old('brand') !!}"
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
                                   value="{!! old('model') !!}"
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
                                   value="{!! old('size') !!}"
                                   aria-describedby="size_error">
                            <span id="size_error" class="help-block">
                                {!! $errors->first('size') !!}
                            </span>
                        </div>
                    </div>
                    <!-- buy[maker] -->
                    <div class="form-group {!! $errors->has('buy[maker]') ? 'has-error' :'' !!}">
                        <label for="buy[maker]" class="col-sm-2 control-label">Fabriquant</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="buy[maker]"
                                   id="buy[maker]" placeholder="Fabriquant"
                                   value="{!! old('buy.maker') !!}"
                                   aria-describedby="size_error">
                        <span id="size_error" class="help-block">
                            {!! $errors->first('buy.maker') !!}
                        </span>
                        </div>
                    </div>
                    <!-- buy[thread_type] -->
                    <div class="form-group {!! $errors->has('buy.thread_type') ? 'has-error' :'' !!}">
                        <label for="buy[thread_type]" class="col-sm-2 control-label">Type filetage</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="buy[thread_type]"
                                   id="buy[thread_type]" placeholder="Type filetage"
                                   value="{!! old('buy.thread_type') !!}"
                                   aria-describedby="size_error">
                        <span id="size_error" class="help-block">
                            {!! $errors->first('buy.thread_type') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Achat</legend>
                    <!-- buy[shop] -->
                    <div class="form-group {!! $errors->has('buy.shop') ? 'has-error' :'' !!}">
                        <label for="buy.shop" class="col-sm-2 control-label">Fournisseur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="buy[shop]" id="buy.shop"
                                   placeholder="Fournisseur"
                                   value="{!! old('buy.shop') !!}"
                                   aria-describedby="buy.shop_error">
                        <span id="buy.shop_error" class="help-block">
                            {!! $errors->first('buy.shop') !!}
                        </span>
                        </div>
                    </div>
                    <!-- buy[date] -->
                    <div class="form-group {!! $errors->has('buy.date') ? 'has-error' :'' !!}">
                        <label for="buy.date" class="col-sm-2 control-label">Date d'achat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker"
                                   name="buy[date]" id="buy.date"
                                   placeholder="jj/mm/aaaa"
                                   value="{!! old('buy.date') !!}"
                                   aria-describedby="buy.date_error">
                        <span id="buy.date_error" class="help-block">
                            {!! $errors->first('buy.date') !!}
                        </span>
                        </div>
                    </div>
                    <!-- buy[price] -->
                    <div class="form-group {!! $errors->has('buy.price') ? 'has-error' :'' !!}">
                        <label for="buy.price" class="col-sm-2 control-label">Prix d'achat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="buy[price]"
                                   id="buy.price" placeholder="Prix d'achat"
                                   value="{!! old('buy.price') !!}"
                                   aria-describedby="buy.price_error">
                        <span id="buy.price_error" class="help-block">
                            {!! $errors->first('buy.price') !!}
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
                                   value="{!! old('sn_valve') !!}"
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
                                   value="{!! old('sn_cylinder') !!}"
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
                                   value="{!! old('test_pressure') !!}"
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
                                   value="{!! old('operating_pressure') !!}"
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
                               value="{!! old('usage') !!}"
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
                            <select title="tank" name="owner_id"
                                    id="owner_id" aria-describedby="owner_error"
                                    class="form-control">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">
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
                            <select title="tank" name="status_id"
                                    id="status_id" aria-describedby="status_error"
                                    class="form-control">
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}"
                                            @if($status->id == 1)
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
                               checked="checked"
                               aria-describedby="borrowable_error">
                        <label for="borrowable">Empruntable</label>
                        <span id="borrowable_error" class="help-block">
                            {!! $errors->first('borrowable') !!}
                        </span>
                    </div>
                </div>
                </fieldset>
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