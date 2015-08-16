/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

( function ( $ ) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages
            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function () {
                // JavaScript to be fired on the home page
            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function () {
                // JavaScript to be fired on the about us page
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function ( func, funcname, args ) {
            var fire;
            var namespace = Sage;
            funcname = ( funcname === undefined ) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if ( fire ) {
                namespace[func][funcname]( args );
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire( 'common' );

            // Fire page-specific init JS, and then finalize JS
            $.each( document.body.className.replace( /-/g, '_' ).split( /\s+/ ), function ( i, classnm ) {
                UTIL.fire( classnm );
                UTIL.fire( classnm, 'finalize' );
            } );

            // Fire common finalize JS
            UTIL.fire( 'common', 'finalize' );
        }
    };

    // Load Events
    $( document ).ready( UTIL.loadEvents );

    $( document ).ready( function () {

        //let's put first li-item as active
        $( ".nav" ).children( "li:first-child" ).addClass( "active" );

        //is there tinyMCE and is it active?
        is_tinyMCE_active = false;
        if ( typeof ( tinyMCE ) !== "undefined" ) {
            if ( tinyMCE.activeEditor == null || tinyMCE.activeEditor.isHidden() !== false ) {
                is_tinyMCE_active = true;
            }
        }

        if ( is_tinyMCE_active ) {
            /**
             * Adds shortcode buttons to tinyMCE editor
             * Adds keyboard shortcut to tinyMCE editor
             */
            ( function () {
                tinymce.create( 'tinymce.plugins.section', {
                    init: function ( ed, url ) {
                        ed.addButton( 'irajala_section_shortcode_title1', {
                            title: 'Add a section',
                            icon: 'icon-h1',
                            onclick: function () {
                                ed.windowManager.open( {
                                    title: 'Add the parameters for shortcode',
                                    body: [
                                        {
                                            type: 'checkbox',
                                            name: 'subtitle',
                                            label: 'Subtitle?',
                                            autofocus: 'true'
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'textboxTitle',
                                            label: 'Title',
                                            value: ''
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'textboxSubtitle',
                                            label: 'Subtitle',
                                            value: ''
                                        }
                                    ],
                                    onsubmit: function ( e ) {
                                        if (e.data.subtitle){
                                            ed.selection.setContent( '<h2>[section title="' + e.data.textboxTitle + '" subtitle="' + e.data.textboxSubtitle + '"]' + ed.selection.getContent() + '[/section]</h2>' );
                                        }else {
                                            ed.selection.setContent( '<h1>[section title="' + e.data.textboxTitle + '" subtitle="' + e.data.textboxSubtitle + '"]' + ed.selection.getContent() + '[/section]</h1>' );
                                        }
                                    }
                                } );
                            }
                        } );

                        // Add shortcut for h1-title+shortcode
                        ed.addShortcut( 'alt+z', 'description', 'irajala_section_shortcode_h1' );
                        ed.addCommand( 'irajala_section_shortcode_h1', function () {
                            var selected_text = ed.selection.getContent();
                            var return_text = '';

                            if ( selected_text !== "" ) {

                                ed.windowManager.open( {
                                    title: 'Syötä lyhytkoodin parametrit',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'textboxTitle',
                                            label: 'Title'
                                        },
                                        {
                                            type: 'checkbox',
                                            name: 'subtitle',
                                            label: 'Subtitle?',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'textboxSubtitle',
                                            label: 'Subtitle'
                                        }
                                    ],
                                    onsubmit: function ( e ) {
                                        if (e.data.subtitle){
                                            return_text = '<h2>[section title="' + e.data.textboxTitle + '" subtitle="' + e.data.textboxSubtitle + '"]' + selected_text + '[/section]</h2>';
                                        }else {
                                            return_text = '<h1>[section title="' + e.data.textboxTitle + '" subtitle="' + e.data.textboxSubtitle + '"]' + selected_text + '[/section]</h1>';
                                        }
                                        ed.execCommand( 'mceInsertContent', 0, return_text );
                                    }
                                } );
                            }
                            
                        } );
                    }
                } );
                tinymce.PluginManager.add( 'irajala_section_shortcode', tinymce.plugins.section );
            } )();
        }

    } );

} )( jQuery ); // Fully reference jQuery after this point.
