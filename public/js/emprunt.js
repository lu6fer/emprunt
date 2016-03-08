$(document).ready(function() {
    // Extend selector
    $.fn.exists = function () {
        return this.length !== 0;
    };

    // enbale tooltip
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    // Create select 2 from select
    $('select').select2();
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

    $('#sidebar_shrink').click(function() {
       $('#sidenav').toggleClass('sidebar-md sidebar-sm');
        $('#sidebar_shrink>i').toggleClass('fa-arrow-left fa-arrow-right');
    });
});