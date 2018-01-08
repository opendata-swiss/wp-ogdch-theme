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
            var origin = $(this).data().trackedOrigin || window.location.href;
            var target = $(this).attr('href');
            trackEvent('Download', origin, target);
            var organization = $(this).data().organization || '';
            var format = $(this).data().format || '';
            var dataset = $(this).data().dataset || '';
            trackOrganization(organization, 'Download', dataset, format)
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

        function trackOrganization(organization, action, dataset, format) {
            //todo track view when dataset page is rendered
            customDimensionDataset = {};
            customDimensionDataset['dimension'+customDimensionActionDatasetId] = organization;
            customDimensionFormat = {};
            customDimensionFormat['dimension'+customDimensionActionFormatId] = organization;
            _paq.push(['trackEvent', 'click', action, dataset, '', customDimensionDataset]);
            _paq.push(['trackEvent', 'click', action, format, '', customDimensionFormat]);
        }



        // only applies if we are looking at recline-view
        if(!window.parent.ckan && $('#recline-viewer')) {
            setTimeout(function () {
                $('#recline-viewer .loading-spinner').hide();
                var noResponseText = ($('#recline-viewer .left').data('noResponseText'));
                $('#recline-viewer .left').text(noResponseText);
                $('#recline-viewer .left').css('width', '1000px');
            }, 30000);
        }
    });
})(jQuery);
