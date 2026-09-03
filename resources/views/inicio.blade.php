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

            <p class="hero-subtitulo">
                Detalles que hablan por ti
            </p>

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

                {{-- FLOR 1 --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card card-flor">

                        <img src="{{ asset('img/rosas.jpg') }}" class="card-img-top" alt="Rosas rojas">

                        <div class="card-body">

                            <h3 class="card-title">
                                Rosas rojas
                            </h3>

                            <p class="card-text">
                                Hermoso arreglo de rosas rojas para una ocasión especial.
                            </p>

                            <div class="card-pie">

                                <span class="precio">
                                    $450
                                </span>

                                <a href="#" class="btn btn-flor">
                                    Pedir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- FLOR 2 --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card card-flor">

                        <img src="{{ asset('img/bouquet.jpg') }}" class="card-img-top" alt="Bouquet de flores">

                        <div class="card-body">

                            <h3 class="card-title">
                                Bouquet especial
                            </h3>

                            <p class="card-text">
                                Una combinación de flores
                                cuidadosamente seleccionada.
                            </p>

                            <div class="card-pie">

                                <span class="precio">
                                    $600
                                </span>

                                <a href="#" class="btn btn-flor">
                                    Pedir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- FLOR 3 --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card card-flor">

                        <img src="{{ asset('img/tulipanes.jpg') }}" class="card-img-top" alt="Tulipanes">

                        <div class="card-body">

                            <h3 class="card-title">
                                Tulipanes
                            </h3>

                            <p class="card-text">
                                Un arreglo elegante y delicado para sorprender.
                            </p>

                            <div class="card-pie">

                                <span class="precio">
                                    $500
                                </span>

                                <a href="#" class="btn btn-flor">
                                    Pedir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

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

                            <span>Un detalles especial</span>

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

                <h2>Nuestra galeria</h2>

                <span>Algunos de nuestros arreglos y momentos especiales.</span>

            </div>

            <div class="row g-2 galeria-grid">

                <div class="col-6 col-md-4">

                    <div class="foto-galeria">

                        <img src="{{ asset('img/flores_galeria/flor_1.jpg') }}" alt="Arreglo floral"
                            onclick="abrirGaleria(this)">

                    </div>

                </div>

                <div class="col-6 col-md-4">

                    <div class="foto-galeria">

                        <img src="{{ asset('img/flores_galeria/flor_2.jpg') }}" alt="Arreglo floral"
                            onclick="abrirGaleria(this)">

                    </div>

                </div>

                <div class="col-6 col-md-4">

                    <div class="foto-galeria">

                        <img src="{{ asset('img/flores_galeria/flor_3.jpg') }}" alt="Arreglo floral"
                            onclick="abrirGaleria(this)">

                    </div>

                </div>

                <div class="col-6 col-md-4">

                    <div class="foto-galeria">

                        <img src="{{ asset('img/flores_galeria/flor_4.jpg') }}" alt="Arreglo floral"
                            onclick="abrirGaleria(this)">

                    </div>

                </div>

                <div class="col-6 col-md-4">

                    <div class="foto-galeria">

                        <img src="{{ asset('img/flores_galeria/flor_5.jpg') }}" alt="Arreglo floral"
                            onclick="abrirGaleria(this)">

                    </div>

                </div>

                <div class="col-6 col-md-4">

                    <div class="foto-galeria">

                        <img src="{{ asset('img/flores_galeria/flor_6.jpg') }}" alt="Arreglo floral"
                            onclick="abrirGaleria(this)">

                    </div>

                </div>


            </div>

        </div>

    </section>

    <div class="modal-galeria" id="modalGaleria">

        <button class="cerrar-galeria" onclick="cerrarGaleria()">
            &times;
        </button>

        <img src="" alt="Imagen ampliada" id="imagenGrande">

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</html>
