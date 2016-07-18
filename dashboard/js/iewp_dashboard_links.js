jQuery(document).ready(function($)
{

    function get_links()
    {
        var endpoint = $( '#iewp-dashboard-links' ).data( 'endpoint' );
        var data = {
            apikey: $( '#iewp-dashboard-links' ).data( 'apikey' )
        };
        $.ajax({
            url: endpoint,
            type: 'GET',
            dataType: 'json',
            data: data
        })
        .done(function( data ) {
            console.log( data );
        })
        .fail(function( data ) {
            console.log( "error" );
        });

    }
    get_links();

    $( document ).on( 'click', '.iewp-dashboard-links .addlink button', function(e) {
        e.preventDefault();
        $( this ).hide();
        $( '#iewp_link_label' ).val( '' );
        $( '#iewp_link_url' ).val( '' );
        $( '#iewp-linkform-notify' ).html( '' );
        $( '.iewp-dashboard-links .linkform' ).slideDown(400);
    });

    $( document ).on( 'click', '#iewp_link_cancel', function( e )
    {
        e.preventDefault();
        $( '.iewp-dashboard-links .linkform' ).slideUp(400, function(e)
        {
            $( '.iewp-dashboard-links .addlink button' ).show();
        });
    });

    $( document ).on( 'click', '#iewp_link_save', function(e)
    {
        e.preventDefault();
        $( '#iewp-linkform-notify' ).html( '' );
        var endpoint = $( this ).data( 'endpoint' );
        var data = {
            label: $( '#iewp_link_label' ).val(),
            url: $( '#iewp_link_url' ).val(),
            apikey: $( '#iewp-dashboard-links' ).data( 'apikey' )
        };

        $.ajax({
            url: endpoint,
            type: 'POST',
            dataType: 'json',
            data: data
        })
        .done(function( data ) {
            if( data.error )
            {
                var message = '<div id="message" class="error notice"><p>Error: ' + data.error + '</p></div>';
                $( '#iewp-linkform-notify' ).html( message );
            }
        })
        .fail(function() {
            console.log("error");
        });

    });

});
