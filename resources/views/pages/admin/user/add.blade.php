@extends('layout.html')
@section('title', 'Administration - Edition')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="tank_edit"
                  action="{!! url('admin/user/store') !!}"
                  method="post"
                  class="form-horizontal">
                <!-- Firstname -->
                <div class="form-group {!! $errors->has('firstname') ? 'has-error' :'' !!}">
                    <label for="firstname" class="col-sm-2 control-label">Prénom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="firstname" id="firstname"
                               placeholder="Prénom"
                               value="{!! old('firstname') !!}"
                               aria-describedby="firstname_error">
                        <span id="firstname_error" class="help-block">
                            {!! $errors->first('firstname') !!}
                        </span>
                    </div>
                </div>
                <!-- lastname -->
                <div class="form-group {!! $errors->has('lastname') ? 'has-error' :'' !!}">
                    <label for="lastname" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               name="lastname" id="lastname"
                               placeholder="Nom"
                               value="{!! old('lastname') !!}"
                               aria-describedby="lastname_error">
                        <span id="lastname_error" class="help-block">
                            {!! $errors->first('lastname') !!}
                        </span>
                    </div>
                </div>
                <!-- email -->
                <div class="form-group {!! $errors->has('email') ? 'has-error' :'' !!}">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control"
                               name="email" id="email"
                               placeholder="Email"
                               value="{!! old('email') !!}"
                               aria-describedby="email_error">
                        <span id="email_error" class="help-block">
                            {!! $errors->first('email') !!}
                        </span>
                    </div>
                </div>
                <!-- Phone fix -->
                <div class="form-group {!! $errors->has('phone_fix') ? 'has-error' :'' !!}">
                    <label for="phone_fix" class="col-sm-2 control-label">Téléphone fixe</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone_fix"
                               id="phone_fix" placeholder="Téléphone fixe"
                               value="{!! old('phone_fix') !!}"
                               aria-describedby="phone_fix_error">
                        <span id="phone_fix_error" class="help-block">
                            {!! $errors->first('phone_fix') !!}
                        </span>
                    </div>
                </div>
                <!-- Phone mobile -->
                <div class="form-group {!! $errors->has('phone_mob') ? 'has-error' :'' !!}">
                    <label for="phone_mob" class="col-sm-2 control-label">Téléphone mobile</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone_mob"
                               id="phone_mob" placeholder="Téléphone mobile"
                               value="{!! old('phone_mob') !!}"
                               aria-describedby="phone_mob_error">
                        <span id="phone_mob_error" class="help-block">
                            {!! $errors->first('phone_mob') !!}
                        </span>
                    </div>
                </div>
                <!-- Phone work -->
                <div class="form-group {!! $errors->has('phone_work') ? 'has-error' :'' !!}">
                    <label for="phone_work" class="col-sm-2 control-label">Téléphone professionnel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone_fix"
                               id="phone_work" placeholder="Téléphone professionnel"
                               value="{!! old('phone_work') !!}"
                               aria-describedby="phone_work_error">
                        <span id="phone_work_error" class="help-block">
                            {!! $errors->first('phone_work') !!}
                        </span>
                    </div>
                </div>
                <!-- Licence -->
                <div class="form-group {!! $errors->has('licence') ? 'has-error' :'' !!}">
                    <label for="licence" class="col-sm-2 control-label">Licence</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="licence"
                               id="licence" placeholder="Licence"
                               value="{!! old('licence') !!}"
                               aria-describedby="licence_error">
                        <span id="licence_error" class="help-block">
                            {!! $errors->first('licence') !!}
                        </span>
                    </div>
                </div>
                <!-- active -->
                <div class="form-group {!! $errors->has('active') ? 'has-error' :'' !!}">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="checkbox" id="active"
                               name="active"
                               checked="checked"
                               aria-describedby="active_error">
                        <label for="active">Actif</label>
                        <span id="active_error" class="help-block">
                            {!! $errors->first('active') !!}
                        </span>
                    </div>
                </div>
                <!-- Stab -->
                <div class="form-group {!! $errors->has('stab') ? 'has-error' :'' !!}">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="checkbox" id="stab"
                               name="stab"
                               checked="checked"
                               aria-describedby="stab_error">
                        <label for="stab">Pret stab</label>
                        <span id="stab_error" class="help-block">
                            {!! $errors->first('stab') !!}
                        </span>
                    </div>
                </div>
                <!-- Tank -->
                <div class="form-group {!! $errors->has('tank') ? 'has-error' :'' !!}">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="checkbox" id="tank"
                               name="tank"
                               checked="checked"
                               aria-describedby="tank_error">
                        <label for="tank">Pret bloc</label>
                        <span id="tank_error" class="help-block">
                            {!! $errors->first('tank') !!}
                        </span>
                    </div>
                </div>
                <!-- Regulator -->
                <div class="form-group {!! $errors->has('regulator') ? 'has-error' :'' !!}">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="checkbox" id="regulator"
                               name="regulator"
                               checked="checked"
                               aria-describedby="regulator_error">
                        <label for="regulator">Pret détendeur</label>
                        <span id="regulator_error" class="help-block">
                            {!! $errors->first('regulator') !!}
                        </span>
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group {!! $errors->has('password') ? 'has-error' :'' !!}">
                    <label for="password" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password"
                               id="password" placeholder="Mot de passe"
                               aria-describedby="password_error">
                        <span id="password_error" class="help-block">
                            {!! $errors->first('password') !!}
                        </span>
                    </div>
                </div>
                <!-- password confirm -->
                <div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' :'' !!}">
                    <label for="password_confirmation" class="col-sm-2 control-label">Confirmation mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation"
                               id="password_confirmation" placeholder="Confirmation mot de passe"
                               aria-describedby="password_confirmation_error">
                        <span id="password_confirmation_error" class="help-block">
                            {!! $errors->first('password_confirmation') !!}
                        </span>
                    </div>
                </div>
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