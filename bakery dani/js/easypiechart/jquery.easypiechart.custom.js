(function($) {
    "use strict";
    // easyPieChart
    $('.chart').easyPieChart({
        barColor: '#FDC03C',
        trackColor: '#e3e3e3',
        size: '100',
        easing: 'easeOutBounce',
        onStep: function(from, to, percent) {
            $(this.el).find('span').text(Math.round(percent));
        }
    });
})(jQuery);