<script>
    (function( w ){
"use strict";
// rel=preload support test
if( !w.loadCSS ){
    w.loadCSS = function(){};
}
// define on the loadCSS obj
var rp = loadCSS.relpreload = {};
// rel=preload feature support test
// runs once and returns a function for compat purposes
rp.support = (function(){
    var ret;
    try {
        ret = w.document.createElement( "link" ).relList.supports( "preload" );
    } catch (e) {
        ret = false;
    }
    return function(){
        return ret;
    };
})();

// if preload isn't supported, get an asynchronous load by using a non-matching media attribute
// then change that media back to its intended value on load
rp.bindMediaToggle = function( link ){
    // remember existing media attr for ultimate state, or default to 'all'
    var finalMedia = link.media || "all";

    function enableStylesheet(){
        // unbind listeners
        if( link.addEventListener ){
            link.removeEventListener( "load", enableStylesheet );
        } else if( link.attachEvent ){
            link.detachEvent( "onload", enableStylesheet );
        }
        link.setAttribute( "onload", null ); 
        link.media = finalMedia;
    }

    // bind load handlers to enable media
    if( link.addEventListener ){
        link.addEventListener( "load", enableStylesheet );
    } else if( link.attachEvent ){
        link.attachEvent( "onload", enableStylesheet );
    }

    // Set rel and non-applicable media type to start an async request
    // note: timeout allows this to happen async to let rendering continue in IE
    setTimeout(function(){
        link.rel = "stylesheet";
        link.media = "only x";
    });
    // also enable media after 3 seconds,
    // which will catch very old browsers (android 2.x, old firefox) that don't support onload on link
    setTimeout( enableStylesheet, 3000 );
};

// loop through link elements in DOM
rp.poly = function(){
    // double check this to prevent external calls from running
    if( rp.support() ){
        return;
    }
    var links = w.document.getElementsByTagName( "link" );
    for( var i = 0; i < links.length; i++ ){
        var link = links[ i ];
        // qualify links to those with rel=preload and as=style attrs
        if( link.rel === "preload" && link.getAttribute( "as" ) === "style" && !link.getAttribute( "data-loadcss" ) ){
            // prevent rerunning on link
            link.setAttribute( "data-loadcss", true );
            // bind listeners to toggle media back
            rp.bindMediaToggle( link );
        }
    }
};

// if unsupported, run the polyfill
if( !rp.support() ){
    // run once at least
    rp.poly();

    // rerun poly on an interval until onload
    var run = w.setInterval( rp.poly, 500 );
    if( w.addEventListener ){
        w.addEventListener( "load", function(){
            rp.poly();
            w.clearInterval( run );
        } );
    } else if( w.attachEvent ){
        w.attachEvent( "onload", function(){
            rp.poly();
            w.clearInterval( run );
        } );
    }
}


// commonjs
if( typeof exports !== "undefined" ){
    exports.loadCSS = loadCSS;
}
else {
    w.loadCSS = loadCSS;
}
}( typeof global !== "undefined" ? global : this ) );
    </script>
        <script type="text/javascript">
            var et_animation_data = [{"class":"et_pb_row_1","style":"fade","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"50%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_row_2","style":"zoomBottom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"6%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_text_1","style":"slideBottom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"10%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_divider_1","style":"zoomLeft","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"50%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_text_2","style":"zoom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"6%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_button_0","style":"zoom","repeat":"once","duration":"1000ms","delay":"100ms","intensity":"10%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_text_3","style":"slideBottom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"10%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_divider_2","style":"zoomLeft","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"50%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_text_4","style":"zoom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"6%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_button_1","style":"zoom","repeat":"once","duration":"1000ms","delay":"100ms","intensity":"10%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_divider_3","style":"slideBottom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"50%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_text_12","style":"foldBottom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"20%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_contact_form_0","style":"foldBottom","repeat":"once","duration":"1000ms","delay":"0ms","intensity":"20%","starting_opacity":"0%","speed_curve":"ease-in-out"}];
        </script>
        <script type='text/javascript'>
/* <![CDATA[ */
var DIVI = {"item_count":"%d Item","items_count":"%d Items"};
var et_shortcodes_strings = {"previous":"Previous","next":"Next"};
var et_pb_custom = {"ajaxurl":"https:\/\/kemuning.palembang.go.id\/wp-admin\/admin-ajax.php","images_uri":"https:\/\/kemuning.palembang.go.id\/wp-content\/themes\/Divi\/images","builder_images_uri":"https:\/\/kemuning.palembang.go.id\/wp-content\/themes\/Divi\/includes\/builder\/images","et_frontend_nonce":"77826f00f2","subscription_failed":"Please, check the fields below to make sure you entered the correct information.","et_ab_log_nonce":"d838aa9760","fill_message":"Please, fill in the following fields:","contact_error_message":"Please, fix the following errors:","invalid":"Invalid email","captcha":"Captcha","prev":"Prev","previous":"Previous","next":"Next","wrong_captcha":"You entered the wrong number in captcha.","wrong_checkbox":"Checkbox","ignore_waypoints":"no","is_divi_theme_used":"1","widget_search_selector":".widget_search","ab_tests":[],"is_ab_testing_active":"","page_id":"95","unique_test_id":"","ab_bounce_rate":"5","is_cache_plugin_active":"no","is_shortcode_tracking":"","tinymce_uri":""}; var et_frontend_scripts = {"builderCssContainerPrefix":"#et-boc","builderCssLayoutPrefix":"#et-boc .et-l"};
var et_pb_box_shadow_elements = [];
var et_pb_motion_elements = {"desktop":[],"tablet":[],"phone":[]};
/* ]]> */
</script>
<script type='text/javascript' src='https://kemuning.palembang.go.id/wp-content/themes/Divi/core/admin/js/common.js?ver=4.4.6'></script>
<script type='text/javascript' src='https://kemuning.palembang.go.id/wp-includes/js/wp-embed.min.js?ver=5.4.2'></script>