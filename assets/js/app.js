$(function() {

    var body = $('body');


    // Search
    if (body.hasClass('page-template-search')) {

        var uri = new URI(window.location);
        var args = uri.search(true);

        $("#ckan_search").submit(function (event) {
            var term = $('#q').val();

            if (term !== '') {
                uri = new URI(window.location).setSearch("q", term);
            } else {
                uri = new URI(window.location).setSearch("q", "");
            }

            var url = URI.decode(uri.href());

            window.location.href = url;

            event.preventDefault();
        });



        if (!$.isEmptyObject(args)) {
            var q = getQueryVariable('q');
            if (q) {
                $('#q').val(q);
            }
            fireCkanSearch(event);
        }


        $.each(args, function (index, value) {
            var el, href;
            index = index.replace('[]', '');
            if (index === 'groups' || index === 'organization') {
                // if only one group or organization is set
                if (typeof(value) === 'string') {
                    el = $('.' + index + '__' + value);
                    href = el.attr('href');
                    href = str_replace(index + '[]=' + value, '', href);

                    el.removeClass('facet__term--disabled').addClass('facet__term--active');
                    el.attr('href', href);
                } else {
                    $.each(value, function (i, slug) {
                        el = $('.' + index + '__' + slug);
                        href = el.attr('href');
                        href = str_replace(index + '[]=' + slug, '', href);

                        el.removeClass('facet__term--disabled').addClass('facet__term--active');
                        el.attr('href', href);
                    });
                }
            }
        });

    }

});

function fireCkanSearch(event) {
    var uri = new URI(window.location);
    var form_data = uri.query();

    $.post(ogdAjax.ajaxurl, {
            action: 'ckan_search_action',
            nonce: ogdAjax.submissionNonce,
            q: form_data
        },
        function (response) {
            var response = jQuery.parseJSON(response);

            if ('success' === response.status) {
                if (response.count === 0) {
                    $('#results').html('Nüt gfunde');
                    $('.facet__term').addClass('facet__term--disabled');
                    $('.facet__term span').html('0');
                } else {
                    $('#results').html(response.html);

                    var facets = response.facets;
                    $('.facet__term').addClass('facet__term--disabled');
                    $('.facet__term span').html('0');

                    $.each(facets, function (facet, items) {
                        $.each(items, function (slug, count) {
                            $('.' + facet + '__' + slug).removeClass('facet__term--disabled');
                            $('.' + facet + '__' + slug + ' span').html(count);
                        });
                    });
                }

            } else {
                // something went wrong
            }

        });
    event.preventDefault();

}