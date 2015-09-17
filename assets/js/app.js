$(function() {

    /* =======================================================================//
     // Category collapse
     // =======================================================================*/

    $('#collapsed-category').on('shown.bs.collapse', function () {
        $('#collapse-category-btn').text('Weniger Kategorien');
    })
    $('#collapsed-category').on('hidden.bs.collapse', function () {
        $('#collapse-category-btn').text('Weitere Kategorien');
    })

});