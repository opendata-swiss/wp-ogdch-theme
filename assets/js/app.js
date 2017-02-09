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
    });
})(jQuery);
