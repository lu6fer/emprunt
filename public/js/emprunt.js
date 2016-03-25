$(document).ready(function() {
    // Extend selector
    $.fn.exists = function () {
        return this.length !== 0;
    };

    // Set sidebar shrinked if not
    if (localStorage.getItem('sidebar_shrinked') == null) {
        localStorage.setItem('sidebar_shrinked', false);
    }
    /**
     * Get localStorage shrinked status and apply
     */
    if ($('#sidenav').length) {
        if (JSON.parse(localStorage.getItem('sidebar_shrinked'))) {
            $('#sidebar').removeClass('sidebar-md').addClass('sidebar-sm');
            $('#content').removeClass('content-sm').addClass('content-md');
            $('#sidebar_shrink>i').removeClass('fa-arrow-left').addClass('fa-arrow-right');
            setTimeout(function() {
                $.each(window.m, function(id, obj) {
                    obj.redraw();
                });
            }, 500);
        } else {
            $('#sidebar').removeClass('sidebar-sm').addClass('sidebar-md');
            $('#content').removeClass('content-md').addClass('content-sm');
            $('#sidebar_shrink>i').removeClass('fa-arrow-right').addClass('fa-arrow-left');
            setTimeout(function() {
                $.each(window.m, function(id, obj) {
                    obj.redraw();
                });
            }, 500);
        }
    } else {
        $('#content').removeClass('content-md').removeClass('content-sm');
    }


    $(function () {
        // enbale tooltip
        $('[data-toggle="tooltip"]').tooltip(
            {
                container: 'body'
            }
        );
    });
    // Create select 2 from select
    $('select').select2();
    // Create restful link
    $('.rest').restfulizer();
    // Create datepicker
    $('.datepicker').datepicker({
        language: 'fr',
        format: 'dd/mm/yyyy',
        autoclose: true,
        toggleActive:true,
        todayBtn: "linked",
        todayHighlight: true
    });
    $('#review_date').on("changeDate", function() {
        $('#review_date').val(
            $('#review_date').datepicker('getDate')
        );
    });
    $('#next_test_date').on("changeDate", function() {
        $('#next_test_date').val(
            $('#next_test_date').datepicker('getDate')
        );
    });
    $('#shipping_date').on("changeDate", function() {
        $('#shipping_date').val(
            $('#shipping_date').datepicker('getDate')
        );
    });


    /**
     * Show/Hide type list in borrow view
     * @type {*|jQuery}
     */
    if($('#types').exists()) {
        var selected_val = $('#types').select2('data')[0];
        $('#'+selected_val.id).show();
        $('#types').change(function() {
            var prev_val = selected_val;
            selected_val = $('#types').select2('data')[0];
            $('#'+prev_val.id).hide();
            $('#'+selected_val.id).show();
        });
    }

    /**
     * Sidebar shrink
     */
    $('#sidebar_shrink').click(function() {
        $('#sidebar').toggleClass('sidebar-md sidebar-sm');
        $('#content').toggleClass('content-md content-sm');
        $('#sidebar_shrink>i').toggleClass('fa-arrow-right fa-arrow-left');
        var shrinked = JSON.parse(localStorage.getItem('sidebar_shrinked'));
        localStorage.setItem('sidebar_shrinked', !shrinked);
        setTimeout(function() {
            $.each(window.m, function(id, obj) {
                obj.redraw();
            });
        }, 500);
    });
});