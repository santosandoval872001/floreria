<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Florería</title>
</head>

<body>

    {{-- NAVBAR DE COMPUTADORA --}}
    <nav class="navbar navbar-expand-lg navbar-floreria">

        <div class="container">

            {{-- Logo --}}
            <a href="" class="navbar-brand">
                🌸 Florería
            </a>

            {{-- Menú para PC y tablet --}}
            <div class="collapse navbar-collapse" id="menuPrincipal">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a href="#inicio" class="nav-link">
                            Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#flores" class="nav-link">
                            Flores
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#galeria" class="nav-link">
                            Galería
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#nosotros" class="nav-link">
                            Nosotros
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#contacto" class="nav-link">
                            Contacto
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    {{-- NAVBAR DE CELULAR --}}
    <nav class="navbar-mobile">
        <a href="#inicio" class="mobile-link">
            <span class="mobile-icon text-center">⌂<span> <br>
                </span>Inicio</span>
        </a>

        <a href="#flores" class="mobile-link">
            <span class="mobile-icon text-center">✿<span> <br>
                </span>Flores</span>
        </a>

        <a href="#galeria" class="mobile-link">
            <span class="mobile-icon text-center">▧<span> <br>
                </span>Galería</span>
        </a>

        <a href="#contacto" class="mobile-link">
            <span class="mobile-icon text-center">♡<span> <br>
                </span>Contacto</span>
        </a>


    </nav>

    {{-- HERO DE LA PÁGINA --}}
    <section class="hero" id="inicio">

        <div class="hero-contenido">

            <h1>
                Flores que hablan por ti
            </h1>

            <p class="hero-descripcion">
                Creamos arreglos florales para hacer especiales los momentos más importantes.
            </p>

            <a href="#flores" class="btn btn-flor">
                Ver flores
            </a>

        </div>

    </section>

    {{-- FLORES --}}
    <section class="flores" id="flores">

        <div class="container">

            <div class="seccion-titulo">

                <p>Nuestras creaciones</p>

                <h2>Nuestros arreglos</h2>

                <span>
                    Diseñamos cada arreglo para hacer especial cada momento.
                </span>

            </div>

            <div class="row g-4 justify-content-center">

                @foreach ($flores as $flor)
                    {{-- FLORES --}}
                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="card card-flor {{ !$flor->disponible ? 'flor-agotada' : '' }}">

                            <div class="imagen-flor">

                                <img src="{{ str_starts_with($flor->imagen, 'flores/')
                                    ? asset('storage/' . $flor->imagen)
                                    : asset('img/' . $flor->imagen) }}"
                                    class="card-img-top" alt="{{ $flor->nombre }}">

                                @if (!$flor->disponible)
                                    <div class="liston-agotado">
                                        AGOTADO
                                    </div>
                                @endif

                            </div>

                            <div class="card-body">

                                <h3 class="card-title">
                                    {{ $flor->nombre }}
                                </h3>

                                <p class="card-text">
                                    {{ $flor->descripcion }}
                                </p>

                                @if ($flor->disponible)
                                    <span class="estado disponible">
                                        ✓ Disponible
                                    </span>

                                    <div class="card-pie">

                                        <span class="precio">
                                            ${{ number_format($flor->precio, 2) }}
                                        </span>

                                        <a href="#" class="btn btn-flor">
                                            Pedir
                                        </a>

                                    </div>
                                @else
                                    <span class="estado agotado">
                                        ✕ Agotado
                                    </span>

                                    <div class="card-pie">

                                        <span class="precio">
                                            ${{ number_format($flor->precio, 2) }}
                                        </span>

                                        <a href="#" class="btn btn-flor agotado-boton">
                                            No disponible
                                        </a>

                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    {{-- OCASIONES --}}
    <section class="ocasiones">

        <div class="container">

            <div class="seccion-titulo">

                <p>Momentos especiales</p>

                <h2>Flores para cada ocasión</h2>

                <span>
                    Encuentra el arreglo perfecto para cada momento de tu vida.
                </span>

            </div>

            <div class="row g-4">

                {{-- ANIVERSARIO --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <a href="#flores" class="ocasion-card">

                        <img src="{{ asset('img/aniversario.jpg') }}" alt="Flores para aniversario">

                        <div class="ocasion-overlay">

                            <h3>Aniversarios</h3>

                            <span>Celebra el amor</span>

                        </div>

                    </a>

                </div>

                {{-- BODAS --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <a href="#flores" class="ocasion-card">

                        <img src="{{ asset('img/bodas.jpg') }}" alt="Flores para bodas">

                        <div class="ocasion-overlay">

                            <h3>Bodas</h3>

                            <span>Un día inolvidable</span>

                        </div>

                    </a>

                </div>

                {{-- GRADUACCION --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <a href="#flores" class="ocasion-card">

                        <img src="{{ asset('img/graduaciones.jpg') }}" alt="Flores para graduaciones">

                        <div class="ocasion-overlay">

                            <h3>Graduaciones</h3>

                            <span>Celebra tus logros</span>

                        </div>

                    </a>

                </div>

                {{-- CUMPLEAÑOS --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <a href="#flores" class="ocasion-card">

                        <img src="{{ asset('img/cumpleaños.jpg') }}" alt="Flores para cumpleaños">

                        <div class="ocasion-overlay">

                            <h3>Cumpleaños</h3>

                            <span>Un detalle especial</span>

                        </div>

                    </a>

                </div>

                {{-- DETALLE --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <a href="#flores" class="ocasion-card">

                        <img src="{{ asset('img/declaracion.jpg') }}" alt="Flores para regalar">

                        <div class="ocasion-overlay">

                            <h3>Un detalle</h3>

                            <span>Porque cualquier día puede ser especial</span>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </section>

    {{-- GALERIA --}}
    <section class="galeria" id="galeria">

        <div class="container">

            <div class="seccion-titulo">

                <p>Momentos que florecen</p>

                <h2>Nuestra galería</h2>

                <span>Algunos de nuestros arreglos y momentos especiales.</span>

            </div>

            <div class="row g-3 foto-galeria">

                @forelse ($imagenesGaleria as $imagen)
                    <div class="col-6 col-md-4">

                        <img src="{{ asset('storage/' . $imagen->imagen) }}" alt="Fotografía de la florería"
                            onclick="abrirGaleria(this)">

                    </div>

                @empty

                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Proxímamente encontrarás fotografías de nuestros arreglos.
                        </p>
                    </div>
                @endforelse


            </div>

        </div>

    </section>

    {{-- BOTONES-CERRAR-ANTERIOR-SIGUIENTE --}}
    <div class="modal-galeria" id="modalGaleria">

        <button class="cerrar-galeria" onclick="cerrarGaleria()">
            &times;
        </button>

        <button class="galeria-anterior" onclick="imagenAnterior()">
            &#10094;
        </button>

        <div class="imagen-contenedor">

            <img src="" alt="Imagen ampliada" id="imagenGrande">

            <span id="contadorGaleria">
                1 / 6
            </span>

        </div>

        <button class="galeria-siguiente" onclick="imagenSiguiente()">
            &#10095;
        </button>

    </div>

    {{-- NOSOTRO --}}
    <section class="nosotros" id="nosotros">

        <div class="container">

            <div class="row align-item-center g-5">

                {{-- Imagen --}}
                <div class="col-12 col-lg-6">

                    <div class="nosotros-imagen">

                        <img src="{{ asset('img/nosotros.jpg') }}" alt="Preparacion de arreglos florales">

                    </div>

                </div>

                {{-- Texto --}}
                <div class="col-12 col-lg-6">

                    <div class="nosotros-contenido">

                        <p class="nosotros-subtitulo">
                            Conócenos
                        </p>

                        <h2>
                            Flores que nacen para
                            <span>hacer momentos especiales</span>
                        </h2>

                        <p>
                            En nuestra florería creemos que cada ocasión
                            merece un detalle especial. Por eso creamos
                            arreglos florales pensados para transmitir
                            emociones y acompañar los momentos más importantes.
                        </p>

                        <p>
                            Trabajamos con flores frescas y ponemos
                            atención en cada detalle para que tu arreglo
                            sea tan especial como la persona que lo recibe.
                        </p>

                        {{-- Caracteristicas --}}
                        <div class="nosotros-caracteristicas">

                            <div class="caracteristicas">

                                <span class="caracteristicas-icono">
                                    🌷
                                </span>

                                <div>

                                    <h3>
                                        Flores frescas
                                    </h3>

                                    <p>
                                        Seleccionamos nuestras flores
                                        para ofrecer la mejor calidad.
                                    </p>

                                </div>

                            </div>

                            <div class="caracteristicas">

                                <div class="caracteristicas-icono">
                                    💐
                                </div>

                                <div>
                                    <h3>
                                        Arreglos personalizados
                                    </h3>

                                    <p>
                                        Creamos diseños para cada
                                        ocasión y personalizada.
                                    </p>
                                </div>

                            </div>

                            <div class="caracteristicas">

                                <div class="caracteristicas-icono">
                                    ❤️
                                </div>

                                <div>
                                    <h3>
                                        Hechos con cariño
                                    </h3>

                                    <p>
                                        Cuidamos cada detalle de principo
                                        a fin.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- PEDIDOS --}}
    <section class="pedidos" id="pedidos">

        <div class="container">

            <div class="seccion-titulo">

                <p>Haz tu pedido</p>

                <h2>
                    Enviar flores nunca fue tan fácil
                </h2>

                <span>
                    Elige tu arreglo y nosotros nos encargamos
                    del resto.
                </span>

            </div>

            <div class="row g-4 justify-content-center">


                {{-- Paso 1 --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <div class="paso-pedido">

                        <div class="paso-icono">
                            🌷
                        </div>

                        <span class="paso-numero">
                            01
                        </span>

                        <h3>
                            Elige tus flores
                        </h3>

                        <p>
                            Explora nuestros arrglos y
                            encuentra el detalle perfeco.
                        </p>

                    </div>

                </div>

                {{-- Paso 2 --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <div class="paso-pedido">

                        <div class="paso-icono">
                            💐
                        </div>

                        <span class="paso-numero">
                            02
                        </span>

                        <h3>
                            Personaliza tu pedido
                        </h3>

                        <p>
                            Cuéntanos qué arreglo quires
                            y agrega los detalles que prefieres.
                        </p>

                    </div>

                </div>

                {{-- Paso 3 --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <div class="paso-pedido">

                        <div class="paso-icono">
                            📍
                        </div>

                        <span class="paso-numero">
                            03
                        </span>

                        <h3>
                            Indica la dirección
                        </h3>

                        <p>
                            Comparte el lugar y la fecha
                            en la que deseas recibir tu pedido.
                        </p>

                    </div>

                </div>

                {{-- Paso 4 --}}
                <div class="col-12 col-md-6 col-lg-3">

                    <div class="paso-pedido">

                        <div class="paso-icono">
                            🚚
                        </div>

                        <span class="paso-numero">
                            04
                        </span>

                        <h3>
                            Recibe tu pedido
                        </h3>

                        <p>
                            Nosotros preparamos tu arreglo y nos encargamos de entregarlo.
                        </p>

                    </div>

                </div>

            </div>

            <div class="pedido-boton">

                <a href="#contacto" class="btn-flor">
                    <i class="bi bi-chat-left-dots-fill"></i> Hacer mi pedido
                </a>

            </div>

        </div>

    </section>

    {{-- CONTACTO --}}
    <section class="contacto" id="contacto">

        <div class="container">

            <div class="seccion-titulo">

                <p>
                    Contáctanos
                </p>

                <h2>
                    Estamos aquí para ayudarte
                </h2>

                <span>
                    ¿Tienes alguna preguntao quieres hacer un pedido?
                    Ponte en contacto con nosotros.
                </span>

            </div>

            <div class="row g-4 align-items-stretch">

                {{-- información --}}
                <div class="col-12 col-lg-5">


                    <div class="contacto-info">

                        {{-- Whatsapp --}}
                        <div class="contacto-item">

                            <div class="contacto-icono">
                                <i class="bi bi-chat-left-dots-fill"></i>
                            </div>

                            <div>

                                <h3>Whatsapp</h3>

                                <p>
                                    Haz tu pedido o pregúntanos
                                    por nuestros arreglos.
                                </p>

                                <a href="#">
                                    Enviar mensaje
                                </a>

                            </div>

                        </div>

                        {{-- Telefono --}}
                        <div class="contacto-item">

                            <div class="contacto-icono">
                                📞
                            </div>

                            <div>

                                <h3>Telefono</h3>

                                <p>
                                    Estamos disponibles para
                                    atender tus dudas.
                                </p>

                                <a href="tel:3751112113">
                                    375 111 2113
                                </a>

                            </div>

                        </div>

                        {{-- Ubicación --}}

                        <div class="contacto-item">

                            <div class="contacto-icono">
                                📍
                            </div>

                            <div>

                                <h3>Ubicación</h3>

                                <p>
                                    Visitanos en nuestra florería
                                    o solicita entrega a domicilio.
                                </p>

                                <span>
                                    Tu ciudad, Jalisco
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Mapa --}}
                <div class="col-12 col-lg-7">

                    <div class="contacto-mapa">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1869.3532603157687!2d-103.9297721765961!3d20.436154934600406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8425df114593faa3%3A0xd23ddfd289781f4e!2sPlaza%20Principal%20San%20Mart%C3%ADn%20de%20Hidalgo!5e0!3m2!1ses-419!2smx!4v1788563851836!5m2!1ses-419!2smx"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"></iframe>

                    </div>

                </div>

            </div>

        </div>

        <div class="contacto-boton">

            <a href="#" class="btn-whatsapp" target="_blank">

                <i class="bi bi-chat-left-dots-fill"></i> Escríbenos por Whatsapp

            </a>

        </div>

    </section>

    {{-- FOOTER --}}
    <footer class="footer">

        <div class="container">

            <div class="row g-4">

                {{-- Marca --}}
                <div class="col-12- col-md-6 col-lg-4">

                    <div class="footer-marca">

                        <h2>Florería</h2>

                        <p>
                            Creamos arreglos florales para acompañar
                            tus momentos más especiales.
                        </p>

                    </div>

                </div>

                {{-- Navegacion --}}
                <div class="col-6 col-md-3 col-lg-2">

                    <h3>
                        Navegación
                    </h3>

                    <ul class="footer-link">

                        <li>
                            <a href="#inicio" id="">Inicio</a>
                        </li>

                        <li>
                            <a href="#flores" id="">Flores</a>
                        </li>

                        <li>
                            <a href="#galeria" id="">Galería</a>
                        </li>

                        <li>
                            <a href="#nosotros" id="">Nosotros</a>
                        </li>

                        <li>
                            <a href="#contacto" id="">Contacto</a>
                        </li>

                    </ul>

                </div>

                {{-- Informacion --}}
                <div class="col-6 col-md-3 col-lg-3">

                    <h3>
                        Contacto
                    </h3>

                    <ul class="footer-link">

                        <li>
                            📍 Tu ciudad,Jalisco
                        </li>

                        <li>
                            📞 3751112113
                        </li>

                        <li>
                            💬 Whatsapp
                        </li>

                    </ul>

                </div>

                {{-- Redes --}}
                <div class="col-6 col-md-3 col-lg-3">

                    <h3>
                        Síguenos
                    </h3>

                    <p class="footer-redes-texto">
                        Descubre nuestros nuevos arreglos y trabajos en redes
                        sociales.
                    </p>

                    <div class="footer-redes">

                        <a href="#" aria-label="Instagram">
                            Instagram
                        </a>

                        <a href="#" aria-label="Facebook">
                            Facebook
                        </a>

                    </div>

                </div>

            </div>

            {{-- Línea inferior --}}
            <div class="footer-bottom">

                <p>
                    © 2026 Florería.Todos los derechos reservados.
                </p>

                <p>
                    Hecho con ❤️
                </p>

            </div>

        </div>

    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</html>
