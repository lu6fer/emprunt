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
                        <label for="number" class="col-sm-2 control-label">Date inspection</label>
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
                    <!-- review_id -->
                    <!-- review_status_id -->
                </fieldset>
                <fieldset>
                    <legend>Bloc</legend>
                    <!-- ext_state_id -->
                    <!-- int_oil -->
                    <!-- int_residue_id -->
                    <!-- int_state_id -->
                    <!-- valve_id -->
                    <!-- valve_ring_id -->
                    <!-- neck_thread_id -->
                    <!-- neck_thread_size_id -->
                </fieldset>
                <fieldset>
                    <legend>Informations</legend>
                    <!-- next_test_date -->
                    <!-- previous_review_date -->
                    <!-- shipping_date -->
                    <!-- tank_id -->
                    <!-- todo_maintenance_id -->
                    <!-- performed_maintenance_id -->
                </fieldset>


                <!-- comment -->
            </form>
        </div>
    </div>
@endsection