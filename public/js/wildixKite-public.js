//(function( $ ) {
//	'use strict';

    function kiteAlive(id){
        src = 'https://kite.wildix.com/infonet/' + id + '/api/presence/image?' + Math.random();
        jQuery('#' + id).attr('src', src);
        console.log('id', id);
        setTimeout(function(){
            kiteAlive(id);
        }, 30000);
    }    

//})( jQuery );
