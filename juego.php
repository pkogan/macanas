<?php
$jugadores = 'juan,pedro';
if (isset($_GET['jugadores'])) {
    $jugadores = $_GET['jugadores'];
}
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <script src="https://aframe.io/releases/1.0.0/aframe.min.js"></script>
    <!-- we import arjs version without NFT but with marker + location based support -->
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <script src="js/main.js"></script>

    <!-- Cuenta-->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/cuenta.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
            font-size: 17px;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
        }

        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }

        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }

        /*
                                     $$\           $$\                                   
                                     $$ |          $$ |                                  
$$$$$$$\  $$$$$$\  $$\   $$\ $$$$$$$\ $$$$$$\    $$$$$$$ | $$$$$$\  $$\  $$\  $$\ $$$$$$$\  
$$  _____|$$  __$$\ $$ |  $$ |$$  __$$\\_$$  _|  $$  __$$ |$$  __$$\ $$ | $$ | $$ |$$  __$$\ 
$$ /      $$ /  $$ |$$ |  $$ |$$ |  $$ | $$ |    $$ /  $$ |$$ /  $$ |$$ | $$ | $$ |$$ |  $$ |
$$ |      $$ |  $$ |$$ |  $$ |$$ |  $$ | $$ |$$\ $$ |  $$ |$$ |  $$ |$$ | $$ | $$ |$$ |  $$ |
\$$$$$$$\ \$$$$$$  |\$$$$$$  |$$ |  $$ | \$$$$  |\$$$$$$$ |\$$$$$$  |\$$$$$\$$$$  |$$ |  $$ |
\_______| \______/  \______/ \__|  \__|  \____/  \_______| \______/  \_____\____/ \__|  \__|
        */                                                                                            
        .countdown-wrap {
            text-align: center;
            margin: 10px 0 20px;
        }
        .count-headline {
            font-weight: 600;
        }
        .countdown {
            list-style: none;
        }
        .countdown li {
            display: inline-block;
            color: #fafafa;
        }
        .countdown li > p {
            font-size: 0.725rem;
            font-weight: 600;
        }
        .flap {
            margin: 0 25px;
            font-size: 2.25rem;
            font-weight: 600;
            line-height: 1;
            min-width: 40px;
            min-height: 40px;
        }
        #tabla{
            float: right;
        }

        .inicio{
            color: yellow;

        }
        .correcto{
            color:green;
        }
        .incorrecto{
            color:red;
        }
    </style>

    <body style="margin : 0px; overflow: hidden;">
 

        <button style="display: inline;position: absolute;top: 0px;color:red;z-index:9999" class="button" id="btn1" onclick="cambiar()">Cambio Modelo</button>
    <a-scene embedded arjs>

        <a-marker markercorrecto preset="hiro">
            <a-entity id="entidad"
                      position="0 0 0"
                      rotation="-50 0 0"
                      scale="0.5 0.5 0.5"
                      obj-model="obj:url(modelos/hornero.obj);mtl:url(modelos/hornero.mtl)"
                      ></a-entity>
        </a-marker>

        <a-marker markerincorrecto preset="kanji">
            <a-entity id="entidad2"
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

    <div class="content">

        <!--                        <button id="myBtn" onclick="myFunction()">P</button>-->

        <div class="container" data-lead-id="section01-container">
            <div class="countdown-wrap" data-lead-id="countdown-wrap">
                <h2 id="msj" class="count-headline" data-lead-id="countdown-headline"><?= $_REQUEST['pregunta'] ?><br/>
                    <input type="radio"> OP1 <?= $_GET['op1'] ?> </input> | <input type="radio"> OP2 <?= $_GET['op2'] ?></radio></h2>
                <div id="tabla">
                    <?php
                    foreach (explode(',', $jugadores) as $key=>$jugador) {
                        echo "<div  id='jugador".$key."' class='inicio'>".$jugador." </div>";
                    }
                    ?>
                </div>
                <ul class="countdown" data-lead-id="countdown">
                    <li>
                        <div class="flap">
                            <span id="days" class="days">03</span>
                        </div>
                        <p class="timeRefDays" data-lead-id="days">DIAS</p>
                    </li>
                    <li>
                        <div class="flap">
                            <span id="hours" class="hours">15</span>
                        </div>
                        <p class="timeRefHours" data-lead-id="hours">HORAS</p>
                    </li>
                    <li>
                        <div class="flap">
                            <span id="minutes" class="minutes">53</span>
                        </div>
                        <p class="timeRefMinutes" data-lead-id="minutes">MINUTOS</p>
                    </li>
                    <li>
                        <div class="flap">
                            <span id="seconds" class="seconds">25</span>
                        </div>
                        <p class="timeRefSeconds" data-lead-id="seconds">SEGUNDOS</p>
                    </li>
                </ul>
                <p><a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br/> <a href="index.php">Mas info</a></p>
            </div>

        </div>


    </div>
    <script>

        // Get the video
        var webinar = new Date(<?= $_REQUEST['fin'] ?>);

        var video = document.getElementById("myVideo");

        // Get the button
        var btn = document.getElementById("myBtn");

        // Pause and play the video, and change the button text
        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }

    </script>
</body>
</html>
