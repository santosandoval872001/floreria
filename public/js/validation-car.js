const botonWhatsApp = document.getElementById('btnWhatsApp');

botonWhatsApp.addEventListener('click', function () {

  const nombre = document.getElementById('nombre').value.trim();
  const telefono = document.getElementById('telefono').value.trim();
  const direccion = document.getElementById('direccion').value.trim();

  if (nombre === '') {
    alert('Por favor, escribe tu nombre.');

    return;
  }

  if (telefono === '') {
    alert('Por favor, escribe tu telefono.');

    return;
  }

  if (direccion === '') {
    alert('Por favor, Escribe tu dirección.');

    return;
  }

  let mensaje = `\n* NUEVO PEDIDO - FLORERÍA *\n\n`;;

  mensaje += ` *Cliente:* ${nombre}\n`;
  mensaje += ` *Teléfono:* ${telefono}\n\n`;

  mensaje += ` *Producto:*\n`;
  mensaje += `━━━━━━━━━━━━━━\n`;

  for (const id in carrito) {

    const producto = carrito[id];

    const subtotal = producto.precio * producto.cantidad;

    mensaje += ` *${producto.nombre}*\n`;
    mensaje += `  Cantidad: ${producto.cantidad}\n`;
    mensaje += `  Precio: ${Number(producto.precio).toFixed(2)} c/u\n`;
    mensaje += `  Subtotal: $${subtotal.toFixed(2)}\n\n`;

  }

  mensaje += `━━━━━━━━━━━━━━\n`;
  mensaje += `\n *Total:* $${Number(totalCarrito).toFixed(2)}\n\n`;
  mensaje += `━━━━━━━━━━━━━━\n`;
  
  mensaje += `\n *Dirección de entrega*\n`;
  mensaje += `    ${direccion}\n`;

  const mensajeAdicional = document
    .querySelector('textarea[name="mensaje"]')
    .value
    .trim();

  if (mensajeAdicional !== '') {

    mensaje += `\n *Mensaje adicional:*\n`;
    mensaje += `    ${mensajeAdicional}\n`;

  }

  mensaje += `*Gracias por elegirnos.*` 

  const numeroWhatsApp = '523751388179';

  const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensaje)}`;

  console.log(mensaje);
  console.log(urlWhatsApp);

  window.location.href = urlWhatsApp, '_blank';

  });
