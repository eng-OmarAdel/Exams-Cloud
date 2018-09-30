var ZiSelect = function () {
    var p = function (select, array, fields) {
        select.html("");
        array.forEach(function (currentValue, index, array) {
            select.append($('<option>', {
                value: currentValue[fields[0]],
                text: currentValue[fields[1]]
            }));
        });
    };
    var o = function () {


    };
    return{
        init: function () {
            o();
        },
        populate: function (table, array, fields) {
            p(table, array, fields);
        }
    };
}();