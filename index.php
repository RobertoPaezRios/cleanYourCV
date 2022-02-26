<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Limpiador de CV</title>
</head>
<body>

  <?php if (isset($_SESSION["message"]) && isset($_SESSION["color"])) { ?>
    <div class="alert alert-<?php echo $_SESSION["color"]; ?> text-center" role="alert">
      <?php echo $_SESSION["message"]; ?>
    </div> 
  <?php } ?>

  <div class="container center text-center">
    <div class="jumbotron">
      <br><br><br><br><br><br><br><br><br><br>
      <?php if (isset($_SESSION["ruta_descargar"])) { ?>
        <a href="<?php echo $_SESSION["ruta_descargar"]; ?>" target="_blank" rel="noopener noreferrer">Tu archivo</a>
        <?php } session_unset(); ?>
      <h1 class="display-4">Sube tu curriculum!</h1><br><br>
      <form action="./lectorCurriculum.php" enctype="multipart/form-data" method="POST">
        <input type="file" name="archivo" id="archivo" required>
        <input type="submit" class="btn btn-primary btn-lg" value="Procesar" name="procesar">
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>