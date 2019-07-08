(function ($) {

    /* DOM elements */
    var $filter = $('[data-premmerce-filter]');
    var $control = $filter.find('[data-premmerce-filter-link]');

    /* Event handlers */
    $control.on('change', followLink);

    /**
     * Launch filter after clicking on radio or checkbox control
     */
    function followLink(event) {
        event.preventDefault();
        location.href = $(this).attr('data-premmerce-filter-link');
    }

    /**
     * Toogle filter block visibility
     */
    $(document).on('click', '[data-premerce-filter-drop-handle]', function (e) {
        e.preventDefault();

        $(this).closest('[data-premmerce-filter-drop-scope]').find('[data-premmerce-filter-inner]').slideToggle(300);
        $(this).closest('[data-premmerce-filter-drop-scope]').find('[data-premmerce-filter-drop-ico]').toggleClass('hidden', 300);
    });


    /**
     * Positioning scroll into the middle of checked value
     * Working only if scroll option in filter setting is true
     */
    $('[data-filter-scroll]').each(function () {
        var frame = $(this);
        var fieldActive = frame.find('[data-filter-control]:checked').first().closest('[data-filter-control-checkgroup]').find('[data-filter-control-label]');

        if (fieldActive.size() > 0) {
            var fieldActivePos = fieldActive.offset().top - frame.offset().top;
            frame.scrollTop(fieldActivePos - (frame.height() / 2 - fieldActive.height()));
        }
    });

    function slider_scope(form) {

        var fieldMin = 'data-premmerce-filter-slider-min';
        var fieldMax = 'data-premmerce-filter-slider-max';
        var slider = 'data-premmerce-filter-range-slider';

        // Default valued at start
        var initialMinVal = parseFloat(form.find('[' + fieldMin + ']').attr(fieldMin));
        var initialMaxVal = parseFloat(form.find('[' + fieldMax + ']').attr(fieldMax));

        // Values after applying filter
        var curMinVal = parseFloat(form.find('[' + fieldMin + ']').attr('value'));
        var curMaxVal = parseFloat(form.find('[' + fieldMax + ']').attr('value'));

        // Setting value into form inputs when slider is moving
        form.find('[' + slider + ']').slider({
            min: initialMinVal,
            max: initialMaxVal,
            values: [curMinVal, curMaxVal],
            range: true,
            slide: function (event, elem) {
                var instantMinVal = elem.values[0];
                var instantMaxVal = elem.values[1];

                form.find('[' + fieldMin + ']').val(instantMinVal);
                form.find('[' + fieldMax + ']').val(instantMaxVal);
            },
            change: function (event, elem) {
                if (elem.values[0] === initialMinVal) {
                    form.find('[' + fieldMin + ']').attr('disabled', true);
                }
                if (elem.values[1] === initialMaxVal) {
                    form.find('[' + fieldMax + ']').attr('disabled', true);
                }
                form.trigger('submit');
                form.find('[' + fieldMin + '], [' + fieldMax + ']').attr('readOnly', true);
            }
        });

        $('[data-premmerce-slider-trigger-change]').change(function () {
            form.trigger('submit');
            form.find('[' + fieldMin + '], [' + fieldMax + ']').attr('readOnly', true);
        });

        form.submit(function (e) {
            //Remove ? sign if form is empty
            if (($(this).serialize().length === 0)) {
                e.preventDefault();
                window.location.assign(window.location.pathname);
            }
        });
    }

    $('[data-premmerce-filter-slider-form]').each(function (p, el) {
        slider_scope($(el));
    });

})(jQuery);