(function($) {
    'use strict';

    if ($(".js-example-basic-single").length) {
        $(".js-example-basic-single").select2();
        $(document).on('touchend', function(){
            $('.js-example-basic-single').on('select2:open', function(e) {
                $(".select2-search, .select2-focusser").remove();
            });    
        });    
    }
    if ($(".js-example-basic-multiple").length) {
        $(".js-example-basic-multiple").select2();
    }
})(jQuery);