(function($) {
    $( document ).ready(function() {
        console.log("it worked!");
        //disable all delete buttons
        $('.cmb-remove-row button').attr("disabled","disabled");

        $('.cmb-remove-row').append('<p class="cmb2-metabox-description" style="align: right">Click checkbox to enable delete button</p>');

        var code = "jQuery(this).siblings('button').prop('disabled', function(i, v) { return !v; });";
        //var code = "jQuery(this).next().attr('disabled', false);";
        $('.cmb-remove-row').prepend('<input type="checkbox" style="margin-bottom: 15px;" onchange="' + code + '"></input></span>');



        //
    });
})(jQuery);

/*

 cmb-remove-row

 <label for="delete-publisher" style="font-weight: bold; padding-right: 20px;">Entfernen?</label>
 <input name="delete-publisher" type="checkbox" onchange="jQuery(this).next().prop('disabled', function(i, v) { return !v; });">
 */