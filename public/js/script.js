function abrirGaleria(imagen) { 

  const modal = document.getElementById("modalGaleria");

  const imagenGrande = document.getElementById("imagenGrande");

  imagenGrande.src = imagen.src;

  modal.style.display = "flex";

}

function cerrarGaleria() { 
  const modal = document.getElementById("modalGaleria");

  modal.style.display = "none";

}