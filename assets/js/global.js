var delay = (function() {
    var timer = 0;
    return function(callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();
var check_changes = (elements = []) => {
    var found = false;
    $.each(elements, function(key, val) {
        $(val).each(function() {
            if ($(this).data('default') !== $(this).val()) {
                found = true;
            }
        })
    });
    return found;
}

var update_forms = (elements = []) => {
    $.each(elements, function(key, val) {
        $(val).each(function() {
            $(this).data('default', $(this).val());

        })
    });

}