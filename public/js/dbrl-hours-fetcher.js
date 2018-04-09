(function ( $ ) {
  "use strict";

  // Update the hours at page load. (And maybe on other actions?)
  refresh_results();

  function refresh_results() {
      $.ajax({
        type: "get",
        url: ajaxurl || "/wp-admin/admin-ajax.php",
        data: {
          'action': 'get_dbrl_hours',
        },
        error: function ( err ) {
            console.log( 'API error', err );
        }
    }).done(function(result) {
      update_hours_block(result);
    });
  }

  // Write the response. Would be cooler to use a js template, but this is pretty lightweight.
  function update_hours_block( response ) {
    var hours = response.data || [];

    $.each( hours, function( index, element ) {
      var entry = $( "#branch-hours #hours-" + element.branch );

      entry.find( ".branch-name" ).html( element.label );
      entry.find( ".hours-detail" ).html( element.hours );
    });
  }
}(jQuery));
