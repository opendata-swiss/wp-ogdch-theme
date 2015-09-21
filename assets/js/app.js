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

    $('[id^=collapsed-related-]').on('shown.bs.collapse', function () {
        $('#' + $(this)[0].id + '-link').text('Hide related datasets');
    })
    $('[id^=collapsed-related-]').on('hidden.bs.collapse', function () {
        $('#' + $(this)[0].id + '-link').text('Show related datasets');
    })

});