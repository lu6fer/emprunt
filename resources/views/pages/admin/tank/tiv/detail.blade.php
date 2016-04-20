@extends('layout.html')
@section('title', 'Administration - Détail de l\'inspection')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    <h1 class="text-center">[{{$tiv->tank->number}}] {{$tiv->tank->brand}} - {{$tiv->tank->model}} - {{$tiv->tank->size}}</h1>
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
                                   disabled
                                   value="{!! $tiv->review_date->format('d/m/Y') !!}"
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->reviewer->id}}" selected>
                                    {{$tiv->reviewer->firstname}} {{$tiv->reviewer->lastname}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->review->id}}" selected>
                                    {{$tiv->review->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->review_status->id}}" selected>
                                    {{$tiv->review_status->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->ext_state->id}}" selected>
                                    {{$tiv->ext_state->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->int_state->id}}" selected>
                                    {{$tiv->int_state->value}}
                                </option>
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
                                   aria-describedby=int_oil_error"
                                    @if($tiv->int_oil == 1)
                                        checked
                                    @endif>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->int_residue->id}}" selected>
                                    {{$tiv->int_residue->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->valve->id}}" selected>
                                    {{$tiv->valve->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->valve_ring->id}}" selected>
                                    {{$tiv->valve_ring->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->neck_thread->id}}" selected>
                                    {{$tiv->neck_thread->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                <option value="{{$tiv->neck_thread_size->id}}" selected>
                                    {{$tiv->neck_thread_size->value}}
                                </option>
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
                                    class="form-control"
                                    disabled>
                                @if ($tiv->todo_maintenance_id == null)
                                    <option selected></option>
                                @else
                                    <option value="{{$tiv->todo_maintenance->id}}" selected>
                                        {{$tiv->todo_maintenance->value}}
                                    </option>
                                @endif
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
                                    class="form-control"
                                    disabled>
                                @if ($tiv->performed_maintenance_id == null)
                                    <option selected></option>
                                @else
                                    <option value="{{$tiv->performed_maintenance->id}}" selected>
                                        {{$tiv->performed_maintenance->value}}
                                    </option>
                                @endif
                            </select>
                        <span id="performed_maintenance_id_error" class="help-block">
                            {!! $errors->first('performed_maintenance_id') !!}
                        </span>
                        </div>
                    </div>
                    <!-- previous_review_date -->
                    <div class="form-group {!! $errors->has('previous_review_date') ? 'has-error' :'' !!}">
                        <label for="shipping_date" class="col-sm-2 control-label">Date inspection précédente</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker"
                                   name="shipping_date" id="shipping_date"
                                   placeholder="jj/mm/aaaa"
                                   disabled
                                   @if($tiv->previous_review_date != null) value="{{$tiv->previous_review_date->format('d/m/Y')}}" @endif
                                   aria-describedby="shipping_date_error">
                        <span id="shipping_date_error" class="help-block">
                            {!! $errors->first('previous_review_date') !!}
                        </span>
                        </div>
                    </div>
                    <!-- next_test_date -->
                    {{--<div class="form-group {!! $errors->has('next_test_date') ? 'has-error' :'' !!}">
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
                    </div>--}}
                    <!-- comment -->
                    <div class="form-group {!! $errors->has('comment') ? 'has-error' :'' !!}">
                        <label for="comment" class="col-sm-2 control-label">Commentaires</label>
                        <div class="col-sm-10">
                        <textarea class="form-control"
                                  rows="3"
                                  name="comment"
                                  id="comment"
                                  aria-describedby="comment_error"
                                  disabled>
                            {{$tiv->comment}}
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
                                   disabled
                                   @if($tiv->shipping_date != null) value="{{$tiv->shipping_date->format('d/m/Y')}}" @endif
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
                                    class="form-control"
                                    disabled>
                                @if ($tiv->recipient == null)
                                    <option selected></option>
                                @else
                                    <option value="{{$tiv->recipient->id}}" selected>
                                        {{$tiv->recipient->value}}
                                    </option>
                                @endif
                            </select>
                        <span id="recipient_id_error" class="help-block">
                            {!! $errors->first('recipient_id') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Décision</legend>
                    <!-- recipient_id -->
                    <div class="form-group {!! $errors->has('decision_id') ? 'has-error' :'' !!}">
                        <label for="decision_id" class="col-sm-2 control-label">Décision</label>
                        <div class="col-sm-10">
                            <select title="tank" name="decision_id"
                                    id="decision_id" aria-describedby="decision_id_error"
                                    class="form-control"
                                    disabled>
                                @if ($tiv->decision == null)
                                    <option selected></option>
                                @else
                                    <option value="{{$tiv->decision->id}}" selected>
                                        {{$tiv->decision->value}}
                                    </option>
                                @endif
                            </select>
                        <span id="decision_id_error" class="help-block">
                            {!! $errors->first('decision_id') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="{!! url('admin/tank/tiv/'.$tiv->tank->id) !!}" class="btn btn-default">Retour</a>
                        <a href="{!! url('admin/tank/tiv/pdf/'.$tiv->tank->id) !!}" class="btn btn-primary">Imprimer</a>
                        @if ($tiv->review_status->id != 88)
                        <a href="{!! url('admin/tank/tiv/edit/'.$tiv->id) !!}" class="btn btn-danger">Editer</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection