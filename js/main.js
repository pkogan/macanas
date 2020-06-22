AFRAME.registerComponent('markercorrecto', {
    init: function () {
        console.log('markercorrecto initialized');
        this.el.addEventListener('markerFound', () => {
            console.log('marker correcto found!');
            document.getElementById('tabla').innerHTML='Juan Correcto';
        });

    },
});

AFRAME.registerComponent('markerincorrecto', {
    init: function () {
        console.log('markerincorrecto initialized');
        this.el.addEventListener('markerFound', () => {
            console.log('marker incorrecto found!');
            document.getElementById('tabla').innerHTML=
                'Juan: <b>incorrecto</b>';
        });

    },
});

function cambiar(){
    var el = document.querySelector('#entidad');
    el.setAttribute(
        "obj-model",
        'obj:url(modelos/hornero.obj);mtl:url(modelos/hornero.mtl)'
    );
    el.setAttribute("scale",'.10 .10 .10');
    console.log('cambió');
}
