$(document).ready(() => {
    $('.logo').hover(
        function() {
            mudarCor();
        }, 
        function () {
            resetarCor();
        }
    );
    
    function mudarCor() {
        $('.logo-letras').css('color', 'var(--lightBlue)')
        $('.logo-barra').css('color', 'var(--white)')
    }
    
    function resetarCor() {
        $('.logo-letras').css('color', 'var(--white)')
        $('.logo-barra').css('color', 'var(--lightBlue)')
    }
});
