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
                <div class="panel-heading">Emprunts</div>
                <div class="panel-body">
                    <div id="borrow_history" style="height: 150px"></div>
                </div>
            </div>
        </div>

    </div>
    <script type="application/javascript">
        $(document).ready(function() {
            window.m = [];
            disponibility();
            borrow_history();
        });
        function disponibility() {
            var disponibility = $('<textarea>').html('{{$disponibility}}').text();
            disponibility = JSON.parse(disponibility);
            /**
             * Borrowed Tanks
             */
            window.m.push(Morris.Donut({
                element: 'borrowed_tanks',
                resize: false,
                colors: [
                    '#F0AD4E',
                    '#F0C54E'
                ],
                data: [
                    {label: "Empruntés", value: disponibility.tanks.borrowed},
                    {label: "Disponibles", value: disponibility.tanks.available}
                ]
            }));

            /**
             * Borrowed Regulators
             */
            window.m.push(Morris.Donut({
                element: 'borrowed_regulators',
                resize: false,
                colors: [
                    '#3379B7',
                    '#338DB7'
                ],
                data: [
                    {label: "Empruntés", value: disponibility.regulators.borrowed},
                    {label: "Disponibles", value: disponibility.regulators.available}
                ]
            }));

            /**
             * Borrowed Stabs
             */
            window.m.push(Morris.Donut({
                element: 'borrowed_stabs',
                resize: false,
                colors: [
                    '#5CB85C',
                    '#95B85B'
                ],
                data: [
                    {label: "Empruntées", value: disponibility.stabs.borrowed},
                    {label: "Disponibles", value: disponibility.stabs.available}
                ]
            }));
        }

        function borrow_history() {
            var borrow_history = $('<textarea>').html('{{$borrow_history}}').text();
            borrow_history = JSON.parse(borrow_history);
            var history = {};

            $.each(borrow_history, function(id, val) {
                if (history[val.period] === undefined
                        || history[val.period] === null) {
                    history[val.period] = {};
                }
                if (history[val.period][val.device] === undefined ||
                        history[val.period][val.device] === null) {
                    history[val.period][val.device] = {};
                }
                history[val.period][val.device] = val.history;
            });

            borrow_history = [];
            $.each(history, function(key, val){
               borrow_history.push({
                   'period': key,
                   'tanks': ((val.tank) ? val.tank : 0),
                   'stabs': ((val.stab) ? val.stab : 0),
                   'regulators': ((val.regulator) ? val.regulator : 0)
               })
            });


            Morris.Line({
                element: 'borrow_history',
                data: borrow_history,
                lineColors: [
                    '#F0AD4E',
                    '#5CB85C',
                    '#3379B7'
                ],
                xkey: 'period',
                ykeys: ['tanks', 'stabs', 'regulators'],
                labels: ['Blocs', 'Stabs', 'Détendeurs'],
                pointSize: 2,
                parseTime: true,
                hideHover: 'auto',
                resize: true
            });
            /*window.m.push(Morris.Line({
                element: 'borrow_history',
                data: [
                    { month: '1', tanks: 100, stabs: 90, regulators: 25 },
                    { month: '2', tanks: 5, stabs: 12, regulators: 2 },
                    { month: '3', tanks: 35, stabs: 40, regulators: 40 }
                ],
                xkey: 'month',
                xLabels: 'Mois',
                ykeys: ['tanks', 'stabs', 'regulators'],
                labels: ['Blocs', 'Stabs', 'Détendeurs']
            }));*/
        }

    </script>
@endsection
