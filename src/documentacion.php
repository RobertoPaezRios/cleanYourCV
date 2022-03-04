<?php require "./../layout/header.html"; ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./../index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Preguntas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#convertir-pdf-texto">¿Cómo convertir pdf a txt para que funcione correctamente?</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div> -->
  </nav>

  <div class="container text-center">
    <div id="jumbo-doc" class="jumbotron ml-5 mr-5 mt-5 mb-5">
      <h1 class="display-5">Documentación</h1>
      <p class="lead">
        Es muy importante que te informes antes de subir tu CV y que lo hagas de manera
        correcta. Si no obtienes el resultado esperado, prueba a seguir los pasos que aparecen
        en la barra de ayuda.
      </p>
      <hr class="my-4">
      <p>Espero que te haya sido de ayuda esta pagina.</p>
      <button id="btn-primera-vez" class="btn btn-warning btn-lg col-md-5" role="button">¿Cómo limpiar por primera vez mi CV?</button>
    </div>
  </div>

  <div id="pregunta"></div>

  <!-- <p id="convertir-pdf-texto">
    Para convertir tu archivo Pdf con el curriculum de Info Jobs a un archivo de texto solo 
    tienes que entrar a <a href="https://sejda.com" target="_blank">Sejda.com</a> y subir tu archivo Pdf.
  </p><br> -->
  <script src="./js/app.js"></script>
<?php require "./../layout/footer.html"; ?>