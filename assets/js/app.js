(function($) {
    $( document ).ready(function() {
        $('#opendata-count').fitText(0.38, { minFontSize: '70px', maxFontSize: '120px' });

        // resizing iFrame for resource-view
        var iframe = $('.resource-view iframe');
        setInterval(function() {
          resizeIFrame();
        }, 200);
        function resizeIFrame() {
            var height = iframe.contents().find('body').outerHeight(true);
            height = Math.max(height, 400);
            iframe.css('height', height + 30);
        }

        // Setup Piwik tracking
        $('a[href^="mailto:"]').on('click', function(e) {
            var origin = $(this).data().trackedOrigin || window.location.href;
            var target = $(this).attr('href').replace('mailto:', '');
            trackEvent('Mail', origin, target);
        });
        $('a.piwik-tracked-download').on('click', function(e) {
            var format = $(this).data().format.toLowerCase() || '';
            trackDownloadEvent(format);
        });
        $('a.piwik-tracked-app-url').on('click', function(e) {
            var origin = $(this).data().trackedOrigin || window.location.href;
            var target = $(this).attr('href');
            trackEvent('App URL', origin, target);
        });
        $('a.piwik-tracked-app-related-dataset').on('click', function(e) {
            var origin = $(this).data().trackedOrigin || window.location.href;
            var target = $(this).attr('href');
            trackEvent('App Related Dataset', origin, target);
        });

        function trackEvent(action, origin, target) {
            _paq.push(['trackEvent', action, origin, target]);
        }

        function trackDownloadEvent(format) {
            if(customDimensionActionFormatId) {
                customDimensionFormat = {};
                customDimensionFormat['dimension' + customDimensionActionFormatId] = format;
                _paq.push(['trackEvent', 'dataset', 'download', format, "", customDimensionFormat]);
            }
        }

        // only applies if we are looking at recline-view
        if(!window.parent.ckan && $('#recline-viewer')) {
            setTimeout(function () {
                $('#recline-viewer .loading-spinner').hide();
                var noResponseText = ($('#recline-viewer .left').data('noResponseText'));
                $('#recline-viewer .left').text(noResponseText);
                $('#recline-viewer .left').css('width', '1000px');
            }, 5000);
        }

        // Activate search suggestions for the search bar
        $('#ogdch_search').autocomplete({
          delay: 250,
          html: true,
          minLength: 2,
          response: function( event, ui ) {
              //remove highlighting HTML (<b>) from value
              ui.content.map(function(item) {
                  item.value = item.value.replace('<b>', '');
                  item.value = item.value.replace('</b>', '');

                  //add quotes around single-term values for Solr
                  if (!item.value.match(/\s/g)) {
                      item.value = '"' + item.value + '"';
                  }
              });
          },
          source: function (request, response) {
            var url = '/api/3/action/ogdch_autosuggest';

            params = {q: request.term, lang: $('html').attr('lang')}
            // check if any filters/facets are set and send them along
            var values = [];
            $("#dataset-search-form input[name='groups']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='keywords_de']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='keywords_fr']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='keywords_it']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='keywords_en']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='organization']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='political_level']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='res_rights']").each(function(elem) { values.push($(this).val()) });
            $("#dataset-search-form input[name='res_format']").each(function(elem) { values.push($(this).val()) });
            if (values) {
                // remove dashes from all values
                values = values.map(function(v) { return v.replace(/-/gi, ''); });
                fq = values.join(' AND ');
                params['fq'] = fq;
            }


            $.getJSON(url, params)
              .done(function (data) {
                response(data['result']);
              });
            }
        });
    });
})(jQuery);
