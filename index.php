<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">

    <title>Macanas</title>
  </head>
  <body>
    <div class="container">
      <h1>Formulario de creación de preguntas.</h1>
      <form>
        <div class="form-group">
          <label for="pregunta">Pregunta</label>
          <input type="text" class="form-control data" id="pregunta"
                 placeholder="¿De qué color era el caballo de San Martín?">
        </div>
        <div class="form-group">
          <label for="jugadores">Jugadores</label>
          <input type="text"  class="form-control data" id="jugadores"
                 placeholder="Juan,Pedro">
          <small class="form-text text-muted">Escriba los nombres separados con comas.</small>
        </div>
        <div class="form-group">
          <label for="op1">Opción 1</label>
          <input type="text" class="form-control data" id="op1"
                 placeholder="Blanco">
        </div>
        <div class="form-group">
          <label for="op2">Opción 2</label>
          <input type="text" class="form-control data" id="op2"
                 placeholder="Negro">
        </div>
        <div class="form-group">
          <label for="opc">¿Opción correcta?</label>
          <div class="form-check">
            <input class="form-check-input data" type="radio" name="opc"
                   value="1" id="radio-op1" checked>
            <label class="form-check-label" for="radio-op1">Opción 1</label>
          </div>
          <div class="form-check">
            <input class="form-check-input data" type="radio" name="opc"
                   value="2" id="radio-op2">
            <label class="form-check-label" for="radio-op2">Opción 2</label>
          </div>
        </div>
        <h2>Modelo correcto</h2>
        <div class="form-group">
          <p>URL Modelo:</p>
          <div class="form-check">
            <input class="form-check-input data" type="radio"
                   name="model"
                   id="radio-preset"
                   checked>
            <label class="form-check-label" for="radio-preset">
              Usar preestablecidos.
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input data" type="radio"
                   name="model"
                   value="obj"
                   id="radio-custom">
            <label class="form-check-label" for="radio-custom">
              Definir un modelo personalizado.
            </label>
          </div>

        <div class="preset-url">
          <p>Seleccione uno predefinido:</p>
          <select class="custom-select" id="preset-name">
            <option selected="1" value="hornero">Hornero</option>
            <option value="carrot">Carrot (Gato)</option>
            <option value="oso">Oso</option>
            <option value="cara">Cara</option>
          </select>
        </div>

        <div id="custom-url">

          <div class="form-group">
            <label for="position">Posición</label>
            <input type="text" class="form-control data" id="model-pos"
                   placeholder="0 0 0">
          </div>
          <div class="form-group">
            <label for="position">Rotación</label>
            <input type="text" class="form-control data" id="model-rot"
                   placeholder="0 0 0">
          </div>
          <div class="form-group">
            <label for="position">Escala</label>
            <input type="text" class="form-control data" id="model-scale"
                   placeholder="0 0 0">
          </div>
          
          <p>URL del modelo:</p>
          <div class="form-check">
            <input class="form-check-input data" type="radio"
                   name="model-type"
                   value="gltf" id="radio-gltf" checked>
            <label class="form-check-label" for="radio-gltf">GLTF</label>
          </div>
          <div class="form-check">
            <input class="form-check-input data" type="radio"
                   name="model-type"
                   value="obj" id="radio-obj">
            <label class="form-check-label" for="radio-obj">OBJ + MLT</label>
          </div>
          <input text="text" class="form-control data" id="model-gltf"
                 placeholder="https://incuba.fi.uncoma.edu.ar/incuba/macanas/modelos/hornero.gltf">
          <input text="text" class="form-control data" id="model-obj"
                 placeholder="https://incuba.fi.uncoma.edu.ar/incuba/macanas/modelos/hornero.obj">
          <input text="text" class="form-control data" id="model-mlt"
                 placeholder="https://incuba.fi.uncoma.edu.ar/incuba/macanas/modelos/hornero.mlt">
        </div><!-- Custom URL -->
        
        </div>
      </form>

      <div class="form-group">
        <label for="url">URL para compartir:</label>
        <input readonly type="text" class="form-control" id="url">
        <br/>
        <a class="btn btn-success"
           href="" target="_blank" id="url-resultado">Ver juego</a>
      </div>
      
    </div>
        
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    
    <script src="./js/index.js" type="module"></script>
  </body>
</html>
