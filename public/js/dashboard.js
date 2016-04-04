$(document).ready(function() {
    window.m = [];
    disponibility();
    borrow_history();
});

/**
 *
 */
var disponibility = function () {
    if (typeof dispo_ori !== "undefined") {
        var dispo = $('<textarea>').html((dispo_ori) ? dispo_ori : '').text();
        dispo = JSON.parse(dispo);
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
                {label: "Empruntés", value: dispo.tanks.borrowed},
                {label: "Disponibles", value: dispo.tanks.available}
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
                {label: "Empruntés", value: dispo.regulators.borrowed},
                {label: "Disponibles", value: dispo.regulators.available}
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
                {label: "Empruntées", value: dispo.stabs.borrowed},
                {label: "Disponibles", value: dispo.stabs.available}
            ]
        }));
    }
};

/**
 *
 */
var borrow_history = function () {
    if (typeof b_history_ori !== "undefined") {
        //var b_history = $('<textarea>').html('{{$borrow_history}}').text();
        var b_history = $('<textarea>').html((b_history_ori) ? b_history_ori : '').text();
        b_history = JSON.parse(b_history);
        var history = {};

        $.each(b_history, function(id, val) {
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

        b_history = [];
        $.each(history, function(key, val){
            b_history.push({
                'period': key,
                'tanks': ((val.tank) ? val.tank : 0),
                'stabs': ((val.stab) ? val.stab : 0),
                'regulators': ((val.regulator) ? val.regulator : 0)
            })
        });


        window.m.push(Morris.Line({
            element: 'borrow_history',
            data: b_history.length ? b_history : [ { period:"0", tanks:0, stabs: 0, regulators: 0 } ],
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
        }));
    }
};