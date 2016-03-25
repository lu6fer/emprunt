@extends('layout.html')
@section('title', 'Administration - Nouvelle inspection')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <h1 class="text-center">[{{$tank->number}}] {{$tank->brand}} - {{$tank->model}} - {{$tank->size}}</h1>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="tank_add"
                  action="{!! url('admin/tank/tiv/store') !!}"
                  method="post"
                  class="form-horizontal">
                <fieldset>
                    <legend>Inspection</legend>
                    <!-- review_date -->
                    <div class="form-group {!! $errors->has('review_date') ? 'has-error' :'' !!}">
                        <label for="review_date" class="col-sm-2 control-label">Date inspection</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker"
                                   name="review_date" id="review_date"
                                   placeholder="jj/mm/aaaa"
                                   value="{!! old('review_date') !!}"
                                   aria-describedby="review_date_error">
                        <span id="review_date_error" class="help-block">
                            {!! $errors->first('review_date') !!}
                        </span>
                        </div>
                    </div>
                    <!-- reviewer_id -->
                    <div class="form-group {!! $errors->has('reviewer_id') ? 'has-error' :'' !!}">
                        <label for="reviewer_id" class="col-sm-2 control-label">Visiteur</label>
                        <div class="col-sm-10">
                            <select title="tank" name="reviewer_id"
                                    id="reviewer_id" aria-describedby="reviewer_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($reviewers as $reviewer)
                                    <option value="{{$reviewer->id}}" @if (old('reviewer_id') == $reviewer->id) selected @endif>
                                        {{$reviewer->firstname}} {{$reviewer->lastname}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="reviewer_id_error" class="help-block">
                            {!! $errors->first('reviewer_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- review_id -->
                    <div class="form-group {!! $errors->has('review_id') ? 'has-error' :'' !!}">
                        <label for="review_id" class="col-sm-2 control-label">Type de visite</label>
                        <div class="col-sm-10">
                            <select title="tank" name="review_id"
                                    id="review_id" aria-describedby="review_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['review'] as $data)
                                    <option value="{{$data->id}}" @if (old('review_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="review_id_error" class="help-block">
                            {!! $errors->first('review_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- review_status_id -->
                    <div class="form-group {!! $errors->has('review_status_id') ? 'has-error' :'' !!}">
                        <label for="review_status_id" class="col-sm-2 control-label">Etat de la visite</label>
                        <div class="col-sm-10">
                            <select title="tank" name="review_status_id"
                                    id="review_status_id" aria-describedby="review_status_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['review_status'] as $data)
                                    <option value="{{$data->id}}" @if (old('review_status_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="review_status_id_error" class="help-block">
                            {!! $errors->first('review_status_id') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Bloc</legend>
                    <!-- ext_state_id -->
                    <div class="form-group {!! $errors->has('ext_state_id') ? 'has-error' :'' !!}">
                        <label for="ext_state_id" class="col-sm-2 control-label">Etat extérieur</label>
                        <div class="col-sm-10">
                            <select title="tank" name="ext_state_id"
                                    id="ext_state_id" aria-describedby="ext_state_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['ext_state'] as $data)
                                    <option value="{{$data->id}}" @if (old('ext_state_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="ext_state_id_error" class="help-block">
                            {!! $errors->first('ext_state_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- int_state_id -->
                    <div class="form-group {!! $errors->has('int_state_id') ? 'has-error' :'' !!}">
                        <label for="int_state_id" class="col-sm-2 control-label">Etat intérieur</label>
                        <div class="col-sm-10">
                            <select title="tank" name="int_state_id"
                                    id="int_state_id" aria-describedby="int_state_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['int_state'] as $data)
                                    <option value="{{$data->id}}" @if (old('int_state_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="int_state_id_error" class="help-block">
                            {!! $errors->first('int_state_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- int_oil -->
                    <div class="form-group {!! $errors->has('int_oil') ? 'has-error' :'' !!}">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="checkbox" id="int_oil"
                                   name="int_oil"
                                   aria-describedby=int_oil_error">
                            <label for="int_oil">Huilage interne</label>
                        <span id="int_oil_error" class="help-block">
                            {!! $errors->first('int_oil') !!}
                        </span>
                        </div>
                    </div>
                    <!-- int_residue_id -->
                    <div class="form-group {!! $errors->has('int_residue_id') ? 'has-error' :'' !!}">
                        <label for="int_residue_id" class="col-sm-2 control-label">Résidus</label>
                        <div class="col-sm-10">
                            <select title="tank" name="int_residue_id"
                                    id="int_residue_id" aria-describedby="int_residue_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['int_residue'] as $data)
                                    <option value="{{$data->id}}" @if (old('int_residue_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="int_residue_id_error" class="help-block">
                            {!! $errors->first('int_residue_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- valve_id -->
                    <div class="form-group {!! $errors->has('valve_id') ? 'has-error' :'' !!}">
                        <label for="valve_id" class="col-sm-2 control-label">Robinetterie</label>
                        <div class="col-sm-10">
                            <select title="tank" name="valve_id"
                                    id="valve_id" aria-describedby="valve_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['valve'] as $data)
                                    <option value="{{$data->id}}" @if (old('valve_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="valve_id_error" class="help-block">
                            {!! $errors->first('valve_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- valve_ring_id -->
                    <div class="form-group {!! $errors->has('valve_ring_id') ? 'has-error' :'' !!}">
                        <label for="valve_ring_id" class="col-sm-2 control-label">Bague robinetterie</label>
                        <div class="col-sm-10">
                            <select title="tank" name="valve_ring_id"
                                    id="valve_ring_id" aria-describedby="valve_ring_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['valve_ring'] as $data)
                                    <option value="{{$data->id}}" @if (old('valve_ring_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="valve_ring_id_error" class="help-block">
                            {!! $errors->first('valve_ring_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- neck_thread_id -->
                    <div class="form-group {!! $errors->has('neck_thread_id') ? 'has-error' :'' !!}">
                        <label for="neck_thread_id" class="col-sm-2 control-label">Filetage col</label>
                        <div class="col-sm-10">
                            <select title="tank" name="neck_thread_id"
                                    id="neck_thread_id" aria-describedby="neck_thread_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['neck_thread'] as $data)
                                    <option value="{{$data->id}}" @if (old('neck_thread_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="neck_thread_id_error" class="help-block">
                            {!! $errors->first('neck_thread_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- neck_thread_size_id -->
                    <div class="form-group {!! $errors->has('neck_thread_size_id') ? 'has-error' :'' !!}">
                        <label for="neck_thread_size_id" class="col-sm-2 control-label">Mesure filetage col</label>
                        <div class="col-sm-10">
                            <select title="tank" name="neck_thread_size_id"
                                    id="neck_thread_size_id" aria-describedby="neck_thread_size_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['neck_thread_size'] as $data)
                                    <option value="{{$data->id}}" @if (old('neck_thread_size_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="neck_thread_size_id_error" class="help-block">
                            {!! $errors->first('neck_thread_size_id') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Informations</legend>
                    <!-- todo_maintenance_id -->
                    <div class="form-group {!! $errors->has('todo_maintenance_id') ? 'has-error' :'' !!}">
                        <label for="todo_maintenance_id" class="col-sm-2 control-label">Entretien à faire</label>
                        <div class="col-sm-10">
                            <select title="tank" name="todo_maintenance_id"
                                    id="todo_maintenance_id" aria-describedby="todo_maintenance_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['todo_maintenance'] as $data)
                                    <option value="{{$data->id}}" @if (old('todo_maintenance_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="todo_maintenance_id_error" class="help-block">
                            {!! $errors->first('todo_maintenance_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- performed_maintenance_id -->
                    <div class="form-group {!! $errors->has('performed_maintenance_id') ? 'has-error' :'' !!}">
                        <label for="performed_maintenance_id" class="col-sm-2 control-label">Entretien effectué</label>
                        <div class="col-sm-10">
                            <select title="tank" name="performed_maintenance_id"
                                    id="performed_maintenance_id" aria-describedby="performed_maintenance_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['performed_maintenance'] as $data)
                                    <option value="{{$data->id}}" @if (old('performed_maintenance_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="performed_maintenance_id_error" class="help-block">
                            {!! $errors->first('performed_maintenance_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- previous_review_date -->
                    <div class="form-group {!! $errors->has('previous_review_date') ? 'has-error' :'' !!}">
                        <label for="previous_review_date" class="col-sm-2 control-label">
                                Date inspection précédente
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker"
                                       placeholder="jj/mm/aaaa"
                                       disabled
                                       value="{{$previous_tiv->review_date->format('d/m/Y')}}"
                                       aria-describedby="previous_review_date_error" />
                                <span class="input-group-btn">
                                    <a  class="btn btn-default"
                                        href="{!! url('admin/tank/tiv/detail/'.$previous_tiv->id) !!}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Détails inspection précédente">
                                        <span class="fa fa-info" aria-hidden="true"></span>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" class="form-control datepicker"
                                   name="previous_review_date" id="previous_review_date"
                                   placeholder="jj/mm/aaaa"
                                   value="{{$previous_tiv->review_date->format('d/m/Y')}}"
                                   aria-describedby="previous_review_date_error" />
                        <span id="previous_review_date_error" class="help-block">
                            {!! $errors->first('previous_review_date') !!}
                        </span>
                        </div>
                    </div>
                    <!-- next_test_date -->
                    <div class="form-group {!! $errors->has('next_test_date') ? 'has-error' :'' !!}">
                        <label for="next_test_date" class="col-sm-2 control-label">Date prochaine réépreuve</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker"
                                   name="next_test_date" id="next_test_date"
                                   placeholder="jj/mm/aaaa"
                                   @if($previous_test)
                                   value="{!! date("d/m/Y", strtotime("+5 years", strtotime($previous_test->review_date))) !!}"
                                   @endif
                                   aria-describedby="next_test_date_error">
                        <span id="next_test_date_error" class="help-block">
                            {!! $errors->first('next_test_date') !!}
                        </span>
                        </div>
                    </div>
                    <!-- comment -->
                    <div class="form-group {!! $errors->has('comment') ? 'has-error' :'' !!}">
                        <label for="comment" class="col-sm-2 control-label">Commentaires</label>
                        <div class="col-sm-10">
                        <textarea class="form-control"
                                  rows="3"
                                  name="comment"
                                  id="comment"
                                  aria-describedby="comment_error">
                            {!! old('comment') !!}
                        </textarea>
                        <span id="comment_error" class="help-block">
                            {!! $errors->first('comment') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Prestataire</legend>
                    <!-- shipping_date -->
                    <div class="form-group {!! $errors->has('shipping_date') ? 'has-error' :'' !!}">
                        <label for="shipping_date" class="col-sm-2 control-label">Date expédition prestataire</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker"
                                   name="shipping_date" id="shipping_date"
                                   placeholder="jj/mm/aaaa"
                                   value="{!! old('shipping_date') !!}"
                                   aria-describedby="shipping_date_error">
                        <span id="shipping_date_error" class="help-block">
                            {!! $errors->first('shipping_date') !!}
                        </span>
                        </div>
                    </div>
                    <!-- recipient_id -->
                    <div class="form-group {!! $errors->has('recipient_id') ? 'has-error' :'' !!}">
                        <label for="recipient_id" class="col-sm-2 control-label">Société</label>
                        <div class="col-sm-10">
                            <select title="tank" name="recipient_id"
                                    id="recipient_id" aria-describedby="recipient_id_error"
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['recipient'] as $data)
                                    <option value="{{$data->id}}" @if (old('recipient_id') == $data->id) selected @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="recipient_id_error" class="help-block">
                            {!! $errors->first('recipient_id') !!}
                        </span>
                        </div>
                    </div>

                </fieldset>
                <input type="hidden" name="tank_id" id="tank_id" value="{{$tank->id}}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection