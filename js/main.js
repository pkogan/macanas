AFRAME.registerComponent('markerhandler', {
       init: function () {
           this.el.sceneEl.addEventListener('markerFound', () => {
               console.log('marker found!');
               document.getElementById('tabla').innerHTML='Juan Correcto';
           });

       },
   });

   
   

