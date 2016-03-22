@extends('layout.html')
@section('title', 'Administration - Edition')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="stab_add"
                  action="{!! url('admin/stab/store') !!}"
                  method="post"
                  class="form-horizontal">
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
                    <label for="type" class="col-sm-2 control-label">Taille</label>
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
                <!-- ID -->
                {{--<input type="hidden" name="id" id="id" value="{{$stab->id}}">--}}
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