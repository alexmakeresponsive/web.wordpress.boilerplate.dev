$ = jQuery;

$( window ).on( "load", function()
{
    var button       = $('#ajax-button-for-ajax-container-1');

    if (button.length === 0) {
        return;
    }

    var data_request = JSON.parse(button.attr('data-request'));

    // console.log('data_request = ', data_request);

    var container    = $('#' + data_request.container_id);

    var page_current  = data_request.paged;
    var max_num_pages = data_request.max_num_pages;


    button.on('click', function(event){
        event.preventDefault();

        getData(data_request);
    });


    function getData(request) {
        request.paged = page_current;

        if (request.found_posts === 0) {
            // $('Проектов нет').appendTo(container);
            return;
        } else {
            $.ajax({
                type: 'POST',
                url: window.location.origin + '/wp-admin/admin-ajax.php',
                data: {
                    'action': data_request.wp_ajax_action_name,   //find this: wp_ajax_post_type_pr, wp_ajax_nopriv_post_type_pr
                    'r' : request
                }
            })
                .done(function(response, textStatus) {
                    // console.log('done: response = ', response);
                    // console.log('done: textStatus = ', textStatus);

                    $(response).appendTo(container);

                    page_current++;

                    // console.log('page_current =', page_current);
                    // console.log('max_num_pages =', max_num_pages);

                    if(page_current === max_num_pages) {
                        button.hide();
                    }
                })
                .fail(function(response, textStatus) {
                    console.log('fail: response = ', response);
                    console.log('fail: textStatus = ', textStatus);
                });
        }
    }
});
