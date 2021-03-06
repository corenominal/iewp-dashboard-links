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
            if( data.num_rows === 0 )
            {
                var links = '<span class="nodata"><span class="dashicons dashicons-warning"></span> No links found :-(</span>';
            }
            else
            {
                var links = '<ul>';
                $.each(data.links, function(i, link)
        		{
                    links += '<li>';
                    links += '<img class="favicon" src="' + link.favicon + '"> ';
                    links += '<a href="' + link.url + '" rel="noreferrer" target="_blank">' + link.label + '</a>';
                    links += '<span data-id="' + link.id + '" class="iewp-link-rm"><span class="dashicons dashicons-admin-generic"></span></span>';
                    links += '</li>';
        		});
                links += '</ul>';
            }
            $( '#iewp-links' ).html( links );
        })
        .fail(function( data ) {
            console.log( "error" );
        });

    }
    get_links();

    $( document ).on( 'click', '.iewp-dashboard-links .addlink button', function(e) {
        e.preventDefault();
        $( this ).hide();
        $( '.iewp-link-rm-confirm' ).remove();
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
            else
            {
                get_links();
                $( '.iewp-dashboard-links .linkform' ).slideUp(400, function(e)
                {
                    $( '.iewp-dashboard-links .addlink button' ).show();
                });
            }
        })
        .fail(function() {
            console.log("error");
        });

    });

    $( document ).on( 'click', '.iewp-link-rm', function( e )
    {
        e.preventDefault();
        var parent = $( this ).closest( 'li' );
        if( parent.find( 'button' ).length == 0 )
        {
            $( '.iewp-link-rm-confirm' ).remove();
            var id = $( this ).data( 'id' );
            var confirm = '<div id="iewp-link-rm-confirm' + id + '" class="iewp-link-rm-confirm"><span>Remove link?</span>';
            confirm += '<button data-id="' + id + '" class="iewp-link-rm-yes button">Yes</button> ';
            confirm += '<button class="iewp-link-rm-no button">No</button> ';
            confirm += '</div>';
            parent.append( confirm );
        }
        else
        {
            $( '.iewp-link-rm-confirm' ).remove();
        }
    });

    $( document ).on( 'click', '.iewp-link-rm-no', function(e)
    {
        e.preventDefault();
        $( '.iewp-link-rm-confirm' ).remove();
    });

    $( document ).on( 'click', '.iewp-link-rm-yes', function(e)
    {
        e.preventDefault();
        var endpoint = $( '#iewp-dashboard-links' ).data( 'endpoint-delete' );
        var data = {
            id: $( this ).data( 'id' ),
            apikey: $( '#iewp-dashboard-links' ).data( 'apikey' )
        };
        $.ajax({
            url: endpoint,
            type: 'POST',
            dataType: 'json',
            data: data
        })
        .done(function() {
            get_links();
        })
        .fail(function() {
            console.log("error");
        });

    });

});
