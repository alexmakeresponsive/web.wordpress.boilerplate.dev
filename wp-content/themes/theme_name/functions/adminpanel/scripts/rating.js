$( window ).on( "load", function() {
    // alert('Wow this is rating.js!!');

    var column_rating_collection = $('td.column-project_rating');

    var markup = '<span class="theme-name-project-rating-stars-1 count-{{count_value}}"></span>';

    column_rating_collection.each(function( index, el ) {
        var count_value_text    = $(el).text();
        var markup_after        = markup.replace('{{count_value}}', count_value_text);

        $(el).html(markup_after);
    });
});
