$(document).ready(() => {
    function criarCubo() {
        let randomNumero = Math.random() * 1.2;
        let styleLeft = Math.random() * window.innerWidth;
    
        if (window.innerWidth - styleLeft <= 30) {
            styleLeft = window.innerWidth - 30;
        }
    
        const cubo = document.createElement('div');
        cubo.className = 'cubos';
        cubo.style.left = styleLeft + 'px';
        cubo.style.top = Math.random() * window.innerHeight + 'px';
        cubo.style.opacity = Math.random();
        cubo.style.width = randomNumero * 30 + 'px';
        cubo.style.height = randomNumero * 30 + 'px';
        document.getElementById('background').appendChild(cubo);
    
        cubo.addEventListener('animationiteration', () => {
            document.getElementById('background').removeChild(cubo);
        });
    }
    
    setInterval(criarCubo, 400);
});

document.addEventListener("visibilitychange", function() {
    let elemCubos = document.getElementById('background').querySelectorAll('.cubos');

    if (document.visibilityState == 'visible') {
        elemCubos.forEach((e => {
            e.remove();
        }));
    }
});