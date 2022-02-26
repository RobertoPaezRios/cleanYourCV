<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<?php
mkdir("upload", 0777);
session_start();

$cont = 0;
$idFila = 3;


$target_dir = "upload/";
$targetFila = $target_dir . basename($_FILES["archivo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFila, PATHINFO_EXTENSION));

echo $imageFileType;

if ($imageFileType == "txt") {
  if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFila)) {
    echo "The file ". htmlspecialchars(basename($_FILES["archivo"]["name"])) . " has been uploaded.";
    $_SESSION['message'] = "Se subió el archivo satisfactoriamente";
    $_SESSION['color'] = "success";
    $_SESSION["ruta_descargar"] = "./cv_limpio.txt";
    header("Location: index.php");
  } else {
    echo "The file can't be uploaded";
    $_SESSION['message'] = "Hubo un problema para subir el archivo";
    $_SESSION['color'] = "danger";
  
    header("Location: index.php");
  }
} else {
  $_SESSION["message"] = "Solo se permiten subir archivos de tipo txt";
  $_SESSION["color"] = "warning";
  header("Location: index.php");
}
echo "<br><br>";



if ($file = fopen("./upload/" . $_FILES["archivo"]["name"], "r")) {  
  $archivoEscribir = fopen("cv_limpio.txt", "w");
  while (!feof($file)) {
    $cont++;
    $line = fgets($file);
    if (str_contains($line, "proceso"))  {
      $idFila = $cont;
    }
    if ($cont == $idFila + 1 && !str_contains($line, '" Executive')) {
      echo trim($line) . " , ";
      fwrite($archivoEscribir, trim($line) . " , ");
    } else if (str_contains($line, '" Executive')){
      $idFila += 1;
    }
    //BUSCAR EMAIL Y TELEFONO//
    if (str_contains ($line, "@") && str_contains($line, ".")) {
      $palabras = explode (" ", $line);
      $telefono = $palabras[3] . $palabras[4] . $palabras[5];
      //echo trim($palabras[1]) . " , " . trim($telefono) . " , ";
      fwrite($archivoEscribir, trim($palabras[1]) . " , ");
      fwrite($archivoEscribir, trim($telefono) . " , ");
    }
    //BUSCAR FECHA DE NACIMIENTO Y DIRECCIÓN//
    if (str_contains($line, "Edad:")) {
      $fragmentos = explode (" ", $line);
      for ($i = 0; $i < sizeof($fragmentos); $i++) {
        if (str_contains($fragmentos[$i], "(")) {
          $fragmentos[$i][0] = " ";
          $fragmentos[$i][11] = " ";
          //echo trim($fragmentos[$i]) . " , ";
          fwrite($archivoEscribir, trim($fragmentos[$i]) . " , ");
          break;
        }
      }
      $direccion = "";
      for ($i = 5; $i < sizeof($fragmentos); $i++) {
        $direccion .= $fragmentos[$i];
      }

      $nErrores = 0;
      $aux = "";
      $auxLimpio = "";
      $direccionLimpia = explode(",", $direccion);
      //PONER EL CODIGO POSTAL EN LA PRIMERA COLUMNA//
      for ($i = 0; $i < sizeof($direccionLimpia); $i++) {
        for ($a = 0; $a < 5; $a++) {
          if ($direccionLimpia[$i] <= 99999) {
            $aux = $direccionLimpia[0];
            $direccionLimpia[0] = $direccionLimpia[$i];
            $direccionLimpia[$i] = $aux;
            break;
          } else {
            $nErrores+=0.2;
          }
        }
        if ($nErrores == 4) {
          $direccionLimpia[0] = "NO DISPONIBLE";
        }
      }
      //echo trim($direccionLimpia[0]) . " , ";
      fwrite($archivoEscribir, trim($direccionLimpia[0]) . " , ");
      if (empty($direccionLimpia[1])) { /*echo "NO DISPONIBLE , ";*/ fwrite($archivoEscribir, "NO DISPONIBLE , "); }
      if (empty($direccionLimpia[2])) { /*echo "NO DISPONIBLE , ";*/ fwrite($archivoEscribir, "NO DISPONIBLE , "); }
      if (empty($direccionLimpia[3])) { /*echo "NO DISPONIBLE , ";*/ fwrite($archivoEscribir, "NO DISPONIBLE , "); }
      if (empty($direccionLimpia[4])) { /*echo "NO DISPONIBLE , ";*/ fwrite($archivoEscribir, "NO DISPONIBLE , "); }
      if (isset($direccionLimpia[1]) && empty($direccionLimpia[2])) { 
        //echo trim($direccionLimpia[1]);
        fwrite($archivoEscribir, trim($direccionLimpia[1])); 
      } 
      if (isset($direccionLimpia[1]) && isset($direccionLimpia[2])){
        //echo trim($direccionLimpia[1]) . " , ";
        fwrite($archivoEscribir, $direccionLimpia[1] . " , ");
      }
      if (isset($direccionLimpia[2]) && str_contains($direccionLimpia[2], "!")) { 
        $auxLimpio = explode ("!", $direccionLimpia[2]);
        //echo $auxLimpio[0];
        fwrite($archivoEscribir, trim($auxLimpio[0]));
      }
      //echo "<br>";
      fwrite($archivoEscribir, PHP_EOL);
    }
  }
  fclose($file);
  fclose($archivoEscribir);
}

?>