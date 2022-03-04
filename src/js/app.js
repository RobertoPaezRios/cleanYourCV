document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('btn-primera-vez');
  const jumboDoc = document.getElementById('jumbo-doc');
  const pregunta = document.getElementById('pregunta');

  btn.onclick = () => {
    jumboDoc.classList.add('d-none');
    pregunta.innerHTML = `
    <div class="container text-center">
      <div id="jumbo-pregunta" class="jumbotron ml-5 mr-5 mt-5 mb-5">
        <h1 class="display-5">¿Cómo limpiar mi primer CV?</h1>
        <p class="lead">
          Primero entras en <a href="https://sejda.com/" target="_blank">sejda.com</a> y eliges la opción de convertir pdf a txt
          , después seleccionas tu archivo txt que descargaste desde <a href="https://sejda.com/" target="_blank">sejda.com</a>
          de <strong>InfoJobs</strong> y pulsas "Procesar". Encima del texto "Sube tu Cv!",
          aparecerá un enlace con tu archivo limpio, solo tienes que pulsarlo y ya lo tendras descargado.
        </p>
        <!-- <hr class="my-4">
        <p>Espero que te haya sido de ayuda esta pagina.</p> -->
        <button id="btn-ok" class="btn btn-warning btn-lg col-md-5" role="button">
          OK
        </button>
      </div>
    </div>
    `;

    const btnOk = document.getElementById('btn-ok');
    
    btnOk.onclick = () => {
      pregunta.innerHTML = "";
      jumboDoc.classList.remove('d-none');
    }
  }
});