var tivRowStyle = function (row, index) {
    var next_review = moment(row[2], "DD/MM/YYYY");
    var next_test = moment(row[3], "DD/MM/YYYY");
    var now = moment();
    var to_newt_review = next_review.diff(now, 'months');
    var to_next_test = next_test.diff(now, 'months');
    console.log(to_newt_review);

    if (to_newt_review < 6 || to_next_test < 6) {
        return {
            classes: 'danger'
        };
    }
    if (to_newt_review < 12 || to_next_test < 12) {
        return {
            classes: 'warning'
        };
    }

    return {};
};