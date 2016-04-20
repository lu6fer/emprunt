@extends('layout.html')
@section('title', 'Administration - Edition de l\'inspection du '.$tiv->review_date->format('d/m/Y'))
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection
@section('content')
    {{--{!! dd($tiv) !!}--}}
    <h1 class="text-center">[{{$tiv->tank->number}}] {{$tiv->tank->brand}} - {{$tiv->tank->model}} - {{$tiv->tank->size}}</h1>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form name="tank_add"
                  action="{!! url('admin/tank/tiv/update') !!}"
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
                                   
                                   value="{{ old('review_date') ?: $tiv->review_date->format('d/m/Y') }}"
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
                                    >
                                @if ($tiv->reviewer == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['reviewer'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('reviewer_id') ?: $tiv->reviewer->id == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->firstname }} {{ $data->lastname }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->review == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['review'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('review_id') ?: ($tiv->review ? $tiv->review->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->review_status == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['review_status'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('review_status_id') ?: ($tiv->review_status ? $tiv->review_status->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->ext_state == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['ext_state'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('ext_state_id') ?: ($tiv->ext_state ? $tiv->ext_state->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->int_state == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['int_state'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('int_state_id') ?: ($tiv->int_state ? $tiv->int_state->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                   aria-describedby=int_oil_error"
                                    @if((old('int_oil') ?: $tiv->int_oil) == 1)
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
                                    >
                                @if ($tiv->int_residue == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['int_residue'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('int_residue_id') ?: ($tiv->int_residue ? $tiv->int_residue->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->valve == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['valve'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('valve_id') ?: ($tiv->valve ? $tiv->valve->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->valve_ring == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['valve_ring'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('valve_ring_id') ?: ($tiv->valve_ring ? $tiv->valve_ring->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->neck_thread == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['neck_thread'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('neck_thread_id') ?: ($tiv->neck_thread ? $tiv->neck_thread->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->neck_thread_size == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['neck_thread_size'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('neck_thread_size_id') ?: ($tiv->neck_thread_size ? $tiv->neck_thread_size->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->todo_maintenance == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['todo_maintenance'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('todo_maintenance_id') ?: ($tiv->todo_maintenance ? $tiv->todo_maintenance->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
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
                                    class="form-control"
                                    >
                                @if ($tiv->performed_maintenance == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['performed_maintenance'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('performed_maintenance_id') ?: ($tiv->performed_maintenance ? $tiv->performed_maintenance->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
                                    </option>
                                @endforeach
                                {{--@if ($tiv->performed_maintenance_id == null)
                                    <option selected></option>
                                @else
                                    <option value="{{$tiv->performed_maintenance->id}}" selected>
                                        {{$tiv->performed_maintenance->value}}
                                    </option>
                                @endif--}}
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
                                   @if($tiv->previous_review_date != null)
                                   value="{{$tiv->previous_review_date->format('d/m/Y')}}"
                                   @endif
                                   aria-describedby="shipping_date_error">
                        <span id="shipping_date_error" class="help-block">
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
                                   value="{!! date("d/m/Y", strtotime("+5 years", strtotime($previous_test))) !!}"
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
                                  aria-describedby="comment_error"
                                  >
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
                                   
                                   @if($tiv->shipping_date != null)
                                   value="{{old('shipping_date') ?: $tiv->shipping_date->format('d/m/Y')}}"
                                   @endif
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
                                @if ($tiv->recipient == null)
                                    <option selected></option>
                                @endif
                                @foreach($tiv_datas['recipient'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('recipient_id') ?: ($tiv->recipient ? $tiv->recipient->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{ $data->value }}
                                    </option>
                                @endforeach
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
                                    class="form-control">
                                <option></option>
                                @foreach($tiv_datas['decision'] as $data)
                                    <option value="{{$data->id}}"
                                            @if (old('decision_id') ?: ($tiv->decision ? $tiv->decision->id : null) == $data->id)
                                            selected
                                            @endif>
                                        {{$data->value}}
                                    </option>
                                @endforeach
                            </select>
                        <span id="decision_id_error" class="help-block">
                            {!! $errors->first('decision_id') !!}
                        </span>
                        </div>
                    </div>
                </fieldset>

                <input type="hidden" name="id" value="{{ $tiv->id }}">
                <input type="hidden" name="tank_id" id="tank_id" value="{{ $tiv->tank->id }}">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}
                <!-- Submit -->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="{!! url('admin/tank/tiv/'.$tiv->tank->id) !!}" class="btn btn-default">Retour</a>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection