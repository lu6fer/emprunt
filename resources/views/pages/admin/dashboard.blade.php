@extends('layout.html')
@section('title', 'Administration')
@section('sidebar')
    @include('includes.admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-md-4">
                <div class="panel panel-default graph">
                    <div class="panel-heading">
                        <i class="fa fa-fw ef-tank"></i>&nbsp; Blocs
                    </div>
                    <div class="panel-body">
                        <div id="borrowed_tanks" style="height: 150px"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default graph">
                    <div class="panel-heading">
                        <i class="fa fa-fw ef-regulator"></i>&nbsp; Détendeurs
                    </div>
                    <div class="panel-body">
                        <div id="borrowed_regulators" style="height: 150px"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default graph">
                    <div class="panel-heading">
                        <i class="fa fa-fw ef-jacket"></i>&nbsp; Stabs
                    </div>
                    <div class="panel-body">
                        <div id="borrowed_stabs" style="height: 150px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default graph">
                <div class="panel-heading">Emprunts - saison encours</div>
                <div class="panel-body">
                    <div id="borrow_history" style="height: 150px"></div>
                </div>
            </div>
        </div>

    </div>
    <script type="application/javascript">
        dispo_ori = '{{$disponibility}}';
        b_history_ori = '{{$borrow_history}}';
    </script>
@endsection
