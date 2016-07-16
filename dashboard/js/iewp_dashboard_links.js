jQuery(document).ready(function($)
{

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
            link: $( '#iewp_link_url' ).val(),
            apikey: $( '#iewp-dashboard-links' ).data( 'apikey' )
        };
        console.log( data );

        $.ajax({
            url: endpoint,
            type: 'POST',
            dataType: 'json',
            data: data
        })
        .done(function( data ) {
            console.log( data );
        })
        .fail(function() {
            console.log("error");
        });


        var error = false;
        var error = 'foobar';
        if( error )
        {
            var message = '<div id="message" class="error notice"><p>' + error + '</p></div>';
            $( '#iewp-linkform-notify' ).html( message );
        }
    });

});
