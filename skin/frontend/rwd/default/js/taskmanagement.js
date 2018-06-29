jQuery(document).ready(function () {
    jQuery('.href-type').click(function (e) {
        var url = jQuery(this).data('url')
        window.location.href = url;
    });
});


