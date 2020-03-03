/*
 * jQuery File Upload Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $ */

$(function() {
    'use strict';

    // Initialize the jQuery File Upload widget:
    let $file_el = $('#fileupload');
    $file_el.fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'json/upload_files.php'
    });

    // Enable iframe cross-domain access via redirect option:
    $file_el.fileupload(
        'option',
        'redirect',
        window.location.href.replace(/\/[^/]*$/, '/cors/result.html?%s')
    );


    // Load existing files:
    $file_el.addClass('fileupload-processing');
    $.ajax({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: $file_el.fileupload('option', 'url'),
        dataType: 'json',
        context: $file_el[0]
    }).always(function() {
        $(this).removeClass('fileupload-processing');
    }).done(function(result) {
        $file_el
            .fileupload('option', 'done')
            // eslint-disable-next-line new-cap
            .call(this, $.Event('done'), { result: result });
    });
});
