<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <script src="https://aframe.io/releases/1.0.0/aframe.min.js"></script>
    <!-- we import arjs version without NFT but with marker + location based support -->
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <script src="js/main.js"></script>
    
    <body style="margin : 0px; overflow: hidden;">
        <div style="display: inline;position: absolute;top: 10px;color:white; z-index: 50">
        <h1  ><?=$_GET['pregunta']?></h1>
        <h2 >Opción 1 -> <?=$_GET['op1']?></h2>
        <h2 >Opción 2 -> <?=$_GET['op2']?></h2>
        </div>
        <div>Cuenta</div>
        <div id="tabla" style="display: inline;position: absolute;top: 10px;color:white; z-index: 50">
            <?php foreach (explode(',',$_GET['jugadores']) as $jugador){
                echo $jugador;
            }
?>
        </div>
        
        <button style="display: inline;position: absolute;top: 0px;color:red" class="button" id="btn1" onclick="cambiar()">Cambio Modelo</button>
    <a-scene embedded arjs>
        
        <a-marker  preset="hiro">
            <a-entity markerhandler id="entidad"
                position="0 0 0"
                rotation="-50 0 0"
                scale="0.5 0.5 0.5"
                obj-model="obj:url(modelos/hornero.obj);mtl:url(modelos/hornero.mtl)"
                ></a-entity>
        </a-marker>

        <a-marker preset="kanji">
            <a-entity markerincorrecto id="entidad2"
                position="0 0 0"
                rotation="0 90 -90"
                scale="5 5 5"
                obj-model="obj:url(modelos/oso.obj);mtl:url(modelos/oso.mtl)"
                
                ></a-entity>
        </a-marker>
        
<!--        <a-marker type="pattern" url="marcadores/pattern-logozorzal3.patt">
            <a-entity id="entidad"
                position="0 0 0"
                rotation="-50 0 0"
                scale="0.5 0.5 0.5"
                gltf-model="modelos/hornero.gltf"
                ></a-entity>
        </a-marker>
        
        <a-marker type="pattern" url="marcadores/pattern-carrot-small.patt">
            <a-box color="tomato" depth="0.5" height="0.5" width="0.5"></a-box>
            
        </a-marker>-->
      
        
        
        

        
<!--            
gltf-model="modelos/oso.gltf"
gltf-model="modelos/hornero.gltf"-->

        <a-entity camera></a-entity>
    </a-scene>
    <script>
        function cambiar(){
var el = document.querySelector('#entidad');
el.setAttribute("obj-model", 'obj:url(modelos/hornero.obj);mtl:url(modelos/hornero.mtl)');
el.setAttribute("scale",'.10 .10 .10');
console.log('cambió');})
        </script>
</body>
</html>
