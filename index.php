<?php session_start(); ?>
<?php require "./layout/header.hbs"; ?>
  
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="./index.php">Inicio</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link ml-5" href="./src/documentacion.php">Documentación</a>
      </li>
    </ul>
    <!-- <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </nav>  

  <?php if (isset($_SESSION["message"]) && isset($_SESSION["color"])) { ?>
    <div class="alert alert-<?php echo $_SESSION["color"]; ?> text-center" role="alert">
      <?php echo $_SESSION["message"]; ?>
    </div> 
  <?php } ?>
    
  <div class="container center text-center mt-4 mb-0">
    <div class="jumbotron">
      <br><br><br><br>  
        <?php if (isset($_SESSION["ruta_descargar"])) { ?>
          <a href="<?php echo $_SESSION["ruta_descargar"]; ?>" download="cv_limpio.txt" target="_blank" rel="noopener noreferrer">Tu archivo</a>
        <?php } session_unset(); ?>
        <h1 class="display-3 mt-5">Sube tu CV!</h1><br><br>
        <form action="./src/lectorCurriculum.php" enctype="multipart/form-data" method="POST">
          <input type="file" name="archivo" id="archivo" required><br><br>
          <input type="submit" class="btn btn-warning btn-lg col-md-2" value="Procesar" name="procesar">
        </form>
        <br><br><br><br>  
      </div>
    </div>
    
<?php require "./layout/copy.hbs"; ?>
<?php require "./layout/footer.hbs"; ?>