$(document).ready(() => {
    $('#bars-icon').on('click', () => {
        if($('#header').css('height') == '80px') {
            $('#header').css('height', '295px');

            $('#header-row-two').css({
                'visibility': 'visible',
                'opacity': '1'
            });
            $('#header-row-three').css({
                'visibility': 'visible',
                'opacity': '1'
            });

        } else {
            $('#header').css('height', '80px');

            $('#header-row-two').css({
                'visibility': 'hidden',
                'opacity': '0'
            });
            $('#header-row-three').css({
                'visibility': 'hidden',
                'opacity': '0'
            });

        }
        
    });

    console.log(document.getElementById('container').offsetHeight)

    let scrollY = 0;

    $('#container').scroll(() => {
        scrollY = $('#container').scrollTop();
        
        if(scrollY >= 70) {
            $('#header-fixado').css('opacity', '1');

            $('#bars-icon').css('cursor', 'default');

            $('#header').css({
                'height': '80px',
                'opacity': '0'
            });

            $('#header-row-two').css({
                'visibility': 'hidden',
                'opacity': '0'
            });
            
            $('#header-row-three').css({
                'visibility': 'hidden',
                'opacity': '0'
            });
        } else {
            $('#bars-icon').css('cursor', 'pointer');

            $('#header-fixado').css('opacity', '0');

            $('#header').css('opacity', '1');
        }
    });

});