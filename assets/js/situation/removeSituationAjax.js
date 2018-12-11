$(document).ready(function() {
    /* This script is used in the printerForm page to remove a place, a floor or a department */
    if ($('.printerForm').length) {
        $('[id|=rm]').on('click', function (event) {
            event.preventDefault();
            var currentTarget = event.currentTarget;
            var href = currentTarget.href;
            var tableSing = currentTarget.id.split('-')[1];
            href += tableSing + 's&theId=';
            var select = currentTarget.parentNode.children[1];
            var idToRemove = select.value;
            href += idToRemove; 
            $('[name=' + tableSing + '] [value=' + idToRemove + ']').remove();
            $.ajax({url: href, success: function(){}});
        })
    }
});