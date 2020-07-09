<?php

$marcadores=array();
$marcadores[0]='position="0 0 0"
rotation="90 0 0"
scale="2 2 2"
src="modelos/monedas/Africa/Chad/Galileo.jpg"';

$marcadores[1]='position="0 0 0"
  rotation="90 0 0"
  scale="2 2 2"
  src="modelos/monedas/Africa/Chad/GalileoR.jpg"';

$marcadores[2]='position="0 0 0"
rotation="90 0 0"
scale="2 2 2"
src="modelos/monedas/Africa/Congo/Kant.jpg"';

$marcadores[3]='position="0 0 0"
  rotation="90 0 0"
  scale="2 2 2"
  src="modelos/monedas/Africa/Congo/KantR.jpg"';

$marcadores[4]='position="0 0 0"
rotation="90 0 0"
scale="2 2 2"
src="modelos/monedas/Africa/RepSaharavi/Galileo.jpg"';

$marcadores[5]='position="0 0 0"
  rotation="90 0 0"
  scale="2 2 2"
  src="modelos/monedas/Africa/RepSaharavi/GalileoR.jpg"';


//obj-model="obj:url(modelos/oso.obj);mtl:url(modelos/oso.mtl)"';
/*
$marcadores[2]='position="0 0 0"
    rotation="90 180 0"
    scale="2 2 2"
    obj-model="obj:url(modelos/pikachu.obj);mtl:url(modelos/pikachu.mtl)"';

$marcadores[3]='position="0 0 0"
    rotation="90 0 0"
    scale="0.1 0.1 0.1"
    gltf-model="modelos/Batman.gltf"';

$marcadores[4]='position="0 0 0"
    rotation="-90 -90 0"
    scale="0.3 0.3 0.3"
    gltf-model="modelos/sonic_2/Sonic the Hedgehog.gltf"';
    //gltf-model="modelos/sonic/model.gltf"';

$marcadores[5]='position="0 0 0"
    rotation="-90 -90 0"
    scale="1 1 1"
    gltf-model="modelos/serpiente/model.gltf"';


/*$marcadores[5]='position="0 0 0"
    rotation="90 0 0"
    scale="0.1 0.1 0.1"
    gltf-model="modelos/serpiente.gltf"';
 * */
 


?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <script src="https://aframe.io/releases/1.0.0/aframe.min.js"></script>
    <!-- we import arjs version without NFT but with marker + location based support -->
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <script src="js/main.js"></script>

    <!-- Cuenta-->

    <body style="margin : 0px; overflow: hidden;">


<!--        <button style="display: inline;position: absolute;top: 0px;color:red;z-index:9999" class="button" id="btn1" onclick="cambiar()">Cambio Modelo</button>-->
<!--    <a-scene embedded arjs>-->
    <a-scene embedded arjs='sourceType: webcam; debugUIEnabled: false; detectionMode: mono_and_matrix; matrixCodeType: 3x3;'>
    <?php 
    $idOpcion=$_REQUEST['opc']==1?0:1; 
    foreach ($marcadores as $key=>$jugador) {
      ?>
        <a-marker type="barcode" jugador="<?=$key?>"  value="<?= ($key)?>">
            <a-image id="entidad1j<?=$key?>"  <?=$marcadores[$key]?> ></a-image>
<!--            <a-entity id="entidad1j<?=$key?>"  <?=$marcadores[$key]?> ></a-entity>-->
        </a-marker>
        
    <?php }?>

        <a-entity camera></a-entity>
    </a-scene>




</body>
</html>
