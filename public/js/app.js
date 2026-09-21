function abrirMenu() {
      document.querySelector('.sidebar').classList.add('activo');
      document.getElementById('fondoMenu').classList.add('activo');
}

function cerrarMenu() {
      document.querySelector('.sidebar').classList.remove('activo');
      document.getElementById('fondoMenu').classList.remove('activo');
}

const inputImagen = document.getElementById('imagenGaleria');
const vistaPrevia = document.getElementById('vistaPrevia');

inputImagen.addEventListener('change', function () {

      const archivo = this.files[0];

      if (archivo) {

            const url = URL.createObjectURL(archivo);

            vistaPrevia.src = url;
            vistaPrevia.style.display = 'block';

      } else {

            vistaPrevia.src = '';
            vistaPrevia.style.display = 'none';

      }

});


