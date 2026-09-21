const imagenesGaleria = document.querySelectorAll(
  ".foto-galeria img"
);

let imagenActual = 0;

function abrirGaleria(imagen) { 

  imagenActual = Array.from(imagenesGaleria)
    .indexOf(imagen);

  mostrarImagen();

  document.getElementById("modalGaleria")
    .style.display = "flex";

}

function mostrarImagen() { 

  const imagenGrande =
    document.getElementById("imagenGrande");

  const contador =
    document.getElementById("contadorGaleria");

  imagenGrande.src =
    imagenesGaleria[imagenActual].src;

  contador.textContent =
    `${imagenActual + 1} / ${imagenesGaleria.length}`;
}

function cerrarGaleria() { 

  document.getElementById("modalGaleria")
    .style.display = "none";
}

function imagenSiguiente() { 

  imagenActual++;

  if (imagenActual >= imagenesGaleria.length) { 
    imagenActual = 0;
  }

  mostrarImagen();
}

function imagenAnterior() { 

  imagenActual--;

  if (imagenActual < 0) {

    imagenActual = imagenesGaleria.length - 1;

  }

  mostrarImagen();
}

