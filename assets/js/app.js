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

    });
})(jQuery);
