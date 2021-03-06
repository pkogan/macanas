AFRAME.registerComponent('markercorrecto', {
    init: function () {
        console.log('markercorrecto initialized');
        this.el.addEventListener('markerFound', () => {
            console.log('marker correcto found!');
            console.log(this.el.attributes['jugador'].nodeValue);
            jugador=this.el.attributes['jugador'].nodeValue;
            
            //document.getElementById('tabla').innerHTML='Juan Correcto';
            document.getElementById('jugador'+jugador).className = 'correcto';
        });

    },
});

AFRAME.registerComponent('markerincorrecto', {
    init: function () {
        console.log('markerincorrecto initialized');
        this.el.addEventListener('markerFound', () => {
            console.log('marker incorrecto found!');
            console.log(this.el.attributes['jugador'].nodeValue);
            jugador=this.el.attributes['jugador'].nodeValue;
            //document.getElementById('tabla').innerHTML = 'Juan: <b>incorrecto</b>';
            document.getElementById('jugador'+jugador).className = 'incorrecto';
        });

    },
});

function cambiar() {
    var el = document.querySelector('#entidad');
    el.setAttribute(
            "obj-model",
            'obj:url(modelos/oso.obj);mtl:url(modelos/oso.mtl)'
            );
    el.setAttribute("scale", '5 5 5');
    var el = document.querySelector('#entidad2');
    el.setAttribute(
            "obj-model",
            'obj:url(modelos/hornero.obj);mtl:url(modelos/hornero.mtl)'
            );
    el.setAttribute("scale", '.10 .10 .10');
    console.log('cambió');
}
